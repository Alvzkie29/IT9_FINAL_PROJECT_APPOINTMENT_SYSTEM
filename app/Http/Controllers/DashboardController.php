<?php
namespace App\Http\Controllers;

use App\Models\AddDoctor;
use App\Models\Booking;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch counts for doctors, appointments, and patients
        $doctorCount = AddDoctor::count();
        $appointmentCount = Booking::count();
        $patientCount = Patient::count();

        return view('mainpage', compact('doctorCount', 'appointmentCount', 'patientCount'));
    }
}
