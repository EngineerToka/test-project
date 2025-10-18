<?php

namespace Database\Seeders;

use App\Models\ArtWork;
use Database\Factories\ArtWorkFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtWorkSeeder extends Seeder
{

    public function run(): void
    {
        
    ArtWork::factory()->count(10)->create();
            
}
}
