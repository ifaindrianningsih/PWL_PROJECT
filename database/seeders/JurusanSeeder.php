<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jurusan = [
            [
                'nama_jurusan' => 'Ilmu Pengetahuan Alam',
                'total_kelas' => 12,
            ],
            [
                'nama_jurusan' => 'Ilmu Pengetahuan Sosial',
                'total_kelas' => 12,
            ],
        ];

        DB::table('jurusan')->insert($jurusan);
    }
}
