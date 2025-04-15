@extends('layouts.app')
@section('title', 'Edit Patient')
@section('content')


<form action="{{ route('patients.update', $patient->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="main">
        <h1 class="text-primary">Edit Patient</h1>
        <div class="border"></div>

        <div class="container">
            <div class="row mt-3">
                <div class="card p-3">
                    <span class="text-primary">Patients Details</span>
                    <form action="{{ route('StoredPatient') }}" method="POST">
                        @csrf   
                        <div class="row mt-2 p-3">
                            <div class="col-md-5">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control" name="firstname" value="{{ $patient->firstname }}" required>
                            </div>
                            <div class="col-md-5">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control" name="lastname" value="{{ $patient->lastname }}" required>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <label for="age">Age:</label>
                                    <input type="number" class="form-control" name="age" value="{{ $patient->age }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="Male"{{ $patient->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female"{{ $patient->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other"{{ $patient->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="contact">Contact No.</label>
                                    <input type="text" class="form-control" name="contact" value="{{ $patient->contact }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="marital">Marital Status</label>
                                    <select name="marital" id="marital" class="form-control" required>
                                        <option value="" selected disabled>Status</option>
                                        <option value="Single"{{ $patient->marital == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married"{{ $patient->marital == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Widowed"{{ $patient->marital == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 mt-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $patient->email }}" required>
                                </div>

                            </div>
                            <div class="row mt-3 justify-content-end">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Update Patient</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>      
        </div>      
    </div>
</div>  
</form>
@endsection