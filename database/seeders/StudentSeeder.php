<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'account_id' => 1,
            'agama' => 'Islam',
            'tempat_lahir' => 'Bojonegoro',
            'tanggal_lahir' => 1999-10-30,
            'jenis_kelamin' => 'Laki-Laki',
            'jalur_penerimaan' => 'SBMPTN',
        ]);
    }
}
