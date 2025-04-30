@extends('layouts.app')

@section('title', 'Clinic Dashboard')

@section('content')
<div class="container py-4">
    <!-- Header Section -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">Welcome, Clinic Administrator</h1>
        <p class="text-muted">Efficiently manage doctors, appointments, and patients in one place.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4 bg-white">
                <div class="text-primary mb-2"><i class="fas fa-user-md fa-2x"></i></div>
                <h5>Doctors</h5>
                <p class="fs-4 fw-bold">{{ $doctorCount }}</p>
                <a href="{{route('DoctorRecord')}}" class="btn btn-outline-primary btn-sm">Manage Doctors</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4 bg-white">
                <div class="text-success mb-2"><i class="fas fa-calendar-check fa-2x"></i></div>
                <h5>Appointments</h5>
                <p class="fs-4 fw-bold">{{ $appointmentCount }}</p>
                <a href="{{route('appointmentlist')}}" class="btn btn-outline-success btn-sm">View Appointments</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4 bg-white">
                <div class="text-secondary mb-2"><i class="fas fa-users fa-2x"></i></div>
                <h5>Patients</h5>
                <p class="fs-4 fw-bold">{{ $patientCount }}</p>
                <a href="{{route('PatientList')}}" class="btn btn-outline-secondary btn-sm">View Patients</a>
            </div>
        </div>
    </div>
</div>
@endsection
