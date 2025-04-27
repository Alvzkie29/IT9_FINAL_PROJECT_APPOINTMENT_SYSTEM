@extends('layouts.nav')

@section('content')
<div class="container mt-2">
    <div class="hero-section text-center">
        <h1 class="display-4">Your Patient Information</h1>
        <p class="lead">View and manage your personal details.</p>
    </div>
    <div class="border p-3">
        <a href="{{route('AccountDetails')}}" class="btn btn-outline-primary btn-lg mx-2 shadow-sm rounded-pill px-4 py-2">
            <i class="ri-user-add-line"></i> Create Personal Info
        </a>
        <a href="{{ route('PatientInfo') }}" class="btn btn-outline-primary btn-lg mx-2 shadow rounded-pill px-4 py-2">
            <i class="ri-user-line"></i> Patient Details
        </a>
        <a href="{{route('user.booking')}}" class="btn btn-outline-primary btn-lg mx-2 shadow-sm rounded-pill px-4 py-2 ">
            <i class="ri-calendar-check-line"></i> Book an Appointment
        </a>
        <div class="row mt-3">
            <div class="col">
                @if($patient)
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="border rounded-4 p-4 bg-light">
                            <h4 class="mb-4 text-center fw-bold text-primary">
                                <i class="ri-user-heart-line"></i> Patient Profile
                            </h4>
                            <div class="row g-3">
                                <div class="col-md-12 text-center mb-3">
                                    <img src="{{ asset('icon/man.png') }}" 
                                         alt="Patient Picture" class="rounded-circle shadow-sm" width="100" height="100">
                                </div>
    
                                <div class="col-md-4">
                                    <div class="card p-3 border-0 shadow-sm bg-white rounded-3">
                                        <small class="text-muted">First Name</small>
                                        <span class="fw-bold text-dark">{{ $patient->firstname }}</span>
                                    </div>
                                </div>
        
                                <div class="col-md-4">
                                    <div class="card p-3 border-0 shadow-sm bg-white rounded-3">
                                        <small class="text-muted">Last Name</small>
                                        <span class="fw-bold text-dark">{{ $patient->lastname }}</span>
                                    </div>
                                </div>
        
                                <div class="col-md-4">
                                    <div class="card p-3 border-0 shadow-sm bg-white rounded-3">
                                        <small class="text-muted">Age</small>
                                        <span class="fw-bold text-dark">{{ $patient->age }}</span>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="card p-3 border-0 shadow-sm bg-white rounded-3">
                                        <small class="text-muted">Gender</small>
                                        <span class="fw-bold text-dark">{{ $patient->gender }}</span>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="card p-3 border-0 shadow-sm bg-white rounded-3">
                                        <small class="text-muted">Marital Status</small>
                                        <span class="fw-bold text-dark">{{ $patient->marital }}</span>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="card p-3 border-0 shadow-sm bg-white rounded-3">
                                        <small class="text-muted">Contact</small>
                                        <span class="fw-bold text-dark">{{ $patient->contact }}</span>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="card p-3 border-0 shadow-sm bg-white rounded-3">
                                        <small class="text-muted">Email</small>
                                        <span class="fw-bold text-dark">{{ $patient->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center text-muted">No patient information found. Please create your profile.</p>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
