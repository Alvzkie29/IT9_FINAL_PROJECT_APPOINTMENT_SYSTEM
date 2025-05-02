@extends("layouts.app")
@section("title", "Appointment Record")
@section("scripts")
@section("content")
<div class="card shadow-lg border-0 rounded-4">
    <div class="card-header text-white text-center rounded-top" style="background-color: #0e2238;">
        <h3 class="m-0"> Appointment Records</h3>
        <p class="m-0">View past and ongoing appointments</p>
    </div>
    <div class="card-body">
        <div class="row mt-2">
            <div class="col-md-4">
                <form hx-get="{{ route('appointmentrecord.search') }}"
                hx-target="body"
                hx-push-url="true"
                class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by patient, doctor, or concern..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>

        @if(count($records))
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-light">
                    <tr>
                        <th><i class="fas fa-user"></i> Patient Name</th>
                        <th><i class="fas fa-user-md"></i> Doctor Name</th>
                        <th><i class="fas fa-calendar-day"></i> Date</th>
                        <th><i class="fas fa-clock"></i> Time</th>
                        <th><i class="fas fa-comment-medical"></i> Concern</th>
                        <th><i class="fas fa-info-circle"></i> Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td>{{ $record->booking->patient->user->name ?? 'N/A' }}</td>
                        <td>{{ $record->booking->doctor->firstname }} {{ $record->booking->doctor->lastname }}</td>
                        <td>{{ \Carbon\Carbon::parse($record->booking->date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($record->booking->time)->format('h:i A') }}</td>
                        <td>{{ $record->booking->concern }}</td>
                        <td>
                            <span class="badge 
                                {{ $record->status == 'pending' ? 'bg-warning text-dark' : ($record->status == 'cancelled' ? 'bg-danger' : 'bg-success') }}">
                                {{ ucfirst($record->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $records->links() }} <!-- Ensure pagination links are displayed -->
        </div>
        @else
            <p class="text-center text-muted"><i class="fas fa-exclamation-circle"></i> No appointment records available.</p>
        @endif
    </div>
</div>
@endsection