<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // client
        User::factory()->create([
            'name' => 'Test Client',
            'email' => 'client@example.com',
        ]);

        // admin
        User::factory()->admin()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
        ]);

        $this->call(
            ProductSeeder::class,
        );
    }
}
