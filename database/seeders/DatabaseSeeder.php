<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        for ($i = 0; $i < 500; $i++) {
            \App\Models\User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => hash('egumis'),
            ]);

        }
    }
}
