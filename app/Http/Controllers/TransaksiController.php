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
        $barangs = Barang::all();
        $pelanggans = Pelanggan::all();
        return view('transaksi.create', compact('barangs', 'pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'barang.*' => 'required|exists:barangs,id',
            'jumlah.*' => 'required|integer|min:1',
            'diskon.*' => 'required|integer|min:0|max:100',
        ]);

        $transaksi = Transaksi::create([
            'pelanggan_id' => $request->pelanggan_id,
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
            $diskon_persen = $request->diskon_persen[$key] ?? 0;
            $diskon_rupiah = ($harga_asli * $diskon_persen) / 100;
            $harga_setelah_diskon = ($harga_asli - $diskon_rupiah) * $jumlah;

            TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $barang_id,
                'harga' => $harga_asli,
                'diskon_persen' => $diskon_persen,
                'diskon_rupiah' => $diskon_rupiah,
                'jumlah' => $jumlah,
                'total_harga_akhir' => $harga_setelah_diskon,
            ]);

            $barang->stok -= $jumlah;
            $barang->save();

            $total_diskon += $diskon_rupiah * $jumlah;
            $total_harga += $harga_setelah_diskon;
        }

        $pelanggan = Pelanggan::findOrFail($request->pelanggan_id);
        $pelanggan->total_transaksi += $total_harga;
        $pelanggan->save();

        if ($barang->stok < $jumlah) {
            return back()->with('error', 'Stok ' . $barang->nama_barang . ' tidak mencukupi.');
        }

        $transaksi->update([
            'total_diskon' => $total_diskon,
            'total_harga' => $total_harga
        ]);

        return redirect()->route('nota.show', $transaksi->id)->with('success', 'Transaksi berhasil');
    }
    public function cetakNota($id)
    {
        $transaksi = Transaksi::with('details.barang')->findOrFail($id);

        $pdf = Pdf::loadView('nota.nota_pdf', compact('transaksi'));
        return $pdf->download('Nota-Transaksi-' . $transaksi->id . '.pdf');
    }
}
