<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'type' => 'admin',
        ]);
        Role::create([
            'type' => 'dosen',
        ]);
        Role::create([
            'type' => 'mahasiswa',
        ]);
    }
}