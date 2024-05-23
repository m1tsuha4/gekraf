<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMentor extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function Mentor(){
        return $this->hasMany(Mentor::class);
    }
}
