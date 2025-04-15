@extends('layouts.app')
@section('content')
<div class="main">
    <div class="">
        <div class="">
            <div class="d-flex align-items-center mb-3">
                <a class="btn btn-sm btn-primary rounded me-2" href="{{ route('DoctorList') }}">
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
            <div class="alert alert-success">
                {{ session('success') }}
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
                        <form action="{{ route('DoctorAvailability.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="DoctorId" value="{{ $DoctorId }}">
        
                            <div class="form-group">
                                <label for="day">Select Day</label>
                                <select name="day" id="day" class="w-full p-2 border rounded form-control">
                                    @foreach(['monday','tuesday','wednesday','thursday','friday','saturday','sunday'] as $day)
                                        <option value="{{ $day }}">{{ ucfirst($day) }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="morning_from">Morning From</label>
                                    <input type="time" name="morning_from" id="morning_from" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="morning_to">Morning To</label>
                                    <input type="time" name="morning_to" id="morning_to" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="afternoon_from">Afternoon From</label>
                                    <input type="time" name="afternoon_from" id="afternoon_from" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="afternoon_to">Afternoon To</label>
                                    <input type="time" name="afternoon_to" id="afternoon_to" class="form-control" required>
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
                    <table class="table align-middle mb-0 bg-white  table-striped mt-4">
                        <thead class="bg-light">
                            <tr>
                                <th><i class="ri-collapse-vertical-line"></i>Day</th>
                                <th><i class="ri-collapse-vertical-line"></i>Morning From</th>
                                <th><i class="ri-collapse-vertical-line"></i>Morning To</th>
                                <th><i class="ri-collapse-vertical-line"></i>Afternoon From</th>
                                <th><i class="ri-collapse-vertical-line"></i>Afternoon To</th>
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
                                        <p class="fw-bold mb-1">{{ $availability->morning_from }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-bold mb-1">{{ $availability->morning_to }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-bold mb-1">{{ $availability->afternoon_from }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-bold mb-1">{{ $availability->afternoon_to }}</p>
                                    </td>
                                    <td>
                                        <span class="badge bg-success rounded-pill d-inline">Available</span>
                                    </td>
                                    <td>
                                        <button 
                                            class="btn btn-secondary btn-sm rounded-fill editBtn" style="background-color: white; color: black; border-color: green;"
                                            data-id="{{ $availability->AvailabilityId }}"
                                            data-morning_from="{{ $availability->morning_from }}"
                                            data-morning_to="{{ $availability->morning_to }}"
                                            data-afternoon_from="{{ $availability->afternoon_from }}"
                                            data-afternoon_to="{{ $availability->afternoon_to }}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#staticBackdrop">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <form action="{{ route('DeleteDoctorAvailability', $availability->AvailabilityId) }}" method="POST" 
                                            onsubmit="return confirm('Are you sure you want to remove this Doctor?');"
                                            class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background-color: white; color: black; border-color: red;">
                                            <i class="fa-solid fa-trash"></i>
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
        <form method="POST" action="{{ route('UpdateDoctorAvailability') }}">
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
                            <label for="edit_morning_from">Morning From</label>
                            <input type="time" id="edit_morning_from" name="morning_from" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_morning_to">Morning To</label>
                            <input type="time" id="edit_morning_to" name="morning_to" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="edit_afternoon_from">Afternoon From</label>
                            <input type="time" id="edit_afternoon_from" name="afternoon_from" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_afternoon_to">Afternoon To</label>
                            <input type="time" id="edit_afternoon_to" name="afternoon_to" class="form-control" required>
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
                const morningFrom = this.getAttribute('data-morning_from');
                const morningTo = this.getAttribute('data-morning_to');
                const afternoonFrom = this.getAttribute('data-afternoon_from');
                const afternoonTo = this.getAttribute('data-afternoon_to');

                document.getElementById('edit_availability_id').value = availabilityId;
                document.getElementById('edit_morning_from').value = morningFrom;
                document.getElementById('edit_morning_to').value = morningTo;
                document.getElementById('edit_afternoon_from').value = afternoonFrom;
                document.getElementById('edit_afternoon_to').value = afternoonTo;
            });
        });
    });
</script>
@endsection