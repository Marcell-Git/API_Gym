<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPemesanan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pemesanans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'review',
        'rating',
        'id_pembayaran',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
