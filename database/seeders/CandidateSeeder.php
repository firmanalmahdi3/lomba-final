<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('candidates')->upsert([
            [
                'id' => 1,
                'name' => 'Film Masyarakat 1',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 1,
                'description' => 'Kebangkitan di Kota Blitar: Semangat – Potensi – Perjuangan Menuju Kota Masa Depan',
                'youtube_url' => 'https://youtu.be/tSbTFH8gtXk?si=FvwTTNO6WdT7MhZw',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#FEF3C7',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
            [
                'id' => 2,
                'name' => 'Film Masyarakat 2',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 1,
                'description' => 'Kebangkitan di Kota Blitar: Semangat – Potensi – Perjuangan Menuju Kota Masa Depan',
                'youtube_url' => 'https://youtu.be/NyMIhwxnngA?si=Y0lVCIn-utY1WU6u',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#DBEAFE',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
            [
                'id' => 3,
                'name' => 'Film Masyarakat 3',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 1,
                'description' => 'Kebangkitan di Kota Blitar: Semangat – Potensi – Perjuangan Menuju Kota Masa Depan',
                'youtube_url' => 'https://youtu.be/ZnTDuHM-v_E?si=cDiY3IAugu9Gu_Tt',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#D1FAE5',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
            [
                'id' => 4,
                'name' => 'Film Pelajar 1',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 2,
                'description' => 'Ruang Digital Aman untuk Generasi Muda',
                'youtube_url' => 'https://youtu.be/ZWQhRqYCwxA?si=YunA-MvWyBSk9Naa',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#EDE9FE',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
            [
                'id' => 5,
                'name' => 'Film Pelajar 2',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 2,
                'description' => 'Ruang Digital Aman untuk Generasi Muda',
                'youtube_url' => 'https://youtu.be/pGalmqiGhVo?si=rtjW1cBDw6gf6uqi',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#FCE7F3',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
            [
                'id' => 6,
                'name' => 'Film Pelajar 3',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 2,
                'description' => 'Ruang Digital Aman untuk Generasi Muda',
                'youtube_url' => 'https://youtu.be/G1_jpcoSJiE?si=8VsRrfqG11fw3TXp',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#FFF7ED',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
            [
                'id' => 7,
                'name' => 'Film KIM 1',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 3,
                'description' => 'Kebangkitan di Kota Blitar: Semangat – Potensi – Perjuangan Menuju Kota Masa Depan',
                'youtube_url' => 'https://youtu.be/8HLgPaMN51E?si=yNspqiJi0uiTWnrf',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#FEF3C7',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
            [
                'id' => 8,
                'name' => 'Film KIM 2',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 3,
                'description' => 'Kebangkitan di Kota Blitar: Semangat – Potensi – Perjuangan Menuju Kota Masa Depan',
                'youtube_url' => 'https://youtu.be/5oMh0iDcZG4?si=2eF-_Lg1zS06Syof',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#DBEAFE',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
            [
                'id' => 9,
                'name' => 'Film KIM 3',
<<<<<<< HEAD
=======
                'origin' => 'Blitar',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'category_id' => 3,
                'description' => 'Kebangkitan di Kota Blitar: Semangat – Potensi – Perjuangan Menuju Kota Masa Depan',
                'youtube_url' => 'https://youtu.be/3osS-Gz4pZE?si=rgAM6mGkWXRIcX36',
                'emoji' => '🎬',
<<<<<<< HEAD
=======
                'bg_color' => '#D1FAE5',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
                'votes' => 0,
                'is_active' => true,
                'created_at' => '2026-04-23 07:39:13',
                'updated_at' => '2026-04-23 07:39:13',
            ],
        ], ['id'], [
            'name',
<<<<<<< HEAD
=======
            'origin',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
            'category_id',
            'description',
            'youtube_url',
            'emoji',
<<<<<<< HEAD
=======
            'bg_color',
>>>>>>> e1849ef838b9f6a8b161e51847a1655cf2d699b2
            'votes',
            'is_active',
            'created_at',
            'updated_at',
        ]);
    }
}
