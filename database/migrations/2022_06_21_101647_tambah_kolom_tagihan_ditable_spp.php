<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomTagihanDitableSpp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spp', function (Blueprint $table) {
            $table->unsignedBigInteger('tagihan_id')->nullable()->after('jurusan_id');
            $table->Foreign('tagihan_id')->references('id')->on('pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('tagihan_id');
    }
}
