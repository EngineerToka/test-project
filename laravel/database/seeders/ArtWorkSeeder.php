<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\ArtWorkFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtWorkSeeder extends Seeder
{

    public function run(): void
    {
        
    ArtWorkFactory::factory()->count(10)->create();
            
}
}
