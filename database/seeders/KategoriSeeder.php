<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            ['nama_kategori'=>'Aplikasi'],
            ['nama_kategori'=>'Desain Produk'],
            ['nama_kategori'=>'Kriya'],
            ['nama_kategori'=>'Periklanan'],
            ['nama_kategori'=>'Pengembangan Permainan'],
            ['nama_kategori'=>'Fashion'],
            ['nama_kategori'=>'Fotografi'],
            ['nama_kategori'=>'Seni Pertunjukkan'],
            ['nama_kategori'=>'Arsitektur'],
            ['nama_kategori'=>'Film, Animasi, Video'],
            ['nama_kategori'=>'Musik'],
            ['nama_kategori'=>'Seni Rupa'],
            ['nama_kategori'=>'Desain Komunikasi Visual'],
            ['nama_kategori'=>'Penerbitan'],
            ['nama_kategori'=>'Kuliner'],
            ['nama_kategori'=>'Televisi dan Radio'],
        ]);
    }
}
