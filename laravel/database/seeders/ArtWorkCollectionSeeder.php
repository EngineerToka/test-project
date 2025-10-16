<?php

namespace Database\Seeders;

use App\Models\ArtWork;
use App\Models\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtWorkCollectionSeeder extends Seeder
{

    public function run(): void
    {
        $artWorks= ArtWork::all();
        $collections= Collection::all();
        foreach($collections as $collection){
            $collection->artworks()->attach([
                $artWorks->random(rand(2, 5))->pluck('id')->toArray()
            ]);
        }
    }
}
