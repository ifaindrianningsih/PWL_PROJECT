<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_siswa')->nullable();
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->double('total_bayar');
            $table->date('tgl_transaksi');
            $table->Foreign('nama_siswa')->references('id_siswa')->on('siswa');
            $table->Foreign('jurusan_id')->references('id')->on('jurusan');
            $table->Foreign('kelas_id')->references('id')->on('kelas');
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
        Schema::dropIfExists('spp');
    }
}
