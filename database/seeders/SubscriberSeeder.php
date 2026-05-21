<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriberSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            for ($i = 0; $i < 15; $i++) {
                $active = (bool) random_int(0, 4); // ~80% active
                Subscriber::create([
                    'email' => fake()->unique()->safeEmail(),
                    'is_active' => $active,
                    'subscribed_at' => Carbon::now()->subDays(random_int(1, 365)),
                    'unsubscribed_at' => $active ? null : Carbon::now()->subDays(random_int(0, 30)),
                ]);
            }
        });
    }
}
