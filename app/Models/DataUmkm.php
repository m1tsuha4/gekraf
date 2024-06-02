<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nik',
        'nama_usaha',
        'alamat_usaha',
        'alamat_pemilik',
        'nama_usaha',
        'produk_usaha',
        'sub_sektor',
        'klasifikasi',
        'nib',
        'deskripsi',
        'id_kota',
        'instagram',
        'facebook'
    ];
}
