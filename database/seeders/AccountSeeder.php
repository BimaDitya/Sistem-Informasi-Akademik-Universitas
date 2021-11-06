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
    }
}
