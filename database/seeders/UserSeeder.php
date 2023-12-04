<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role'=>'dosen',
            'name'=>'Dosen Admin',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        Dosen::create([
           'user_id' => '1',
           'nip' => '1234567890',
           'is_admin'=> true,
           'gender' =>'laki-laki',
        ]);
    }
}
