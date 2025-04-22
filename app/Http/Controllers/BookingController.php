<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\AddDoctor;
use App\Models\DoctorAvailability;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function create()
    {
       
        $doctors = AddDoctor::all();
        $patient = Patient::where('user_id', Auth::id())->first();

        if (!$patient) {
            return redirect()->route('AccountDetails')->with('error', 'Please complete your patient information first.');
        }

        return view('user.booking', compact('doctors', 'patient'));
    }

        public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:add_doctors,DoctorId',
            'date' => 'required|date',
            'time' => 'required',
            'concern' => 'required|string|max:255',
        ]);

        // Retrieve the patient linked to the authenticated user
        $patient = Patient::where('user_id', Auth::id())->first();

        if (!$patient) {
            return redirect()->route('AccountDetails')->with('error', 'Please complete your patient information first.');
        }

        // Create a new booking
        Booking::create([
            'patient_id' => $patient->id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'time' => $request->time,
            'concern' => $request->concern,
            'status' => 'pending',
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Appointment request submitted successfully!');
    }


    // Function to get available time slots
    public function getAvailableTimeSlots(Request $request)
    {
        $doctorId = $request->query('doctor_id');
        $date = $request->query('date');

        // Fetch the doctor's availability based on date and doctor
        $availability = DoctorAvailability::where('DoctorId', $doctorId)
        ->where('day', date('l', strtotime($date)))
        ->first();

        if (!$availability) {
            return response()->json([]);
        }

        // Generate available time slots (assuming 30-minute intervals)
        $startTime = Carbon::createFromFormat('H:i:s', $availability->start_time);
        $endTime = Carbon::createFromFormat('H:i:s', $availability->end_time);

        $slots = [];
        while ($startTime < $endTime) {
            $slots[] = $startTime->format('H:i');
            $startTime->addMinutes(30);
        }

        return response()->json($slots);
    }

    //FOR ADMINS

        public function index()
    {
        $bookings = Booking::with(['doctor', 'patient.user'])
                    ->orderBy('date', 'asc')
                    ->get();

        return view('appointment_list', compact('bookings'));
    }   

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'confirmed';
        $booking->save();

        return redirect()->route('appointmentlist')->with('success', 'Appointment confirmed!');
    }

}

