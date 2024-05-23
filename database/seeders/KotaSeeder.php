<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kotas')->insert([
            ['nama'=>'Kabupaten Agam'],
            ['nama'=>'Kabupaten Dharmasraya'],
            ['nama'=>'Kabupaten Kepulauan Mentawai'],
            ['nama'=>'Kabupaten Lima Puluh Kota'],
            ['nama'=>'Kabupaten Padang Pariaman'],
            ['nama'=>'Kabupaten Pasaman'],
            ['nama'=>'Kabupaten Pasaman Barat'],
            ['nama'=>'Kabupaten Pesisir Selatan'],
            ['nama'=>'Kabupaten Sijunjung'],
            ['nama'=>'Kabupaten Solok'],
            ['nama'=>'Kabupaten Solok Selatan'],
            ['nama'=>'Kabupaten Tanah Datar'],
            ['nama'=>'Kota Bukittinggi'],
            ['nama'=>'Kota Padang'],
            ['nama'=>'Kota Padang Panjang'],
            ['nama'=>'Kota Pariaman'],
            ['nama'=>'Kota Payakumbuh'],
            ['nama'=>'Kota Sawahlunto'],
            ['nama'=>'Kota Solok'],
        ]);
    }
}
