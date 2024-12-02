<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasOlahraga extends Model
{
    use HasFactory;
    protected $table = 'kelas_olahragas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'namaKelas',
        'jadwalKelas',
        'id_alatGym',
        'id_personalTrainer',
    ];

    public function alatGym()
    {
        return $this->hasMany(AlatGym::class);
    }

    public function personalTrainer()
    {
        return $this->hasMany(PersonalTrainer::class);
    }
}
