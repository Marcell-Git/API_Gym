<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Authenticatable
{
    use HasFactory;
    protected $table = 'penggunas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fotoProfil',
        'namaPengguna',
        'nomorIdentitas',
        'jenisKelamin',
        'email',
        'umur',
        'kataSandi',
        'nomorTelepon',
    ];

    public function getAuthPassword()
    {
        return $this->kataSandi;
    }
}
