<?php

namespace Database\Seeders;

use App\Models\ArtWork;
use Illuminate\Database\Seeder;
use Database\Factories\ArtWorkImagesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtWorkImagesSeeder extends Seeder
{

    public function run(): void
    {
        $artWorks= ArtWork::all();
        foreach($artWorks as $artWork){
            ArtWorkImagesFactory::factory(rand(1, 3))->create([
                'imageable_id' => $artWork->id,
                'imageable_type' => ArtWork::class,
            ]);
        }
    }
}
