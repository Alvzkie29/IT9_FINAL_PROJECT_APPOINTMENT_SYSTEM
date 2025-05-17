<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class bookingsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $patientIds = DB::table('patients')->pluck('id')->toArray();
        $doctorIds = DB::table('add_doctors')->pluck('DoctorId')->toArray();

        if (empty($patientIds) || empty($doctorIds)) {
            $this->command->info('No patients or doctors found. Please seed patients and doctors first.');
            return;
        }
        for ($i = 0; $i < 20; $i++) {
            DB::table('bookings')->insert([
                'patient_id' => $faker->randomElement($patientIds),
                'doctor_id' => $faker->randomElement($doctorIds),
                'date' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'time' => $faker->time('H:i:s', 'now'),
                'concern' => $faker->sentence(6, true),
                'status' => $faker->randomElement(['pending', 'confirmed', 'cancelled']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
