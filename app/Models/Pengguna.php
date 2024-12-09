<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Model
{
    use HasFactory, HasApiTokens;
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

}
