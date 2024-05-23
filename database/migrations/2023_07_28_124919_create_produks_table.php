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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('image');
            $table->string('nama_produk');
            $table->text('deskripsi_produk');
            $table->string('excerpt');
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('whatsapp');
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
