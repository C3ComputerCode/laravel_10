<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Article::factory(20)->create();
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         \App\Models\User::factory()->create([
            'name' => 'koko',
            'email' => 'koko@gmail.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'mgmg',
            'email' => 'mgmg@gmail.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'mama',
            'email' => 'mama@gmail.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'nini',
            'email' => 'nini@gmail.com',
        ]);
    }
}
