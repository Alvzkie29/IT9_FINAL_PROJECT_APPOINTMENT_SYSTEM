<?php
namespace App\Http\Controllers;

use App\Models\AddDoctor;
use App\Models\Booking;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

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

    public function getAppointmentsByYear($year)
    {
        $monthlyData = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->whereYear('created_at', $year)
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->keyBy('month');
    
        $completeData = [];
    
        for ($i = 1; $i <= 12; $i++) {
            $completeData[] = [
                'month' => $i,
                'count' => $monthlyData->has($i) ? $monthlyData[$i]->count : 0
            ];
        }
    
        return response()->json($completeData);
    }
    
    
}
