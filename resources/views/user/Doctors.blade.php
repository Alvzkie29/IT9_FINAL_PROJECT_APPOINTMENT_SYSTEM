@extends('layouts.nav')
@section('title', 'Doctor View')
@section('content')


<section class="bg-light py-5 mb-5 border-bottom" style="background: linear-gradient(135deg, #0d6efd, #00bcd4);">
    <div class="container text-center">
        <h1 class="text-center fw-bold mb-5 text-white">Meet Our Doctors</h1>
    </div>
</section>
<div class="container py-5">
    <div class="row g-4">
       @foreach($Doctorlist as $Doctor)
    <div class="col-md-4 d-flex">
        <div class="card w-100 d-flex flex-column border-0 shadow rounded-4 overflow-hidden">
            <div class="bg-light d-flex justify-content-center align-items-center p-4" style="height: 220px;">
                <img src="{{ $Doctor->image_path ? asset('storage/' . $Doctor->image_path) : asset('default-image.png') }}"
                     alt="Doctor Image"
                     class="rounded-circle shadow"
                     style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                <div class="text-center">
                    <h5 class="fw-bold text-dark mb-1">Dr. {{ $Doctor->firstname }} {{ $Doctor->lastname }}</h5>
                    <p class="text-primary small mb-2">
                        <i class="ri-stethoscope-line me-1"></i> 
                        {{ $Doctor->specialization ?? 'General Practitioner' }}
                    </p>
                    <p class="text-muted small">
                        {{ Str::limit($Doctor->bio ?? 'Experienced medical professional providing excellent care.', 100) }}
                    </p>
                    <hr class="my-2">
                    <p class="text-success small mb-0">
                        @php
                            $availability = $Doctor->availabilities->map(function($a) {
                                $start = \Carbon\Carbon::parse($a->start_time)->format('g:i A');
                                $end = \Carbon\Carbon::parse($a->end_time)->format('g:i A');
                                return [
                                    'day' => $a->day,
                                    'start' => $start,
                                    'end' => $end,
                                    'status' => $a->status
                                ];
                            });
                        @endphp
                        @if($availability->isNotEmpty())
                            @foreach($availability as $slot)
                                @if($slot['status'] == 0)
                                    <div class="text-danger">
                                        <i class="ri-time-line me-1"></i>{{ $slot['day'] }}: Not Available
                                    </div>
                                @else
                                    <div class="text-secondary">
                                        <i class="ri-time-line me-1"></i>{{ $slot['day'] }} ({{ $slot['start'] }} - {{ $slot['end'] }})
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="text-muted">No availability set.</span>
                        @endif
                    </p>
                </div>

                <!-- Pinned bottom button -->
                <div class="mt-4 text-center">
                    <a href="{{route('user.booking')}}" class="btn btn-sm btn-primary"
                     hx-boost="true"
                    hx-push-url="true"
                     >Book Now</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $Doctorlist->links() }}
    </div>
</div>

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
