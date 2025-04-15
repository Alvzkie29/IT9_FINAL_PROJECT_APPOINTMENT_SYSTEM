
<?php

use App\Models\AddDoctor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddDoctorController;
use App\Http\Controllers\DoctorAvailabilityController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login'); // Redirect to login page by default
});

Route::get('/redirect', function () {
    $user = Auth::user();

    // Check if the user is an admin or a regular user
    if ($user->role === 'admin') {
        return redirect('/Admin/Dashboard');  // Admin dashboard
    }

    return redirect('/user/dashboard');  // User dashboard
})->name('redirect');


Route::middleware(['auth' , 'role:admin'])->group(function () {
    
    Route::get('/Admin/Dashboard', function () {
        return view('mainpage');
    })->name('mainpage');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/appointmentlist', function () {
        return view('appointment_list');
    })->name('appointmentlist');

    Route::get('/appointmentrecord', function () {
        return view('appointment_record');
    })->name('appointmentrecord');

    // for doctors
    Route::get('/AddDoctor', function () {
        return view('doctor_add');      
    })->name('AddDoctor');

    Route::post('/AddDoctor', [AddDoctorController::class, 'store'])->name('StoreDoctor');
    Route::get('/DoctorList', [AddDoctorController::class, 'list'])->name('DoctorList');     
    Route::get('/DoctorRecord', [AddDoctorController::class, 'show'])->name('DoctorRecord');
    Route::get('/doctor/edit/{DoctorId}', [AddDoctorController::class, 'edit'])->name('DoctorEdit');
    Route::put('/doctor/update/{DoctorId}', [AddDoctorController::class, 'update'])->name('DoctorUpdate');
    Route::delete('/doctor/{id}', [AddDoctorController::class, 'destroy'])->name('DeleteDoctor');
    Route::get('/doctors/view/{id}', [AddDoctorController::class, 'view'])->name('DoctorView');
    
    //Doctor Availability
    Route::post('/doctor-availability/store', [DoctorAvailabilityController::class, 'store'])->name('DoctorAvailability.store');
    Route::get('/doctor-availability', [DoctorAvailabilityController::class, 'index'])->name('AvailabilityList');
    Route::get('/doctor-availability/{DoctorId}', [DoctorAvailabilityController::class, 'create'])->name('Availability');
    Route::delete('/doctor-availability/{AvailabilityId}', [DoctorAvailabilityController::class, 'destroy'])->name('DeleteDoctorAvailability');
    Route::put('/doctor-availability/update', [DoctorAvailabilityController::class, 'update'])->name('UpdateDoctorAvailability');
    

    // for patient
    Route::get('/PatientList', function () {
        return view('patient_list'); 
    })->name('PatientList');    
    Route::get('/PatientRecord', function () {
        return view('patient_record'); 
    })->name('PatientRecord');
    Route::get('/AddPatient', function () {
        return view('patient_add'); 
    })->name('AddPatient');

    //Adding Patients
    Route::post('/AddPatient',[PatientController::class, 'store'])->name('StoredPatient');
    Route::get('/patients', [PatientController::class, 'index'])->name('PatientList');
    Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search');
        
    //Patient Edit Update Delete and Show
    Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');
    Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');


    //Appointment
    Route::get('/Appointment', function () {
        return view('appointment.appointment_list'); 
    })->name('appointment.appointment_list');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard'); // Create this blade file
    })->name('user.dashboard');

    Route::get('/History',function () {
        return view('user.history'); 
    })->name('user.history');

    Route::get('/Booking',function () {
        return view('user.booking'); 
    })->name('user.booking');

    Route::get('/MedicalForm', function () {
        return view('transaction.medical_form'); 
    })->name('MedicalForm');

});


require __DIR__.'/auth.php';

