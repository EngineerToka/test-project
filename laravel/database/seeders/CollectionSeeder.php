<?php

namespace Database\Seeders;

use App\Models\Collection;
use Database\Factories\CollectionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    public function run(): void
    {
        Collection::factory()->count(10)->create();
    }
}
