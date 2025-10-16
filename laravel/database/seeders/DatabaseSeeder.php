<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ArtWorkSeeder;
use Database\Seeders\CollectionSeeder;
use Database\Seeders\ArtWorkImagesSeeder;
use Database\Seeders\ArtWorkCollectionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
        UserSeeder::class,
        CollectionSeeder::class,
        ArtWorkSeeder::class,
        ArtWorkCollectionSeeder::class,
        ArtWorkImagesSeeder::class,
        ]);
    }
}
