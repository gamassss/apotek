<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

        User::create([
            'name' => 'pegawai',
            'username' => 'pegawai',
            'password' => bcrypt('123'),
            'jabatan' => 'pegawai',
            'no_telpon' => '082232763556'
        ]);
        User::create([
            'name' => 'manajemen',
            'username' => 'manajemen',
            'password' => bcrypt('123'),
            'jabatan' => 'manajemen',
            'no_telpon' => '085790824615'
        ]);
    }
}
