<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_pemesanan',
        'jenisPembayaran',
        'statusPembayaran',
        'totalPembayaran',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(DataPemesanan::class);
    }

}
