@extends('layouts.app')

@section('title', 'Patient Records')

@section('content')
<div class="main p-2">

    <!-- Header and Back Button -->
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('PatientList') }}" class="btn btn-outline-primary me-3">
            <i class="ri-arrow-go-back-fill"></i> &nbsp Back to List
        </a>
        <h2 class="mb-0 text-primary">Patient Records</h2>
    </div>

    <!-- Patient Information -->
    <div class="card shadow-sm mb-4">
        <div class="card-header text-white fw-bold" style="background-color: #0e2238;">
            Personal Information
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4"><strong>Name:</strong> {{ $patient->firstname }} {{ $patient->lastname }}</div>
                <div class="col-md-4"><strong>Age:</strong> {{ $patient->age }}</div>
                <div class="col-md-4"><strong>Gender:</strong> {{ ucfirst($patient->gender) }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>Contact No.:</strong> {{ $patient->contact }}</div>
                <div class="col-md-4"><strong>Email:</strong> {{ $patient->email }}</div>
                <div class="col-md-4"><strong>Marital Status:</strong> {{ $patient->marital }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header text-white fw-bold" style="background-color: #0e2238;">
                    <i class="fas fa-notes-medical me-1"></i> Medical History
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Medical History</th>
                                    <th>Prescriptions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header text-white fw-bold" style="background-color: #0e2238">
                    <i class="fas fa-calendar-check me-1"></i> Appointments
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                    
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
