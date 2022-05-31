<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiJurusanKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('jurusan_id')->after('nama_kelas')->nullable();
            $table->Foreign('jurusan_id')->references('id')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('kelas', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
        });
        
    }
}
