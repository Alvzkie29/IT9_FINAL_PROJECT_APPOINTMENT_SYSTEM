@extends("layouts.app")
@section("title", "Appointment Record")
@section("content")

<table class="table table-bordered mt-3"> 
    <thead>
        <tr>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Concern</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
    <tr>
        <td>{{ $record->booking->patient->user->name ?? 'N/A' }}</td>
        <td>{{ $record->booking->doctor->firstname }} {{ $record->booking->doctor->lastname }}</td>
        <td>{{ $record->booking->date }}</td>
        <td>{{ $record->booking->time }}</td>
        <td>{{ $record->booking->concern }}</td>
        <td>{{ ucfirst($record->status) }}</td>
    </tr>
    @endforeach
</table>
@endsection