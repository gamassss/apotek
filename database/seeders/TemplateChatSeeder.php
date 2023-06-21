<?php

namespace Database\Seeders;

use App\Models\TemplateChat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemplateChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $message = [
            "Terima kasih telah memilih layanan kami. Kami senang dapat membantu Anda!",
            "Kami mengucapkan terima kasih atas kepercayaan Anda sebagai pelanggan setia.",
            "Bagaimana pengalaman Anda dengan layanan kami? Kami ingin mendengar tanggapan Anda.",
            "Apakah ada hal lain yang dapat kami bantu? Jangan ragu untuk menghubungi kami.",
            "Halo! Kami senang dapat membantu Anda. Ada yang perlu ditanyakan?",
        ];
        foreach ($message as $value) {
            TemplateChat::create(['text'=>$value]);
        }
    }
}
