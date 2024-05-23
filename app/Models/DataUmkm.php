<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_usaha',
        'alamat',
        'produk_usaha',
        'sub_sektor',
        'deskripsi',
        'instagram',
        'facebook'
    ];
}
