<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run(): void
    {
          // Admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        // Artists
        User::factory(5)->create([
            'role' => 'artist',
        ]);

        // Customers
        User::factory(5)->create([
            'role' => 'customer',
        ]);
    }
}
