<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
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
            'First_Name' => 'Adrian',
            'Last_Name' => 'Daniel',
            'role' => 'user',
            'enterprise' => null,
            'email' => 'adriandaniel1803@gmail.com',
            'phone' => '085156638848',
            'password' => bcrypt('test'),
            'subscription' => null,
        ]);

        // Subscription::factory()->create();

    }
}
