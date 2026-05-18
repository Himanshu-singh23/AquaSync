<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Standard User
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => bcrypt('password'),
        ]);

        // Admin User
        User::factory()->create([
            'name' => 'System Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        // Service Provider (Validated)
        $provider = User::factory()->create([
            'name' => 'Eco-Plumbing Solutions',
            'email' => 'provider@example.com',
            'role' => 'provider',
            'is_validated' => true,
            'password' => bcrypt('password'),
        ]);

        // Seed some services for the validated provider
        \App\Models\Service::create([
            'user_id' => $provider->id,
            'title' => 'Smart Meter Installation',
            'description' => 'Upgrade your water meter to an electronic smart meter with dynamic leak tracking integration.',
            'price' => '$250 Fixed Rate',
            'contact_email' => 'services@ecoplumbing.com',
        ]);

        \App\Models\Service::create([
            'user_id' => $provider->id,
            'title' => 'Whole-Home Leak Audit',
            'description' => 'A comprehensive check of all faucets, pipes, irrigation systems, and tanks to detect hidden micro-leaks.',
            'price' => '$120 / audit',
            'contact_email' => 'services@ecoplumbing.com',
        ]);

        // Expert (Validated)
        $expert = User::factory()->create([
            'name' => 'Dr. Water Conservationist',
            'email' => 'expert@example.com',
            'role' => 'expert',
            'is_validated' => true,
            'password' => bcrypt('password'),
        ]);

        // Service Provider (Pending)
        User::factory()->create([
            'name' => 'AquaTech Irrigation',
            'email' => 'pending-provider@example.com',
            'role' => 'provider',
            'is_validated' => false,
            'password' => bcrypt('password'),
        ]);

        // Expert (Pending)
        User::factory()->create([
            'name' => 'Prof. Hydrology Expert',
            'email' => 'pending-expert@example.com',
            'role' => 'expert',
            'is_validated' => false,
            'password' => bcrypt('password'),
        ]);

        // Create Devices for User
        $shower = \App\Models\Device::create([
            'user_id' => $user->id,
            'name' => 'Master Shower',
            'type' => 'shower',
            'location' => 'Main Bathroom',
        ]);

        $sprinkler = \App\Models\Device::create([
            'user_id' => $user->id,
            'name' => 'Backyard Lawn Sprinklers',
            'type' => 'sprinkler',
            'location' => 'Garden',
        ]);

        $kitchen = \App\Models\Device::create([
            'user_id' => $user->id,
            'name' => 'Kitchen Sink Faucet',
            'type' => 'sink',
            'location' => 'Kitchen',
        ]);

        // Water Usage Data
        \App\Models\WaterUsage::create([
            'device_id' => $shower->id,
            'consumed_liters' => 45.5,
            'recorded_at' => now()->subDays(2),
        ]);

        \App\Models\WaterUsage::create([
            'device_id' => $shower->id,
            'consumed_liters' => 50.2,
            'recorded_at' => now()->subDay(),
        ]);

        \App\Models\WaterUsage::create([
            'device_id' => $sprinkler->id,
            'consumed_liters' => 120.0,
            'recorded_at' => now()->subDays(3),
        ]);

        \App\Models\WaterUsage::create([
            'device_id' => $kitchen->id,
            'consumed_liters' => 12.4,
            'recorded_at' => now()->subHours(5),
        ]);

        // Seed Goal for John Doe
        \App\Models\Goal::create([
            'user_id' => $user->id,
            'target_liters_per_month' => 500.0,
            'month_year' => date('m-Y'),
        ]);

        // Seed Tips
        \App\Models\Tip::create([
            'user_id' => $expert->id,
            'title' => 'Shorten your showers',
            'content' => 'Shortening your shower by just 2 minutes can save up to 30 liters of water per shower!',
            'location_tag' => 'indoor',
        ]);

        \App\Models\Tip::create([
            'user_id' => $expert->id,
            'title' => 'Water your lawn during cooler hours',
            'content' => 'Watering the garden early in the morning or late in the evening reduces evaporation loss by 25%.',
            'location_tag' => 'outdoor',
        ]);

        \App\Models\Tip::create([
            'user_id' => $expert->id,
            'title' => 'Fix leaky faucets immediately',
            'content' => 'A small drip from a leaky faucet can waste up to 75 liters of water every single day!',
            'location_tag' => 'general',
        ]);
    }
}
