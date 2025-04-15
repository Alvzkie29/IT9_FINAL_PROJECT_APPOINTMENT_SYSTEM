@extends('layouts.nav')

@section('title', 'MediCare - Your Health, Our Priority')
@section('content')



<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Expert Health Consultations</h1>
        <p class="lead">Get the best medical care from top doctors.</p>
        <a href="{{route("user.booking")}}" class="btn btn-primary btn-lg">Book an Appointment</a>
    </div>
</section>

<section class="container my-5">
    <h2 class="text-center mb-4">Our Services</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow p-3 border-0">
                <i class="ri-stethoscope-line display-3 text-primary text-center"></i>
                <h5 class="text-center mt-3">General Checkup</h5>
                <p class="text-muted text-center">Regular health exams to ensure your well-being.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3 border-0">
                <i class="ri-capsule-line display-3 text-primary text-center"></i>
                <h5 class="text-center mt-3">Pharmacy Services</h5>
                <p class="text-muted text-center">Quick access to prescribed medications.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3 border-0">
                <i class="ri-user-smile-line display-3 text-primary text-center"></i>
                <h5 class="text-center mt-3">Specialist Consultations</h5>
                <p class="text-muted text-center">Consult with the best specialists in the field.</p>
            </div>
        </div>
    </div>
</section>

@endsection