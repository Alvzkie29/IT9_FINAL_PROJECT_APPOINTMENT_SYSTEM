@extends('layouts.nav')
@section('title', 'Home')
@section('content')

<!-- Hero Section with Overlay -->
<section class="hero-section position-relative d-flex align-items-center text-white text-center" style="background: url('{{ asset('images/clinicheader.png') }}') center/cover no-repeat; height: 50vh;">
    <div class="position-absolute top-0 start-0 w-50 h-5" style="background: rgba(0, 0, 0, 0.6);"></div>
    <div class="container position-relative z-1">
        <h1 class="display-2 fw-bold mb-3" data-aos="fade-down">Expert Health Consultations</h1>
        <p class="lead mb-4" data-aos="fade-up">Top-rated doctors providing trusted, patient-first medical care.</p>
        <a href="{{ route('user.booking') }}" class="btn btn-lg btn-light fw-semibold shadow" data-aos="zoom-in">Book an Appointment</a>
    </div>
</section>

<!-- Services Section -->
<section class="container my-5">
    <h2 class="text-center fw-bold mb-5" data-aos="fade-up">🩺 Our Services</h2>
    <div class="row g-4">

        <div class="col-md-4" data-aos="fade-right">
            <div class="card border-0 glass-card h-100 text-center p-4">
                <i class="ri-stethoscope-line display-3 text-primary mb-3"></i>
                <h5 class="fw-semibold">General Checkup</h5>
                <p class="text-muted">Regular health exams to ensure your well-being.</p>
            </div>
        </div>

        <div class="col-md-4" data-aos="fade-up">
            <div class="card border-0 glass-card h-100 text-center p-4">
                <i class="ri-capsule-line display-3 text-primary mb-3"></i>
                <h5 class="fw-semibold">Pharmacy Services</h5>
                <p class="text-muted">Quick access to prescribed medications.</p>
            </div>
        </div>

        <div class="col-md-4" data-aos="fade-left">
            <div class="card border-0 glass-card h-100 text-center p-4">
                <i class="ri-user-smile-line display-3 text-primary mb-3"></i>
                <h5 class="fw-semibold">Specialist Consultations</h5>
                <p class="text-muted">Consult with the best specialists in the field.</p>
            </div>
        </div>

    </div>
</section>

<!-- Reviews Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" data-aos="fade-up">What Our Patients Say</h2>
        <div class="row g-4">
            @forelse ($userReviews as $review)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-white p-4 rounded shadow-sm h-100 d-flex flex-column">
                        <p class="mb-3 fst-italic flex-grow-1">"{{ $review->review }}"</p>
                        <small class="text-muted">
                            — 
                            @if ($review->user)
                                {{ $review->user->firstname }} {{ $review->user->lastname }}
                            @else
                                Unknown User
                            @endif
                            , Patient
                        </small>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="fst-italic">No reviews yet. Be the first to leave one!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-white pt-4 pb-3" style="background: linear-gradient(135deg, #0d6efd, #00bcd4); font-size: 1rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h4 class="fw-bold mb-3">Medicare Clinic</h4>
                <p class="mt-1">Trusted care for every stage of life.<br>Your health is our priority.</p>
                <p class="mt-1">Where compassion meets advanced care,<br> creating a truly personal experience for you.</p>            </div>

            <div class="col-md-4 mb-4">
                <h5 class="fw-semibold mb-3">Quick Links</h5>
                <ul class="list-unstyled fs-6">
                    <li class="mb-2"><a href="{{ route('user.dashboard') }}" class="text-white text-decoration-none">🏠 Home</a></li>
                    <li class="mb-2"><a href="{{ route('user.About') }}" class="text-white text-decoration-none">ℹ️ About Us</a></li>
                    <li><a href="{{ route('user.booking') }}" class="text-white text-decoration-none">📅 Book Appointment</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5 class="fw-semibold mb-3">Get in Touch</h5>
                <p class="mb-2"><i class="ri-map-pin-line me-2"></i>123 Health St., Wellness City</p>
                <p class="mb-2"><i class="ri-phone-line me-2"></i>(+63) 900-123-4567</p>
                <p class="mb-3"><i class="ri-mail-line me-2"></i>contact@medicareclinic.com</p>
            </div>
        </div>

        <hr class="border-white mt-2">

        <div class="text-center fs-6">
            © {{ date('Y') }} Medicare Clinic. All rights reserved.
        </div>
    </div>
</footer>


@endsection
