<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        $candidates = [
            // Tari Tradisional (category_id = 1)
            ['name' => 'Sanggar Siger Mas',      'origin' => 'Bandar Lampung', 'category_id' => 1, 'emoji' => '💃', 'bg_color' => '#FEF3C7', 'votes' => 342, 'description' => 'Sanggar tari terkemuka dengan spesialisasi tari Sigeh Penguten dan Melinting'],
            ['name' => 'Punggu Dance Academy',    'origin' => 'Pringsewu',      'category_id' => 1, 'emoji' => '🎭', 'bg_color' => '#EDE9FE', 'votes' => 198, 'description' => 'Kelompok tari muda berbakat dengan koreografi modern-tradisional'],
            ['name' => 'Sanggar Tunas Lampung',   'origin' => 'Lampung Selatan','category_id' => 1, 'emoji' => '🩰', 'bg_color' => '#FCE7F3', 'votes' => 275, 'description' => 'Sanggar legendaris yang telah berdiri sejak 1985'],

            // Musik Daerah (category_id = 2)
            ['name' => 'Gamolan Tunas Muda',      'origin' => 'Lampung Barat',  'category_id' => 2, 'emoji' => '🎶', 'bg_color' => '#DBEAFE', 'votes' => 289, 'description' => 'Grup musik gamolan tradisional generasi muda Lampung Barat'],
            ['name' => 'Serdam Budaya',            'origin' => 'Tanggamus',      'category_id' => 2, 'emoji' => '🎵', 'bg_color' => '#FFF7ED', 'votes' => 167, 'description' => 'Pemain serdam profesional dengan teknik khas Tanggamus'],
            ['name' => 'Kolintang Nusantara',      'origin' => 'Metro',          'category_id' => 2, 'emoji' => '🥁', 'bg_color' => '#D1FAE5', 'votes' => 201, 'description' => 'Kelompok musik perkusi tradisional multi-etnis'],

            // Kerajinan Tangan (category_id = 3)
            ['name' => 'Tenun Tapis Wijaya',       'origin' => 'Lampung Tengah', 'category_id' => 3, 'emoji' => '🧵', 'bg_color' => '#FEF3C7', 'votes' => 256, 'description' => 'Pengrajin tapis Lampung dengan motif klasik autentik turun-temurun'],
            ['name' => 'Anyaman Pesisir',          'origin' => 'Pesawaran',      'category_id' => 3, 'emoji' => '🪡', 'bg_color' => '#DBEAFE', 'votes' => 143, 'description' => 'Kerajinan anyaman bambu dan rotan khas pesisir Lampung'],

            // Kuliner (category_id = 4)
            ['name' => 'Seruit Nusantara',         'origin' => 'Metro',          'category_id' => 4, 'emoji' => '🍽️', 'bg_color' => '#D1FAE5', 'votes' => 431, 'description' => 'Penyaji seruit Lampung dengan resep leluhur yang otentik'],
            ['name' => 'Rendang Lampung',          'origin' => 'Lampung Utara',  'category_id' => 4, 'emoji' => '🫕', 'bg_color' => '#DBEAFE', 'votes' => 312, 'description' => 'Kreasi kuliner fusion Lampung yang unik dan lezat'],

            // Teater Budaya (category_id = 5)
            ['name' => 'Teater Krakatau',          'origin' => 'Bandar Lampung', 'category_id' => 5, 'emoji' => '🎬', 'bg_color' => '#FCE7F3', 'votes' => 189, 'description' => 'Grup teater dengan pertunjukan drama sejarah Lampung yang epik'],

            // Seni Visual (category_id = 6)
            ['name' => 'Fotografi Pesisir',        'origin' => 'Lampung Timur',  'category_id' => 6, 'emoji' => '📸', 'bg_color' => '#EDE9FE', 'votes' => 224, 'description' => 'Komunitas fotografi yang mengabadikan keindahan alam dan budaya Lampung'],
        ];

        foreach ($candidates as $c) {
            DB::table('candidates')->insert(array_merge($c, [
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
