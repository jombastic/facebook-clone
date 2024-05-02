<?php

namespace Database\Seeders;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $friends = Friend::all();

        foreach ($users as $user) {
            $randomFriends = $friends->random(rand(1, $friends->count()));
            foreach ($randomFriends as $friend) {
                // Check if the friendship already exists to avoid duplicates
                if (!$user->friends()->where('friend_id', $friend->id)->exists()) {
                    $user->friends()->attach($friend->id);
                }
            }
        }
    }
}
