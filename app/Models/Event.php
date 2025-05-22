<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'diskon_persen',
    ];

    /**
     * Relasi ke model Barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    /**
     * Mengecek apakah event sedang aktif berdasarkan tanggal
     */
    public function isAktif(): bool
    {
        $today = now()->toDateString();
        return (!$this->tanggal_mulai || $this->tanggal_mulai <= $today)
            && (!$this->tanggal_selesai || $this->tanggal_selesai >= $today);
    }
}
