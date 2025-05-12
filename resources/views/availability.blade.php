@extends('layouts.app')
@section('title', 'Doctor Availability')
@section('scripts')
@section('content')
<div class="main">
    <div class="">
        <div class="">
            <div class="d-flex align-items-center mb-3">
                <a class="btn btn-sm btn-primary rounded me-2" 
                   hx-get="{{ route('DoctorList') }}" 
                   hx-target="body" 
                   hx-push-url="true">
                    <i class="ri-arrow-go-back-fill"></i>
                </a>
                <h1 class="text-primary mb-0">Doctor Availability</h1>
            </div>
        </div>
    </div>
    <div class="border mt-2"></div>
    <div class="row mt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('delete_success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('delete_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col">
            <div class="card p-3">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <form hx-post="{{ route('DoctorAvailability.store') }}"
                            hx-target="body"
                            hx-push-url="true">
                            @csrf
                            <input type="hidden" name="DoctorId" value="{{ $DoctorId }}">
        
                            <div class="form-group">
                                <label for="day">Select Day</label>
                                <select name="day" id="day" class="w-full p-2 border rounded form-control">
                                    <option hidden>Select Day</option>
                                  
                                    @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                                        <option value="{{ $day }}">{{ ucfirst($day) }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="start_time">Start Time</label>
                                    <input type="time" name="start_time" id="start_time" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="end_time">End Time</label>
                                    <input type="time" name="end_time" id="end_time" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 justify-content-end">
                            <div class="col-md-2">
                                <button type="reset" class="btn btn-sm btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-primary btn-sm" style="width: 120px;">Save</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div> 
    <div class="row mt-3">
        <div class="col">
                <div class="table-responsive"> 
                    <table class="table align-middle mb-0 bg-white table-striped mt-4">
                        <thead class="bg-light">
                            <tr>
                                <th><i class="ri-collapse-vertical-line"></i>Day</th>
                                <th><i class="ri-collapse-vertical-line"></i>Start Time</th>
                                <th><i class="ri-collapse-vertical-line"></i>End Time</th>
                                <th><i class="ri-collapse-vertical-line"></i>Status</th>
                                <th><i class="ri-collapse-vertical-line"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($availabilities as $availability)
                                <tr>
                                    <td>
                                        <p class="fw-bold mb-1">{{ $availability->day }}</p>
                                    </td>
                                    <td>
                                        {{ $availability->start_time ? \Carbon\Carbon::createFromFormat('H:i:s', $availability->start_time)->format('h:i A') : 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $availability->end_time ? \Carbon\Carbon::createFromFormat('H:i:s', $availability->end_time)->format('h:i A') : 'N/A' }}
                                    </td>
                                    <td>
                                        <form action="{{ route('ToggleDoctorAvailability', $availability->AvailabilityId) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-toggle">
                                                @if($availability->status)
                                                    <p class="btn btn-sm btn-success">Available</p>
                                                @else
                                                <p class="btn btn-sm btn-danger">Not Available</p>
                                                @endif
                                            </button>
                                        </form> 
                                    </td>
                                    <td>
                                        <button 
                                            class="btn btn-secondary btn-sm rounded-fill editBtn" style="background-color: white; color: black; border-color: green;"
                                            data-id="{{ $availability->AvailabilityId }}"
                                            data-start_time="{{ $availability->start_time }}"
                                            data-end_time="{{ $availability->end_time }}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#staticBackdrop">
                                            <i class="ri-edit-2-line"></i>
                                        </button>
                                        <form hx-post="{{ route('DeleteDoctorAvailability', $availability->AvailabilityId) }}"
                                            hx-target="body"
                                            hx-push-url="true"
                                            onsubmit="return confirm('Are you sure you want to remove this Doctor Availability?');"
                                            class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background-color: white; color: black; border-color: red;">
                                            <i class="ri-delete-bin-5-line"></i>
                                        </button>
                                    </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
       <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form  hx-post="{{ route('UpdateDoctorAvailability') }}"
            hx-target="body"
            hx-push-url="true">
            @csrf
            @method('PUT')
            <input type="hidden" name="availability_id" id="edit_availability_id">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Time Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="edit_start_time">Start Time</label>
                            <input type="time" id="edit_start_time" name="start_time" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_end_time">End Time</label>
                            <input type="time" id="edit_end_time" name="end_time" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.editBtn');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const availabilityId = this.getAttribute('data-id');
                const startTime = this.getAttribute('data-start_time');
                const endTime = this.getAttribute('data-end_time');

                document.getElementById('edit_availability_id').value = availabilityId;
                document.getElementById('edit_start_time').value = startTime;
                document.getElementById('edit_end_time').value = endTime;
            });
        });
    });
</script>
@endsection