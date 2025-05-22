<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'total_transaksi' => 'nullable|integer|min:0',
        ]);

        if (Pelanggan::where('nama', $request->nama)->exists()) {
            return back()->withInput()->with('error', 'Nama sudah ada.');
        }

        $totalTransaksi = $request->total_transaksi ?? 0;
        $membership = $this->tentukanMembership($totalTransaksi);

        Pelanggan::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'total_transaksi' => $totalTransaksi,
            'membership' => $membership,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'total_transaksi' => 'nullable|integer|min:0',
        ]);

        if (Pelanggan::where('nama', $request->nama)->where('id', '!=', $id)->exists()) {
            return back()->withInput()->with('error', 'Nama sudah ada.');
        }

        $pelanggan = Pelanggan::findOrFail($id);
        $totalTransaksi = $request->total_transaksi ?? 0;
        $membership = $this->tentukanMembership($totalTransaksi);

        $pelanggan->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'total_transaksi' => $totalTransaksi,
            'membership' => $membership,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    /**
     * Menentukan level membership berdasarkan total transaksi (dalam rupiah).
     */
    private function tentukanMembership($totalTransaksi)
    {
        if ($totalTransaksi >= 1000000) {
            return 'Gold';
        } elseif ($totalTransaksi >= 500000) {
            return 'Silver';
        } else {
            return 'Bronze';
        }
    }
}
