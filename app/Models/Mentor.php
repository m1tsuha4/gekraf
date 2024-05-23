<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function kategoriMentor(){
        return $this->belongsTo(KategoriMentor::class);
    }
}
