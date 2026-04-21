<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Tari Tradisional',  'icon' => '💃', 'description' => 'Pertunjukan tari khas daerah Lampung'],
            ['name' => 'Musik Daerah',       'icon' => '🎶', 'description' => 'Musik tradisional menggunakan alat musik khas Lampung'],
            ['name' => 'Kerajinan Tangan',   'icon' => '🧵', 'description' => 'Kerajinan tapis, anyaman, dan seni ukir'],
            ['name' => 'Kuliner',            'icon' => '🍽️', 'description' => 'Makanan dan minuman khas Lampung'],
            ['name' => 'Teater Budaya',      'icon' => '🎭', 'description' => 'Drama dan pertunjukan teater budaya'],
            ['name' => 'Seni Visual',        'icon' => '🎨', 'description' => 'Lukisan, fotografi, dan seni rupa'],
        ];

        foreach ($categories as $cat) {
            DB::table('categories')->insert([
                'name'        => $cat['name'],
                'slug'        => Str::slug($cat['name']),
                'icon'        => $cat['icon'],
                'description' => $cat['description'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
