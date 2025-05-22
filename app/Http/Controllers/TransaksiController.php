<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('pelanggan')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('details.barang', 'pelanggan')->findOrFail($id);
        return view('nota.show', compact('transaksi'));
    }

    public function create()
    {
        $barangs = Barang::with('event')->get();
        $pelanggans = Pelanggan::all();
        return view('transaksi.create', compact('barangs', 'pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id.*' => 'required|exists:barangs,id',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        $pelanggan = null;

        if ($request->pelanggan_id === 'baru') {
            $request->validate([
                'nama_pelanggan_baru' => 'required|string|max:255',
                'no_hp_baru' => 'required|string|max:20',
            ]);

            if (Pelanggan::where('nama', $request->nama_pelanggan_baru)->exists()) {
                return back()->withInput()->with('error', 'Nama pelanggan sudah ada.');
            }

            $pelanggan = Pelanggan::create([
                'nama' => $request->nama_pelanggan_baru,
                'no_hp' => $request->no_hp_baru,
                'total_transaksi' => 0,
                'membership' => 'Bronze',
            ]);
        } elseif (!empty($request->pelanggan_id)) {
            $pelanggan = Pelanggan::find($request->pelanggan_id);
        }

        foreach ($request->barang_id as $key => $barang_id) {
            $barang = Barang::findOrFail($barang_id);
            $jumlah = $request->jumlah[$key];

            if ($barang->stok < $jumlah) {
                return redirect()->back()->with('error', 'Stok "' . $barang->nama_barang . '" tidak mencukupi. Sisa stok: ' . $barang->stok);
            }
        }

        $transaksi = Transaksi::create([
            'pelanggan_id' => $pelanggan?->id,
            'tanggal_transaksi' => now(),
            'total_diskon' => 0,
            'total_harga' => 0,
        ]);

        $total_diskon = 0;
        $total_harga = 0;

        foreach ($request->barang_id as $key => $barang_id) {
            $barang = Barang::findOrFail($barang_id);
            $jumlah = $request->jumlah[$key];

            $harga_asli = $barang->harga;

            $diskon_event = $barang->event->diskon_persen ?? 0;
            $diskon_event_rupiah = ($harga_asli * $diskon_event) / 100;

            $diskon_membership = 0;
            if ($pelanggan) {
                switch ($pelanggan->membership) {
                    case 'Silver':
                        $diskon_membership = 5;
                        break;
                    case 'Gold':
                        $diskon_membership = 10;
                        break;
                }
            }

            $diskon_membership_rupiah = ($harga_asli * $diskon_membership) / 100;

            $total_diskon_item = $diskon_event_rupiah + $diskon_membership_rupiah;
            $harga_setelah_diskon = ($harga_asli - $total_diskon_item) * $jumlah;

            TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $barang_id,
                'harga' => $harga_asli,
                'diskon_persen' => $diskon_event + $diskon_membership,
                'diskon_rupiah' => $total_diskon_item,
                'jumlah' => $jumlah,
                'total_harga_akhir' => $harga_setelah_diskon,
            ]);

            $barang->stok -= $jumlah;
            $barang->save();

            $total_diskon += $total_diskon_item * $jumlah;
            $total_harga += $harga_setelah_diskon;
        }

        if ($pelanggan) {
            $pelanggan->increment('total_transaksi', $total_harga);

            $membership_baru = $this->tentukanMembership($pelanggan->total_transaksi);
            if ($pelanggan->membership !== $membership_baru) {
                $pelanggan->update(['membership' => $membership_baru]);
            }
        }

        $transaksi->update([
            'total_diskon' => $total_diskon,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('nota.show', $transaksi->id)->with('success', 'Transaksi berhasil disimpan.');
    }

    public function cetakNota($id)
    {
        $transaksi = Transaksi::with('details.barang')->findOrFail($id);
        $pdf = Pdf::loadView('nota.nota_pdf', compact('transaksi'));
        return $pdf->download('Nota-Transaksi-' . $transaksi->id . '.pdf');
    }

    private function tentukanMembership($totalTransaksi)
    {
        if ($totalTransaksi >= 2000000) {
            return 'Gold';
        } elseif ($totalTransaksi >= 1000000) {
            return 'Silver';
        } else {
            return 'Bronze';
        }
    }
}
