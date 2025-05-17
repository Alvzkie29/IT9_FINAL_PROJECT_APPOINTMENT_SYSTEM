<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserReviewsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $userIds = DB::table('users')->pluck('id')->toArray();

        if (empty($userIds)) {
            $this->command->info('No users found. Please seed users table first.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            DB::table('user_reviews')->insert([
                'user_id' => $faker->randomElement($userIds),
                'review' => $faker->sentence(10, true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
