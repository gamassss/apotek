<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\ObatSeeder;
use Database\Seeders\TemplateChatSeeder;
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
            'name' => 'Andi',
            'username' => 'pegawai1',
            'password' => bcrypt('123'),
            'jabatan' => 'pegawai',
            'no_telpon' => '082232763556',
        ]);
        User::create([
            'name' => 'Budi',
            'username' => 'Manajemen',
            'password' => bcrypt('123'),
            'jabatan' => 'manajemen',
            'no_telpon' => '085790824615',
        ]);
        $this->call(ObatSeeder::class);
        $this->call(TemplateChatSeeder::class);

    }
}
