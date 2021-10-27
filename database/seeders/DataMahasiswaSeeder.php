<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_mahasiswas')->insert([
            'TempatLahir' => 'Surabaya',
            'TanggalLahir' => '2000-05-08',
            'JalurPenerimaan' => 'Mandiri',
        ]);
    }
}
