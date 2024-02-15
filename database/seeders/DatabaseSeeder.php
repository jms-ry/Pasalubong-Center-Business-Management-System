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

        // Address seeders
        \App\Models\Address::factory()->create([
            'id' => 1,
            'street_one' => "123 Main St",
            'street_two' => "Apt. 456",
            'municipality' => "Bangytown",
            'city' => "CA",
            'zip_code' => "32555"
        ]);

        \App\Models\Address::factory()->create([
            'id' => 2,
            'street_one' => "143 Main St",
            'street_two' => "Apt. 356",
            'municipality' => "Bangtown",
            'city' => "PHO",
            'zip_code' => "67845"
        ]);

        \App\Models\Address::factory()->create([
            'id' => 3,
            'street_one' => "153 Main St",
            'street_two' => "Apt. 426",
            'municipality' => "Newtown",
            'city' => "NY",
            'zip_code' => "32234" 
        ]);
        \App\Models\Address::factory()->create([
            'id' => 4,
            'street_one' => "113 Main St",
            'street_two' => "Apt. 106",
            'municipality' => "Newtown",
            'city' => "NYC",
            'zip_code' => "325464" 
        ]);
        \App\Models\Address::factory()->create([
            'id' => 5,
            'street_one' => "152 Main St",
            'street_two' => "Apt. 126",
            'municipality' => "Newtown",
            'city' => "BKN",
            'zip_code' => "3324" 
        ]);
        \App\Models\Address::factory()->create([
            'id' => 6,
            'street_one' => "133 Main St",
            'street_two' => "Apt. 226",
            'municipality' => "Boston",
            'city' => "DC",
            'zip_code' => "35434" 
        ]);

        // User seeders
        \App\Models\User::factory()->create([
            'id'=>1,
            'name' => 'Admn Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
            'address_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'id'=> 2,
            'name' => 'Rhett Bumbray',
            'email' => 'cashier@example.com',
            'role' => 'cashier',
            'password' => bcrypt('password'),
            'address_id' => 2
        ]);

        \App\Models\User::factory()->create([
            'id'=> 3,
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'role' => 'cashier',
            'password' => bcrypt('password'),
            'address_id' => 3
        ]);

        //Employee seeders

        \App\Models\Employee::factory()->create([
            'id' => 1,
            'user_id' => 1
        ]);

        \App\Models\Employee::factory()->create([
            'id' => 2,
            'user_id' => 2
        ]);

        \App\Models\Employee::factory()->create([
            'id' => 3,
            'user_id' => 3
        ]);

        //Customer seeders
        \App\Models\Customer::factory()->create([
            'id' => 1,
            'first_name'=>'Keyaan',
            'last_name'=>'Hussain',
            'email_address'=>'keyaan@email.com',
            'address_id'=> 1,
        ]);

        
        \App\Models\Customer::factory()->create([
            'id'=> 2,
            'first_name'=>'Mikolaj',
            'last_name'=>'Stokes',
            'email_address'=>'mikolaj@email.com',
            'address_id'=> 2,
        ]);

        
        \App\Models\Customer::factory()->create([
            'id'=> 3,
            'first_name'=>'Darcy',
            'last_name'=>'Reeves',
            'email_address'=>'darcy@email.com',
            'address_id'=> 3,
        ]);

        
        \App\Models\Customer::factory()->create([
            'id'=> 4,
            'first_name'=>'Oliwian',
            'last_name'=>'Stanton',
            'email_address'=>'oliwian@email.com',
            'address_id'=> 4,
        ]);

        
        \App\Models\Customer::factory()->create([
            'id'=> 5,
            'first_name'=>'Hussain',
            'last_name'=>'Marshall',
            'email_address'=>'hussain@email.com',
            'address_id'=> 5,
        ]);

        
        \App\Models\Customer::factory()->create([
            'id'=> 6,
            'first_name'=>'Alana',
            'last_name'=>'Giles',
            'email_address'=>'alana@email.com',
            'address_id'=> 6,
        ]);

        //Supplier seeders

        \App\Models\Supplier::factory()->create([
            'id' => 1,
            'address_id' => 1,
            'company_name' => 'Acme Inc.',
            'company_abbreviation' => 'ACME',
            'email_address' => 'acme@email.com',
        ]);

        \App\Models\Supplier::factory()->create([
            'id' => 2,
            'address_id' => 2,
            'company_name' => 'J&F Department Store',
            'company_abbreviation' => 'J&F',
            'email_address' => 'jf@email.com',
        ]);

        \App\Models\Supplier::factory()->create([
            'id' => 3,
            'address_id' => 3,
            'company_name' => 'Prince Hypermart',
            'company_abbreviation' => 'Prince',
            'email_address' => 'prince@email.com',
        ]);

        \App\Models\Supplier::factory()->create([
            'id' => 4,
            'address_id' => 4,
            'company_name' => 'Gaisano Supermart',
            'company_abbreviation' => 'Gaisano',
            'email_address' => 'gaisano@email.com',
        ]);

        \App\Models\Supplier::factory()->create([
           'id' => 5,
           'address_id' => 5,
           'company_name' => 'Robinsons Supermarket',
           'company_abbreviation' => 'Robinsons',
           'email_address' => 'robinsons@email.com',
        ]);

        \App\Models\Supplier::factory()->create([
            'id' => 6,
            'address_id' => 6,
            'company_name' => 'Hussain Store',
            'company_abbreviation' => 'Hussain',
            'email_address' => 'hussain@email.com',
        ]);

        //Product seeders
        \App\Models\Product::factory()->create([
            'supplier_id' => 1,
            'bar_code' => '123456789012',
            'name'=> 'Mango Chew Delight',
            'description' => 'Dried mango slices, a tropical treat',
            'unit' => 'pack',
            'quantity' => 100,
            'unit_price' => 5.99,
            'delivered_date' => '2023-01-01'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 2,
            'bar_code' => '234567890123',
            'name'=> 'Local Blend Coffee',
            'description' => 'A unique coffee blend from the region.',
            'unit' => 'box',
            'quantity' => 100,
            'unit_price' => 8.49,
            'delivered_date' => '2023-11-11'
        ]);

        
        \App\Models\Product::factory()->create([
            'supplier_id' => 3,
            'bar_code' => '345678901234',
            'name'=> 'Handwoven Souvenir Scarf',
            'description' => 'Colorful scarf showcasing local craftsmanship.',
            'unit' => 'piece',
            'quantity' => 100,
            'unit_price' => 12.99,
            'delivered_date' => '2023-05-16'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 4,
            'bar_code' => '345678901234',
            'name'=> 'Handwoven Souvenir Scarf',
            'description' => 'Colorful scarf showcasing local craftsmanship.',
            'unit' => 'piece',
            'quantity' => 100,
            'unit_price' => 12.99,
            'delivered_date' => '2023-08-21'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 5,
            'bar_code' => '456789012345',
            'name'=> 'Coconut Chocolate Bites',
            'description' => 'Chocolate-covered coconut bites',
            'unit' => 'pack',
            'quantity' => 100,
            'unit_price' => 4.99,
            'delivered_date' => '2023-05-11'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 6,
            'bar_code' => '678901234567',
            'name'=> 'Pineapple Jam Jar',
            'description' => 'Locally made pineapple jam in a charming jar.',
            'unit' => 'bottle',
            'quantity' => 100,
            'unit_price' => 7.99,
            'delivered_date' => '2023-12-11'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 1,
            'bar_code' => '789012345678',
            'name'=> 'Batik Print Handkerchief',
            'description' => 'Handkerchief featuring traditional batik prints.',
            'unit' => 'piece',
            'quantity' => 100,
            'unit_price' => 3.99,
            'delivered_date' => '2023-08-22'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 2,
            'bar_code' => '890123456789',
            'name'=> 'Turmeric Infused Honey',
            'description' => 'Honey infused with local turmeric.',
            'unit' => 'bottle',
            'quantity' => 100,
            'unit_price' => 9.99,
            'delivered_date' => '2023-10-11'
        ]);

        
        \App\Models\Product::factory()->create([
            'supplier_id' => 3,
            'bar_code' => '012345678901',
            'name'=> 'Caramelized Pili Nuts',
            'description' => 'Pili nuts coated in sweet caramel.',
            'unit' => 'pack',
            'quantity' => 100,
            'unit_price' => 11.99,
            'delivered_date' => '2023-04-11'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 4,
            'bar_code' => '123450987654',
            'name'=> 'Tribal Artisan Necklace',
            'description' => 'Handmade necklace featuring tribal designs.',
            'unit' => 'piece',
            'quantity' => 100,
            'unit_price' => 14.99,
            'delivered_date' => '2023-08-22'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 5,
            'bar_code' => ' 234509876543',
            'name'=> 'Tamarind Candy Pack',
            'description' => 'Tangy tamarind candies in a vibrant pack.',
            'unit' => 'pack',
            'quantity' => 100,
            'unit_price' => 3.99,
            'delivered_date' => '2023-11-11'
        ]);

        \App\Models\Product::factory()->create([
            'supplier_id' => 6,
            'bar_code' => '567890123450',
            'name'=> 'Ube Jam Jar',
            'description' => 'Sweet and purple yam jam in a jar.',
            'unit' => 'bottle',
            'quantity' => 100,
            'unit_price' => 10.99,
            'delivered_date' => '2023-06-11'
        ]);
    }
}
