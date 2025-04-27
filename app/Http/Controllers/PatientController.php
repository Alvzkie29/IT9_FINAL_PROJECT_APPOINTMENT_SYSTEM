<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::paginate(2);
        return view('patient_list', compact('patients')); 
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
    
        // Validate the incoming data
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'contact' => 'required|string|max:20',
            'email' => 'required|email|unique:patients',  
            'marital' => 'required|string',
        ]);
    
        $validated['user_id'] = $user_id;
        Patient::create($validated);
    
 
        $user = Auth::user();
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
    public function fetchPatientInfo()
{
    $user_id = Auth::id(); 
    $patient = Patient::where('user_id', $user_id)->first(); 

    return view('user.patient_info', compact('patient'));
}
public function search(Request $request)
{
    $query = $request->input('search');
    $patients = Patient::where('firstname', 'like', "%$query%")
        ->orWhere('lastname', 'like', "%$query%")
        ->orWhere('email', 'like', "%$query%")
        ->paginate(2) // Use pagination set to 2
        ->appends(['search' => $query]); // Append the search query to pagination links

    return view('patient_list', compact('patients'));
}
}

