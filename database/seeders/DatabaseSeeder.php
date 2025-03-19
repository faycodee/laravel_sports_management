<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
  
            User::create([
                "name" => "admin",
                "email" => "admin@example.com",
                "password" => Hash::make("Faysal223344"),
                "role" => "admin"
            ]);
            User::create([
                "name" => "user",
                "email" => "user@example.com",
                "password" => Hash::make("Faysal223344"),
                "role" => "user"
            ]);
            

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
