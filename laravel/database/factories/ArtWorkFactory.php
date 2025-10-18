<?php

namespace Database\Factories;
use App\Models\ArtWork;
use Illuminate\Database\Eloquent\Factories\Factory;


class ArtWorkFactory extends Factory
{
     protected $model = ArtWork::class;

    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->unique()->word()),
            'description' => $this->faker->sentence(12),
            'status'=>'available',
            'user_id'=>1,
            'price' => $this->faker->randomFloat(2, 50, 2000),
            'created_at' => now(),
        ];
    }
}
