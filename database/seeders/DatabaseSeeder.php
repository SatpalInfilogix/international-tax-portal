<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'role' => '1',
                'password' => Hash::make('12345678'),
            ]);
        }

        $this->call([
            CountrySeeder::class,
        ]);
    }
}
