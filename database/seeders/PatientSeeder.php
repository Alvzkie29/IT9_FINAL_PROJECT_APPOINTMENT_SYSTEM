<?php

namespace Database\Seeders;
use App\Models\Patient;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 100; $i++) {
            $user = User::create([
                'firstname' => $faker->firstname,
                'lastname' => $faker->lastname,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);

            Patient::create([
                'user_id' => $user->id,
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'age' => $faker->numberBetween(18, 80),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'contact' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'marital' => $faker->randomElement(['Single', 'Married']),
            ]);
        }
    }
}
