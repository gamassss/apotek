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
            'name' => 'Pegawai',
            'username' => 'pegawai1',
            'password' => bcrypt('123'),
            'jabatan' => 'Pegawai'
        ]);
       User::create([
            'name' => 'Manajemen',
            'username' => 'Manajemen',
            'password' => bcrypt('123'),
            'jabatan' => 'Manajemen'
        ]);
    }
}
