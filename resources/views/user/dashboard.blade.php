@extends('layouts.nav')
@section('title', 'Home')
@section('content')

<!-- Hero Section with Overlay -->
<section class="hero-section position-relative d-flex align-items-center text-white text-center" style="background: url('{{ asset('images/clinics.jpg') }}') center/cover no-repeat; height: 85vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.6);"></div>
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

<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" data-aos="fade-up">What Our Patients Say</h2>
        <div class="row g-4">

            <div class="col-md-6" data-aos="fade-right">
                <div class="bg-white p-4 rounded shadow-sm h-100">
                    <p class="mb-3 fst-italic">"Very professional staff and clean facilities. I feel well cared for every visit."</p>
                    <small class="text-muted">— Maria L., Patient</small>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-left">
                <div class="bg-white p-4 rounded shadow-sm h-100">
                    <p class="mb-3 fst-italic">"Booking was fast and easy. The doctor explained everything clearly."</p>
                    <small class="text-muted">— John D., Patient</small>
                </div>
            </div>

        </div>
    </div>
</section>

<footer class="text-white pt-5 pb-4" style="background: linear-gradient(135deg, #0d6efd, #00bcd4);">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Medicare Clinic</h5>
                <p class="small">Trusted care for every stage of life. Your health is our priority.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h6 class="fw-semibold">Quick Links</h6>
                <ul class="list-unstyled">
                    <li><a href="" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="" class="text-white text-decoration-none">About Us</a></li>
                    <li><a href="{{ route('user.booking') }}" class="text-white text-decoration-none">Book Appointment</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold">Get in Touch</h6>
                <p class="small mb-1"><i class="ri-map-pin-line me-2"></i>123 Health St., Wellness City</p>
                <p class="small mb-1"><i class="ri-phone-line me-2"></i>(+63) 900-123-4567</p>
                <p class="small mb-3"><i class="ri-mail-line me-2"></i>contact@medicareclinic.com</p>
                <div>
                    <a href="#" class="text-white fs-5 me-3"><i class="ri-facebook-circle-fill"></i></a>
                    <a href="#" class="text-white fs-5 me-3"><i class="ri-twitter-x-line"></i></a>
                    <a href="#" class="text-white fs-5 me-3"><i class="ri-instagram-line"></i></a>
                    <a href="#" class="text-white fs-5"><i class="ri-youtube-fill"></i></a>
                </div>
            </div>
        </div>

        <hr class="border-white mt-4">

        <div class="text-center small">
            © {{ date('Y') }} Medicare Clinic. All rights reserved.
        </div>
    </div>
</footer>

@endsection
