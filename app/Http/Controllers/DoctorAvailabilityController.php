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
            'day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'morning_from' => 'nullable|date_format:H:i',
            'morning_to' => 'nullable|date_format:H:i',
            'afternoon_from' => 'nullable|date_format:H:i',
            'afternoon_to' => 'nullable|date_format:H:i',
      
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
            'morning_from' => $validated['morning_from'],
            'morning_to' => $validated['morning_to'],
            'afternoon_from' => $validated['afternoon_from'],
            'afternoon_to' => $validated['afternoon_to'],
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
            'morning_from' => 'required',
            'morning_to' => 'required',
            'afternoon_from' => 'required',
            'afternoon_to' => 'required',
        ]);

        $availability = DoctorAvailability::findOrFail($request->availability_id);

        $availability->morning_from = $request->morning_from;
        $availability->morning_to = $request->morning_to;
        $availability->afternoon_from = $request->afternoon_from;
        $availability->afternoon_to = $request->afternoon_to;
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
}