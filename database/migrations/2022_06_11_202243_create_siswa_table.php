<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('foto')->nullable();
            $table->string('nis',5)->index();
            $table->string('nama',50)->index();
            $table->string('jenis_kelamin',15);
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->string('alamat',100);
            $table->unsignedBigInteger('walmur_id')->nullable();
            $table->Foreign('kelas_id')->references('id')->on('kelas');
            $table->Foreign('walmur_id')->references('id')->on('walimurid');
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
        Schema::dropIfExists('siswa');
    }
}
