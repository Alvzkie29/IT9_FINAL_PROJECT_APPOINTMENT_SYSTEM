@extends('layouts.app')

@section('title', 'Appointment Requests')

@section('content')
<div class="card shadow-lg border-0 rounded-4">
    <div class="card-header text-white text-center rounded-top" style="background-color: #0e2238;">
        <h3 class="m-0">Appointment Requests</h3>
        <p class="m-0">Manage and approve appointments easily</p>
    </div>
    <div class="card-body">
        @if(count($bookings))
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-light">
                    <tr>
                        <th><i class="fas fa-user"></i> Patient</th>
                        <th><i class="fas fa-user-md"></i> Doctor</th>
                        <th><i class="fas fa-calendar-day"></i> Date</th>
                        <th><i class="fas fa-clock"></i> Time</th>
                        <th><i class="fas fa-comment-medical"></i> Concern</th>
                        <th><i class="fas fa-info-circle"></i> Status</th>
                        <th><i class="fas fa-cogs"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->patient->user->name ?? 'N/A' }}</td>
                        <td>{{ $booking->doctor->firstname }} {{ $booking->doctor->lastname }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}</td>
                        <td>{{ $booking->concern }}</td>
                        <td>
                            <span class="badge 
                                {{ $booking->status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            @if($booking->status == 'pending')
                            <form action="{{ route('appointmentlist.confirm', ['id' => $booking->BookingId]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i> Confirm
                                </button>
                            </form>
                            @else
                                <span class="badge bg-success"><i class="fas fa-check-circle"></i> Confirmed</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p class="text-center text-muted"><i class="fas fa-exclamation-circle"></i> No appointment requests available.</p>
        @endif
    </div>
</div>
@endsection