<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->unsignedBigInteger('siswa_id')->nullable()->before('semester');
            $table->Foreign('siswa_id')->references('id_siswa')->on('siswa');
            $table->dropColumn('nama_siswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->Foreign('siswa_id');
        $table->string('nama_siswa');
    }
}
