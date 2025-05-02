@extends('layouts.app')
@section('title', 'View Doctor')
@section('scripts')
@section('content')

<div class="main">
    <div class="d-flex align-items-center mb-3">
        <a 
            hx-get="{{ route('DoctorRecord') }}" 
            hx-target="body" 
            hx-push-url="true"
            class="btn btn-outline-primary me-3">
            <i class="ri-arrow-go-back-fill"></i>&nbsp Back to List
        </a>
        <h1 class="text-primary mb-0">Doctor Details</h1>
    </div>
    <div class="border mt-2"></div>
        <div class="border shadow-sm mb-5 rounded-4 p-4 bg-light mt-2">
            <div class="row mt-3 justify-content-center">
                @if($doctor->image_path)
                    <img src="{{ asset('storage/' . $doctor->image_path) }}" alt="Doctor Image" class="img-fluid" style="width: 200px; height: 200px;">
                @else
                    <img src="{{ asset('doctor_images/default-doctor.jpg') }}" alt="Default Image" class="img-fluid" style="width: 200px; height: 200px;">
                @endif
            <div class="row mt-5 text-center">
                <h1 style="font-size: 40px">DR. {{ $doctor->firstname }}</h1>
            </div>

            <div class="row m-3">
                <div class="border shadow-sm p-3 mb-5 bg-body rounded mt-2">
                    <div class="row justify-content-between p-3">
                        <div class="col-md-4 p-2">
                            <div class="row">
                                <span class="bg-primary border p-2 text-center text-white"><b>Personal Information:</b></span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <strong>Full Name:</strong> {{ $doctor->firstname }} {{ $doctor->lastname }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>Gender:</strong> {{ ucfirst($doctor->gender) }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>Age:</strong> {{ $doctor->age }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>Marital Status:</strong> {{ ucfirst($doctor->marital) }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>Email:</strong> {{ $doctor->email }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>Contact No.:</strong> {{ $doctor->contact }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-2">
                            <div class="row">
                                <span class="bg-primary border p-2 text-center text-white"><b>Address:</b></span>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <strong>Street:</strong> {{ $doctor->street }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>City:</strong> {{ $doctor->city }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>Country:</strong> {{ $doctor->country }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>Postal Code:</strong> {{ $doctor->postal }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-2">
                            <div class="row">
                                <span class="bg-primary border p-2 text-center text-white"><b>Professional Info:</b></span>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <strong>Qualification:</strong> {{ $doctor->qualification }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <strong>Specialization:</strong> {{ $doctor->specialization }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <span class="bg-primary border p-2 text-center text-white"><b>Bio</b></span>
                                <strong class="mt-3">Bio</strong> <p>{{ $doctor->bio }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
            
</div>


@endsection