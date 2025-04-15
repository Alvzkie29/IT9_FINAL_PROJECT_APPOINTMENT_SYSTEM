@extends('layouts.app')

@section('title', 'Patient Records')
@section('content')

<div class="main">
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('PatientList') }}" class="btn btn-sm btn-primary me-2">
            <i class="fa-solid fa-backward-step fa-lg "></i>

        </a>
        <h1 class="text-primary mb-0">Patient Records</h1>
    </div>
    <div class="border"></div>
        <div class="row mt-4">
            <div class="col">
                <div class="card p-4">
                    <p><strong>Name:</strong> {{ $patient->firstname }} {{ $patient->lastname }}</p>
                    <p><strong>Age:</strong> {{ $patient->age }}</p>
                    <p><strong>Gender:</strong> {{ ucfirst($patient->gender) }}</p>
                    <p><strong>Contact No.:</strong> {{ $patient->contact }}</p>
                    <p><strong>Email:</strong> {{ $patient->email }}</p>
                    <p><strong>Marital Status:</strong> {{ $patient->marital }}</p>
                   
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row mt-3">
                 <div class="col">
                    <div class="card p-3">
                        <span class="text-primary">Patient History</span>
                        <div class="table mt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Medical History</th>
                                        <th>Prescription</th>

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
        </div>
        <div class="col-md-6">
            <div class="row mt-3">
                <div class="col">
                    <div class="card p-3">
                        <span class="text-primary">Appointments</span>
                        <div class="table mt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
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
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection