@extends('layouts.nav')
@section('title', 'About Us')
@section('content')

<!-- Hero Section -->
<section class="bg-light py-5 mb-5 border-bottom" style="background: linear-gradient(135deg, #0d6efd, #00bcd4);">
    <div class="container text-center">
        <h1 class="fw-bold text-white mb-3" data-aos="fade-down">About Medicare Clinic</h1>
        <p class="lead text-white mx-auto" style="max-width: 700px;" data-aos="fade-up">
            At Medicare, we combine compassionate care with medical expertise to ensure your health and wellness are always in trusted hands.
        </p>
    </div>
</section>
<!-- About Section -->
<section class="container mb-5">
    <div class="row text-center mt-5 g-4">
        <div class="col-md-4" data-aos="zoom-in-up">
            <div class="p-4 border rounded shadow-sm bg-white h-100">
                <i class="ri-heart-pulse-fill text-primary display-4 mb-3"></i>
                <h5 class="fw-semibold">Patient-Centered Care</h5>
                <p class="text-muted">Your needs come first—always. We listen, guide, and care with empathy.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="100">
            <div class="p-4 border rounded shadow-sm bg-white h-100">
                <i class="ri-shield-cross-line text-success display-4 mb-3"></i>
                <h5 class="fw-semibold">Safety & Trust</h5>
                <p class="text-muted">A clean, safe, and welcoming environment for your peace of mind.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="p-4 border rounded shadow-sm bg-white h-100">
                <i class="ri-team-line text-info display-4 mb-3"></i>
                <h5 class="fw-semibold">Expert Team</h5>
                <p class="text-muted">Experienced doctors and caring staff committed to your well-being.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" data-aos="fade-up">🩺 Our Primary Care Services</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            @php
                $services = [
                    ['title' => 'General and Family Medicine', 'desc' => 'Comprehensive care for all ages.'],
                    ['title' => 'Preventive Care & Checkups', 'desc' => 'Stay ahead of health issues.'],
                    ['title' => 'Health Screenings & Diagnostics', 'desc' => 'Early detection for better outcomes.'],
                    ['title' => 'Pharmacy Services', 'desc' => 'Quick, convenient prescription access.'],
                    ['title' => 'Specialist Consultations', 'desc' => 'Expert advice for complex concerns.'],
                    ['title' => 'Chronic Illness Management', 'desc' => 'Support for diabetes, hypertension, and more.'],
                    ['title' => 'Laboratory Work', 'desc' => 'On-site testing with fast results.'],
                    ['title' => 'Vaccinations & Immunizations', 'desc' => 'Protection for you and your family.'],
                ];
            @endphp

            @foreach ($services as $service)
                <div class="col" data-aos="zoom-in">
                    <div class="card h-100 border-0 shadow-sm hover-shadow transition p-3">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-semibold">{{ $service['title'] }}</h5>
                            <p class="card-text text-muted">{{ $service['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="container py-5">
    <h2 class="text-center fw-bold mb-4" data-aos="fade-up">🌟 Why Choose Medicare?</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="list-group list-group-flush fs-5" data-aos="fade-up">
                <li class="list-group-item"><i class="ri-check-line text-success me-2"></i>Skilled, compassionate primary care professionals</li>
                <li class="list-group-item"><i class="ri-check-line text-success me-2"></i>Convenient appointment scheduling</li>
                <li class="list-group-item"><i class="ri-check-line text-success me-2"></i>Clean, modern facilities</li>
                <li class="list-group-item"><i class="ri-check-line text-success me-2"></i>Patient-first approach to health education and care</li>
            </ul>
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
