<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGekraf extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jabatan',
        'alamat',
        'id_kota',
        'sub_sektor',
        'image'
    ];
}
