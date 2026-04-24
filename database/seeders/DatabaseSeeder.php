<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CandidateSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            CandidateSeeder::class,
        ]);
    }
}
