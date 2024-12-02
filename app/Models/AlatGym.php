<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatGym extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'alat_gyms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'namaAlat',
        'harga',
    ];

}
