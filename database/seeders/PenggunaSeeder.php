<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengguna = [
            [
                'nama_pengguna' => 'TU 1',
                'jabatan' => 'Kepala TU',
                'username' => 'admin_tu_1',
            ],
            [
                'nama_pengguna' => 'TU 2',
                'jabatan' => 'Staff TU',
                'username' => 'admin_tu_2',
            ],
        ];

        DB::table('penggunas')->insert($pengguna);
    }
}
