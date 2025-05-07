<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function show($id) {
        $transaksi = Transaksi::with('pelanggan', 'details.barang')->findOrFail($id);
        return view('nota.show', compact('transaksi'));
    }
}
