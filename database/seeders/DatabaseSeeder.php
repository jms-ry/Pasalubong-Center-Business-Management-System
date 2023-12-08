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
        // \App\Models\User::factory(10)->create();

       

        \App\Models\Address::factory()->create([
            'id' => 1,
            'street_one' => "123 Main St",
            'municipality' => "Bangytown",
            'city' => "CA",
            'zip_code' => "32555"
        ]);

        \App\Models\Address::factory()->create([
            'id' => 2,
            'street_one' => "123 Main St",
            'municipality' => "Bangtown",
            'city' => "PHO",
            'zip_code' => "67845"
        ]);

        \App\Models\User::factory()->create([
            'id'=>1,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
            'address_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'id'=> 2,
            'name' => 'Cashier User',
            'email' => 'cashier@example.com',
            'role' => 'cashier',
            'password' => bcrypt('password'),
            'address_id' => 2
        ]);
    }
}
