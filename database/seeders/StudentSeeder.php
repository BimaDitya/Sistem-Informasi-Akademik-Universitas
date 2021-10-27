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
            'nama_depan' => 'Bima',
            'nama_belakang' => 'Aditya',
            'jenis_kelamin' => 'L',
            'agama' => 'Islam',
            'nim' => '19050974042',
            'password' => bcrypt('12345678'),
        ]);
    }
}
