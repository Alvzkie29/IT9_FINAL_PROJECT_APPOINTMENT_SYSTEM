<?php

namespace Database\Seeders;

use app\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
        PatientSeeder::class,
        DoctorSeeder::class,
        AdminSeeder::class,
        bookingsSeeder::class,
        AppointmentRecordsSeeder::class,
        UserReviewsSeeder::class,
       ]);
    }
}
