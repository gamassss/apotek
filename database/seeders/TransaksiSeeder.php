<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i=0; $i < 1000; $i++) { 
              // Generate random month between January (1) and the current month
              $randomMonth = mt_rand(1, 12);
              $randomYear = '202'.mt_rand(1,3) ;
              
            Transaksi::create([
                'member_id'=>mt_rand(1,537),
                'obat_id'=>mt_rand(1,5),
                'lama_habis'=>'10',
                'created_at'=> date("$randomYear-$randomMonth-01")
            ]);
        }
    }
}
