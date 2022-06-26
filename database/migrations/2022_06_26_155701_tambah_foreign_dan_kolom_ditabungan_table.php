<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignDanKolomDitabunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabungan', function (Blueprint $table) {
            $table->dropColumn('nama_siswa');
            $table->dropColumn('nis');
            $table->unsignedBigInteger('siswa_id')->nullable()->before('kelas_id');
            $table->Foreign('siswa_id')->references('id_siswa')->on('siswa');
            $table->double('transaksi_akhir')->after('nominal');
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
        $table->dropColumn('transaksi_akhir');
    }
}
