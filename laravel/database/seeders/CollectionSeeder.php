<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\CollectionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CollectionFactory::factory()->count(10)->create();
    }
}
