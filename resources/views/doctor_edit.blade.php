@extends('layouts.app')
@section('title', 'Edit Doctor')
@section('scripts')
@section('content')
<div class="main p-2">
    <div class="d-flex align-items-center mb-4">
        <a 
            hx-get="{{ route('DoctorRecord') }}" 
            hx-target="body" 
            hx-push-url="true"
            class="btn btn-outline-primary me-3">
            <i class="ri-arrow-go-back-fill"></i>&nbsp Back to List
        </a>
     
        <h3 class="mb-0 text-primary">Edit Doctor Information</h3>
    </div>
    <div class="card shadow-sm p-4 bg-light rounded-4">
        <form method="POST" action="{{ route('DoctorUpdate', $doctor->DoctorId) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h5 class="fw-bold mb-3 border-bottom pb-2"><i class="fas fa-user-md me-1"></i> Doctor Profile</h5>
            <div class="row mb-4">
                <div class="col-md-3 text-center">
                    <img id="imagePreview" src="{{ asset('storage/' . ($doctor->image_path ?? 'doctor_images/default-doctor.jpg')) }}" class="rounded-circle border mb-2" style="width: 120px; height: 120px; object-fit: cover;">
                    <input type="file" class="form-control form-control-sm mt-2" name="file_image" id="imageUpload" accept="image/*" onchange="previewImage(event)">
                </div>
            </div>

            <h5 class="fw-bold mb-3 border-bottom pb-2"><i class="fas fa-id-badge me-1"></i> Doctor Details</h5>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname', $doctor->firstname) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $doctor->lastname) }}" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" value="{{ old('age', $doctor->age) }}" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option value="male" {{ old('gender', $doctor->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $doctor->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Contact No.</label>
                    <input type="text" class="form-control" name="contact" value="{{ old('contact', $doctor->contact) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $doctor->email) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Marital Status</label>
                    <select class="form-select" name="marital">
                        <option disabled selected>Select Status</option>
                        <option value="single" {{ old('marital', $doctor->marital) == 'single' ? 'selected' : '' }}>Single</option>
                        <option value="married" {{ old('marital', $doctor->marital) == 'married' ? 'selected' : '' }}>Married</option>
                    </select>
                </div>
            </div>

            <!-- Address Section -->
            <h5 class="fw-bold mt-4 mb-3 border-bottom pb-2"><i class="fas fa-map-marker-alt me-1"></i> Address</h5>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Street</label>
                    <input type="text" class="form-control" name="street" value="{{ old('street', $doctor->street) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city', $doctor->city) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" value="{{ old('country', $doctor->country) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="form-control" name="postal" value="{{ old('postal', $doctor->postal) }}">
                </div>
            </div>

            <!-- Professional Info -->
            <h5 class="fw-bold mt-4 mb-3 border-bottom pb-2"><i class="fas fa-user-graduate me-1"></i> Professional Details</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Specialization</label>
                    <input type="text" class="form-control" name="specialization" value="{{ old('specialization', $doctor->specialization) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Qualification</label>
                    <input type="text" class="form-control" name="qualification" value="{{ old('qualification', $doctor->qualification) }}">
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="d-flex justify-content-end mt-4">
                <button type="reset" class="btn btn-secondary me-2">Clear</button>
                <button type="submit" class="btn btn-primary">Update Doctor</button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('imagePreview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
