<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\AddDoctor;
use App\Models\DoctorAvailability;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        for ($i = 0; $i < 10; $i++) {
            // Create doctor
            $doctor = AddDoctor::create([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'age' => $faker->numberBetween(25, 65),
            'gender' => $faker->randomElement(['Male', 'Female']),
            'email' => $faker->unique()->safeEmail,
            'marital' => $faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'street' => $faker->streetAddress,
            'city' => $faker->city,
            'country' => $faker->country,
            'postal' => $faker->postcode,
            'contact' => $faker->phoneNumber,
            'specialization' => $faker->word,
            'qualification' => $faker->word,
            'image_path' => 'storage/doctor_images/doctor' . rand(1, 2) . '.png',
            'bio' => $faker->paragraph(3),
        ]);


            if ($doctor && $doctor->DoctorId) {
                $randomDays = collect($weekDays)->shuffle()->take(5);

                foreach ($randomDays as $day) {
                    DoctorAvailability::create([
                        'DoctorId' => $doctor->DoctorId,
                        'day' => $day,
                        'start_time' => $faker->time('H:i'),
                        'end_time' => $faker->time('H:i'),
                        'status' => $faker->boolean,
                    ]);
                }
            }
        }
    }
}
