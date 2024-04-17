<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\UserAdditionalData;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if(User::get()->count() == 0){
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'test@test.com',
                'user_type' => 'Fusion',
                'phone_number' => '9876543210',
                'password' => Hash::make('12345678'),
                'role'     => 'admin'
            ]);
            UserAdditionalData::create([
                'user_id' => 1,
                'country' => 'Australia'
            ]);

            
            User::factory()->create([
                'name' => 'Satpal Singh Sekhon',
                'email' => 'satpalinfilogix@gmail.com',
                'user_type' => 'Fusion',
                'phone_number' => '9876543210',
                'password' => Hash::make('12345678'),
            ]);
            UserAdditionalData::create([
                'user_id' => 2,
                'country' => 'India'
            ]);

            User::factory()->create([
                'name' => 'Simranjeet Singh Bhangu',
                'email' => 'simranjeet@gmail.com',
                'user_type' => 'Fusion',
                'phone_number' => '9876543210',
                'password' => Hash::make('12345678'),
            ]);
            UserAdditionalData::create([
                'user_id' => 3,
                'country' => 'India'
            ]);
        }

        $this->call([
            CountrySeeder::class,
        ]);
    }
}
