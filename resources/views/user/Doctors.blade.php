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
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow rounded-4 overflow-hidden">
                    <div class="bg-light d-flex justify-content-center align-items-center p-4" style="height: 220px;">
                        <img src="{{ $Doctor->image_path ? asset('storage/' . $Doctor->image_path) : asset('default-image.png') }}"
                             alt="Doctor Image"
                             class="rounded-circle shadow"
                             style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="card-body text-center">
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
                                        <div class="text-danger"><i class="ri-time-line me-1"></i>{{ $slot['day'] }}: Not Available</div>
                                    @else
                                        <div class="text-secondary"><i class="ri-time-line me-1"></i>{{ $slot['day'] }} ({{ $slot['start'] }} - {{ $slot['end'] }})</div>
                                    @endif
                                @endforeach
                            @else
                                <span class="text-muted">No availability set.</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $Doctorlist->links() }}
    </div>
</div>

@endsection
