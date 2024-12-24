<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'First_Name' => 'Test User',
            'Last_Name' => 'Test User',
            'role' => 'user',
            'enterprise' => null,
            'email' => 'adriandaniel1803@gmail.com',
            'phone' => '085156638848',
            'password' => bcrypt('test'),
            'subcription_id' => null,
        ]);
    }
}
