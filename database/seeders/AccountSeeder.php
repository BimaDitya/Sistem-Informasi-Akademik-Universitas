<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'nim' => '19050974042',
            'nama_depan' => 'Bima',
            'nama_belakang' => 'Aditya',
            'password' => bcrypt('1122123Bb'),
        ]);
        Account::create([
            'nim' => '19050974043',
            'nama_depan' => 'Albertus',
            'nama_belakang' => 'Anggara',
            'password' => bcrypt('Albert043'),
        ]);
        Account::create([
            'nim' => '19050974066',
            'nama_depan' => 'Dimas',
            'nama_belakang' => 'Putra',
            'password' => bcrypt('Dimas066'),
        ]);
        
    }
}
