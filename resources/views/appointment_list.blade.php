@extends('layouts.app')
@section('title', 'Appointment Requests')

@section('content')
<div class="container mt-4">
    <h2>Appointment Requests</h2>

    @if(count($bookings))
    <table class="table table-bordered mt-3">
        <!-- Table head -->
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->patient->user->name ?? 'N/A' }}</td>
                    <td>{{ $booking->doctor->firstname }} {{ $booking->doctor->lastname }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}</td>
                    <td>{{ $booking->concern }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        @if($booking->status == 'pending')
                        <form action="{{ route('appointmentlist.confirm', ['id' => $booking->BookingId]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                        </form>
                        @else
                            <span class="badge bg-success">Confirmed</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No appointment requests available.</p>
    @endif
</div>
@endsection
