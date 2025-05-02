@extends('layouts.app')
@section('title', 'Edit Patient')
@section('scripts')
@section('content')

<div class="main p-2">
   <div class="d-flex align-items-center mb-4">
    <a href="{{ route('PatientList') }}" 
       class="btn btn-outline-primary me-3"
       hx-boost="true"
       hx-push-url="true">
        <i class="ri-arrow-go-back-fill"></i>&nbsp Back
    </a>
    <h3 class="tmb-0 text-primary">Edit Patient Information</h3>
   </div>
    <div class="card p-4 bg-light shadow-sm rounded-4">
        <form 
            hx-post="{{ route('patients.update', $patient->id) }}"
            hx-target="body"
            hx-push-url="true">
            @csrf
            @method('PUT')
            <h5 class="fw-bold mb-3 border-bottom pb-2">Patient Details</h5>
            <div class="row g-3">
                <div class="col-md-5">
                    <label for="firstname" class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname', $patient->firstname) }}" required>
                </div>
                <div class="col-md-5">
                    <label for="lastname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $patient->lastname) }}" required>
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-3">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" class="form-control" name="age" value="{{ old('age', $patient->age) }}" required>
                </div>
                <div class="col-md-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select name="gender" class="form-select" required>
                        <option value="" disabled>Select Gender</option>
                        <option value="Male" {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender', $patient->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="contact" class="form-label">Contact No.:</label>
                    <input type="text" class="form-control" name="contact" value="{{ old('contact', $patient->contact) }}" required>
                </div>
                <div class="col-md-3">
                    <label for="marital" class="form-label">Marital Status:</label>
                    <select name="marital" class="form-select" required>
                        <option value="" disabled>Select Status</option>
                        <option value="Single" {{ old('marital', $patient->marital) == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('marital', $patient->marital) == 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="Widowed" {{ old('marital', $patient->marital) == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $patient->email) }}" required>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">Update Patient</button>
            </div>
        </form>
    </div>
</div>

@endsection
