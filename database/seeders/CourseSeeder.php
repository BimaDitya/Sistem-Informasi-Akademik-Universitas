<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'matakuliah' => 'Verifikasi & Validasi Perangkat Lunak',
            'dosen' => 'Dwi Fatrianto Suyatno',
            'semester' => 'Semester 5',
            'hari'  => 'Selasa',
        ]);
        Course::create([
            'matakuliah' => 'Sistem Temu Kembali Informasi',
            'dosen' => 'Naim Rochmawati',
            'semester' => 'Semester 5',
            'hari'  => 'Selasa',
        ]);
    }
}
