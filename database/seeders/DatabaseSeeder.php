<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ObatSeeder;
use Database\Seeders\TemplateChatSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

       User::create([
            'name' => 'Andi',
            'username' => 'pegawai1',
            'password' => bcrypt('123'),
            'jabatan' => 'Pegawai'
        ]);
       User::create([
            'name' => 'Budi',
            'username' => 'Manajemen',
            'password' => bcrypt('123'),
            'jabatan' => 'Manajemen'
        ]);
        $this->call(ObatSeeder::class);
        $this->call(TemplateChatSeeder::class);

    }
}
