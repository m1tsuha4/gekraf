<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pariwisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_objek',
        'keterangan',
        'image',
        'lokasi',
        'instagram',
        'latitude',
        'longitude'
    ];
}
