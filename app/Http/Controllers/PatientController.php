<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->paginate(11);
        return view('patient_list', compact('patients'));
    }

    public function search(Request $request)
{
    $search = $request->input('search');

    $patients = Patient::where('firstname', 'like', "%{$search}%")
        ->orWhere('lastname', 'like', "%{$search}%")
        ->orWhere('email', 'like', "%{$search}%")
        ->orWhere('contact', 'like', "%{$search}%")
        ->latest()
        ->paginate(11)
        ->appends(['search' => $search]);

    return view('patient_list', compact('patients'));
}

public function store(Request $request)
{
    // Assign the user_id to the validated data before validation
    $user_id = Auth::id();
    
    // Validate the incoming data
    $validated = $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'age' => 'required|integer',
        'gender' => 'required|string',
        'contact' => 'required|string|max:20',
        'email' => 'required|email|unique:patients',  // No need for user_id validation
        'marital' => 'required|string',
    ]);

    // Add the logged-in user's ID to the validated data
    $validated['user_id'] = $user_id;

    // Create the patient record with the validated data
    Patient::create($validated);

    // Get the current user
    $user = Auth::user();

    // Redirect based on the user's role
    if ($user->role === 'admin') {
        return redirect()->route('PatientList')->with('success', 'Patient added successfully!');
    } else {
        return redirect()->route('AccountDetails')->with('success', 'Your patient profile has been saved!');
    }
}

    public function show($id){
        $patient = Patient::findOrFail($id); 
        return view('patient_record', compact('patient'));
    }

    public function create(){

    }
    public function edit($id){

        $patient = Patient::findOrFail($id); 
        return view('patient_edit', compact('patient')); 
    
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'contact' => 'required|string|max:20',
            'email' => 'required|email|unique:patients,email,' . $id,
            'marital' => 'required|string',
        ]);
    
        $patient = Patient::findOrFail($id);
        $patient->update($validated);
    
        return redirect()->route('PatientList')->with('success', 'Patient updated successfully!');
    }
    
    public function destroy($id){
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('PatientList')->with('success', 'Patient deleted successfully!');
    }
    

}

