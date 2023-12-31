<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Member;
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
            'no_telpon' => '08123456',
        ]);
        User::create([
            'name' => 'Yuda',
            'username' => 'pegawai2',
            'password' => bcrypt('123'),
            'jabatan' => 'pegawai',
            'no_telpon' => '08123456',
        ]);
        User::create([
            'name' => 'CS',
            'username' => 'staff',
            'password' => bcrypt('123'),
            'jabatan' => 'pegawai',
            'no_telpon' => '087654321',
        ]);

        User::create([
            'name' => 'Budi',
            'username' => 'Manajemen',
            'password' => bcrypt('123'),
            'jabatan' => 'manajemen',
        ]);
        
        Member::create([
            'user_id' => 1,
            'nama_member' => 'bintang',
            'alamat_member' => 'jember',
            'no_telpon' => '6287822771121',
        ]);
        
        Member::create([
            'user_id' => 1,
            'nama_member' => 'gamas',
            'alamat_member' => 'sukolilo',
            'no_telpon' => '6282232763556',
        ]);


        $this->call(ObatSeeder::class);
        $this->call(TemplateChatSeeder::class);
        // $this->call(MemberSeeder::class);
        // $this->call(TransaksiSeeder::class);

    }
}
