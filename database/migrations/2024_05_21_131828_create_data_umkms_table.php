<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_umkms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_usaha');
            $table->string('nik')->unique();
            $table->string('alamat_usaha');
            $table->string('alamat_pemilik');
            $table->string('produk_usaha');
            $table->string('sub_sektor');
            $table->string('klasifikasi');
            $table->string('nib')->unique();
            $table->text('deskripsi');
            $table->foreignId('id_kota')->constrained('kotas')->onDelete('cascade');
            $table->string('instagram');
            $table->string('facebook');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_umkms');
    }
};
