<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //belum selesai
        $kelas = [
            ['nama_kelas' => 'IPA 1',],
            ['nama_kelas' => 'IPA 2',],
            ['nama_kelas' => 'IPA 3',],
            ['nama_kelas' => 'IPA 4',],
            ['nama_kelas' => 'IPS 1',],
            ['nama_kelas' => 'IPS 2',],
            ['nama_kelas' => 'IPS 3',],
            ['nama_kelas' => 'IPS 4',],
        ];

        DB::table('kelas')->insert($kelas);
    }
}
