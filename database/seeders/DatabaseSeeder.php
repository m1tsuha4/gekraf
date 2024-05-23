<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'id' => 1,
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=> Hash::make('12345'),
                'is_admin' => true,
                'whatsapp' => '0812345678910',
                'image' =>'img/images.png'
                ]
        ]);

        User::create([
            'name'=>'haikal',
            'email'=>'haikal@gmail.com',
            'password'=>Hash::make('12345'),
            'whatsapp' => '0895341172282',
            'image' =>'img/vector.png'
        ]);
        $this->call([KotaSeeder::class]);
        $this->call([KategoriSeeder::class]);
    }
}
