<?php

namespace Database\Seeders;

use App\Models\Friend;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(FriendSeeder::class);
        $times = rand(1, 10);
        for ($i = 0; $i < $times; $i++) {
            $this->call(UserFriendSeeder::class);
        }
    }
}
