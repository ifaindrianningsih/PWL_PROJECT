<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walimurid', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa',15);
            $table->string('nama_ayah',15);
            $table->string('pekerjaan_ayah',15);
            $table->integer('umur_ayah');
            $table->string('nama_ibu',15);
            $table->string('pekerjaan_ibu',15);
            $table->integer('umur_ibu');
            $table->string('alamat',15);
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
        Schema::dropIfExists('walimurid');
    }
}
