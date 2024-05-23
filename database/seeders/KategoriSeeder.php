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
            ['nama_kategori'=>'Makanan'],
            ['nama_kategori'=>'Minuman'],
            ['nama_kategori'=>'Busana'],
            ['nama_kategori'=>'Kerajinan'],
            ['nama_kategori'=>'Mainan'],
            ['nama_kategori'=>'Elektronik'],
        ]);
    }
}
