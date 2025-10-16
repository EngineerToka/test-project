<?php

namespace Database\Factories;

use App\Models\ArtWorkImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtWorkImagesFactory extends Factory
{
    protected $model = ArtWorkImages::class;

    public function definition(): array
    {
        $sampleImages = [
            'uploads/artworks/sample1.jpg',
            'uploads/artworks/sample2.jpg',
            'uploads/artworks/sample3.jpg',
            'uploads/artworks/sample4.jpg',
        ];

        return [
           'path' => $this->faker->randomElement($sampleImages),
            'imageable_id' => null,  
            'imageable_type' => null, 
        ];
    }
}
