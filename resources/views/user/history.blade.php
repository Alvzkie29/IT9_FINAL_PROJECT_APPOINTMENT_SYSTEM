@extends('layouts.nav')

@section('title', 'Appointment History')

@section('content')

<div class="main">
    <div class="hero-section text-center">
        <h1 class="display-4">Your Appointment History</h1>
        <p class="lead">View all your past and upcoming appointments.</p>
    </div>
    <div class="border p-3 mb-4">
        <h2 class="text-primary">Upcoming Appointments</h2>
        <p class="text-muted">Here are your upcoming appointments.</p>
            @foreach($bookings as $booking)
            <div class="border rounded-4 p-3 px-4 mb-3 bg-light-subtle">
                <div class="d-flex flex-wrap align-items-center justify-content-between text-dark fw-semibold" style="font-size: 1rem;">
                    <div class="me-4 mb-2">
                        <i class="ri-user-line text-primary"></i>
                        {{ $booking->patient->firstname ?? 'N/A' }}
                    </div>

                    <div class="me-4 mb-2">
                        <i class="ri-calendar-event-line text-secondary"></i> 
                        {{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}
                    </div>

                    <div class="me-4 mb-2">
                        <i class="ri-time-line text-success"></i> 
                        {{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}
                    </div>

                    <div class="me-4 mb-2">
                        <i class="ri-stethoscope-line text-info"></i> 
                        {{ $booking->doctor->firstname }} {{ $booking->doctor->lastname }}
                    </div>

                    <div class="me-4 mb-2">
                        <i class="ri-phone-line text-warning"></i> 
                        {{ $booking->patient->contact ?? 'N/A' }}
                    </div>

                    <div class="me-4 mb-2">
                        <i class="ri-checkbox-circle-line 
                            {{ $booking->status == 'pending' ? 'text-warning' : ($booking->status == 'cancelled' ? 'text-danger' : 'text-success') }}">
                        </i> 
                        <span class="badge 
                            {{ $booking->status == 'pending' ? 'bg-warning text-dark' : ($booking->status == 'cancelled' ? 'bg-danger' : 'bg-success') }} 
                            rounded-pill px-3 py-2">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>

                    @if($booking->status == 'pending')
                        <form action="{{ route('booking.cancel', ['id' => $booking->BookingId]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm rounded-pill ms-2">
                                Cancel
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
