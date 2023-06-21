<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['nama_obat' => 'Paracetamol'],
            ['nama_obat' => 'Amoxicillin'],
            ['nama_obat' => 'Ibuprofen'],
            ['nama_obat' => 'Aspirin'],
            ['nama_obat' => 'Loratadine'],
            // Add more sample data as needed
        ];

        Obat::insert($data);

    }
}
