<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {        
        return [
            'users_id' => 1,
            'subscription_duration' => Carbon::now()->addMonth(),
            'subscription_start_date' => Carbon::now(),
            'subscription_end_date' => Carbon::now()->addMonth(),
            'subscription_status' => 'active',
            'snap_token' => null,
            'payment_status' => null,
        ];
    }
}
