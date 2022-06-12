<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa',15);
            $table->string('nis');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->double('nominal');
            $table->unsignedBigInteger('jurusan_id')->nullable();
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
        Schema::dropIfExists('tabungan');
    }
}
