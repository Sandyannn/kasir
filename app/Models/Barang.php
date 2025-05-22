<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'harga',
        'stok'
    ];

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class);
    }

public function event()
{
    return $this->hasOne(Event::class);
}

    public function eventAktif()
    {
        return $this->hasOne(Event::class)
            ->where(function ($query) {
                $today = now()->toDateString();
                $query->whereNull('tanggal_mulai')
                    ->orWhere('tanggal_mulai', '<=', $today);
            })
            ->where(function ($query) {
                $today = now()->toDateString();
                $query->whereNull('tanggal_selesai')
                    ->orWhere('tanggal_selesai', '>=', $today);
            });
    }
}
