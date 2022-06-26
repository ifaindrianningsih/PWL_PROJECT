<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->unsignedBigInteger('jurusan_id')->nullable()->after('semester');
            $table->unsignedBigInteger('kelas_id')->nullable()->after('jurusan_id');
            $table->Foreign('jurusan_id')->references('id')->on('jurusan');
            $table->Foreign('kelas_id')->references('id')->on('kelas');
            $table->dropColumn('terbayar');
            $table->dropColumn('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->Foreign('jurusan_id');
        $table->Foreign('kelas_id');
        $table->dropColumn('jurusan_id');
        $table->dropColumn('kelas_id');
        $table->double('terbayar');
        $table->double('total');
    }
}
