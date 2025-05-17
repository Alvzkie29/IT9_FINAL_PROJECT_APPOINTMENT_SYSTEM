<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentRecordsSeeder extends Seeder
{
    public function run()
    {
        // Get existing booking IDs
        $bookingIds = DB::table('bookings')->pluck('BookingId')->toArray();

        if (empty($bookingIds)) {
            $this->command->info('No bookings found. Please seed bookings table first.');
            return;
        }

        foreach (array_slice($bookingIds, 0, 10) as $bookingId) {
            DB::table('appointment_records')->insert([
                'booking_id' => $bookingId,
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
