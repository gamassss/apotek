<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Database\Seeders\ObatSeeder;
use Database\Seeders\MemberSeeder;
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
            'jabatan' => 'pegawai',
        ]);
       User::create([
            'name' => 'Yuda',
            'username' => 'pegawai2',
            'password' => bcrypt('123'),
            'jabatan' => 'Pegawai'
        ]);
       User::create([
            'name' => 'Yuda',
            'username' => 'pegawai2',
            'password' => bcrypt('123'),
            'jabatan' => 'Pegawai'
        ]);
        User::create([
            'name' => 'Budi',
            'username' => 'Manajemen',
            'password' => bcrypt('123'),
            'jabatan' => 'manajemen',
            
        ]);
        Member::create([
            'user_id' => 1,
            'nama_member' => 'gamas',
            'alamat_member' => 'mulyorejo',
            'no_telpon' => '6282232763556',
        ]);
        Member::create([
            'user_id' => 1,
            'nama_member' => 'yuuji',
            'alamat_member' => 'jember',
            'no_telpon' => '6287822771121',
        ]);
        $this->call(ObatSeeder::class);
        $this->call(TemplateChatSeeder::class);
        $this->call(MemberSeeder::class);

    }
}
