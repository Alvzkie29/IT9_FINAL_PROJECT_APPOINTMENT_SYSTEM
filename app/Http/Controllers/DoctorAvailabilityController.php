<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorAvailability;

class DoctorAvailabilityController extends Controller
{

    
   
    public function create($DoctorId)
    {
        $availabilities = DoctorAvailability::where('DoctorId', $DoctorId)->get();
        return view('availability', compact('DoctorId', 'availabilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'DoctorId' => 'required|exists:add_doctors,DoctorId',
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required',
            'end_time'   => 'required|after:start_time',
      
        ]);
        $exists = DoctorAvailability::where('DoctorId', $validated['DoctorId'])
                ->where('day', $validated['day'])
                ->exists();

    if ($exists) {
        return back()->withErrors(['day' => 'This doctor already has availability set for this day.'])->withInput();
    }

        DoctorAvailability::create([
            'DoctorId' => $validated['DoctorId'],
            'day' => $validated['day'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
        ]);

        return redirect()->route('Availability', $validated['DoctorId'])->with('success', 'Availability added successfully.');
    }

    public function show()
    {
        $availabilities = DoctorAvailability::all();
        return view('availability', compact('availabilities'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'availability_id' => 'required|exists:doctor_availabilities,AvailabilityId',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $availability = DoctorAvailability::findOrFail($request->availability_id);

        $availability->start_time = $request->start_time;
        $availability->end_time = $request->end_time;
        $availability->save();

        return redirect()->back()->with('success', 'Availability updated successfully.');
    }

    public function destroy($AvailabilityId)
    {
        $availability = DoctorAvailability::findOrFail($AvailabilityId);
        $doctorId = $availability->DoctorId; 
        $availability->delete();
    
        return redirect()->route('Availability', $doctorId)->with('success', 'Availability deleted successfully.');
    }

    public function toggleStatus($AvailabilityId)
    {
        $availability = DoctorAvailability::findOrFail($AvailabilityId);
        $availability->status = $availability->status === 1 ? 0 : 1; 
        $availability->save();

        return redirect()->back()->with('success', 'Availability status updated successfully.');
    }

}