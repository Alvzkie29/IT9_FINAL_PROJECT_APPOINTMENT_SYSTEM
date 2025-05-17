@extends('layouts.app')

@section('title', 'Patient Records')
@section('scripts')
@section('content')
<div class="main p-2">
    <div class="d-flex align-items-center mb-4">
        <a 
            hx-get="{{ route('PatientList') }}" 
            class="btn btn-outline-primary me-3"
            hx-boost="true"
            hx-target="body"
           hx-push-url="true">
            <i class="ri-arrow-go-back-fill"></i> &nbsp Back to List
        </a>
        <h2 class="mb-0 text-primary">Patient Records</h2>
    </div>
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
</div>

@endsection
