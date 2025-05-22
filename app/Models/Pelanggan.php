<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_hp',
        'total_transaksi',
        'membership'
    ];

    public function updateMembership()
    {
        if ($this->total_transaksi >= 1000000) {
            $this->membership = 'Gold';
        } elseif ($this->total_transaksi >= 500000) {
            $this->membership = 'Silver';
        } else {
            $this->membership = 'Bronze';
        }

        $this->save();
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
