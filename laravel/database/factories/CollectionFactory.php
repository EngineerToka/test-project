<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class CollectionFactory extends Factory
{
    protected $model = Collection::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->word(2,true);

        return [
        'title'=>ucfirst($title),
        'description'=>$this->faker->sentence(10),
        'user_id'=>1,
        'slug'=>Str::slug($title),
        'cover_img' => 'collections/' . $this->faker->image('public/storage/collections', 640, 480, null, false),
        'created_at' => now(),
        ];
    }
}
