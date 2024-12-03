<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemesanan extends Model
{
    use HasFactory;
    protected $table = 'data_pemesanans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'namaPengguna',
        'namaKelas',
        'namaTrainer',
        'namaAlat',
        'jadwalKelas',
        'status',
        'id_pengguna',
        'id_kelasOlahraga',
        'id_personalTrainer',
        'id_alatGym',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function kelasOlahraga()
    {
        return $this->belongsTo(KelasOlahraga::class);
    }

    public function personalTrainer()
    {
        return $this->belongsTo(PersonalTrainer::class);
    }

    public function alatGym()
    {
        return $this->belongsTo(AlatGym::class);
    }
}
