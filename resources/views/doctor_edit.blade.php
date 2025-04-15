@extends('layouts.app')

@section('title', 'Edit Doctor')
@section('content')

<div class="main p-3">
    <div class="mb-4">
        <h4>Edit Doctor Information</h4>
    </div>
    <div class="border border-dark mb-4"></div>
    <div class="row">
        <div class="card p-3 border border-dark">
            <form method="POST" action="{{ route('DoctorUpdate', $doctor->DoctorId) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <h5>Doctor Profile</h5>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="imageUpload" class="upload-box" id="drop-area">
                            <img id="imagePreview" src="{{ asset('storage/' . $doctor->image_path ?? 'doctor_images/default-doctor.jpg') }}" alt="Upload Profile" width="100" height="auto">
                        </label>
                        <input type="file" class="form-control mt-2" accept="image/*" name="file_image" id="imageUpload" onchange="previewImage(event)">
                    </div>
                </div>

                <div class="row mt-4">
                    <h5>Doctor Details</h5>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="firstname">First Name:</label>
                        <input type="text" class="form-control mt-2" name="firstname" id="firstname" value="{{ old('firstname', $doctor->firstname) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control mt-2" name="lastname" id="lastname" value="{{ old('lastname', $doctor->lastname) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="age">Age</label>
                        <input type="number" class="form-control mt-2" name="age" id="age" value="{{ old('age', $doctor->age) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control mt-2" id="gender" required>
                            <option value="male" {{ old('gender', $doctor->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $doctor->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-3 mt-3">
                        <label for="contact">Contact No.</label>
                        <input type="text" class="form-control mt-2" name="contact" id="contact" value="{{ old('contact', $doctor->contact) }}" required>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control mt-2" name="email" id="email" value="{{ old('email', $doctor->email) }}" required>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="marital">Marital Status</label>
                        <select name="marital" class="form-control mt-2" id="marital">
                            <option value="" disabled>Select Marital Status</option>
                            <option value="single" {{ old('marital', $doctor->marital) == 'single' ? 'selected' : '' }}>Single</option>
                            <option value="married" {{ old('marital', $doctor->marital) == 'married' ? 'selected' : '' }}>Married</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="street">Street</label>
                        <input type="text" class="form-control mt-2" name="street" id="street" value="{{ old('street', $doctor->street) }}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control mt-2" name="city" id="city" value="{{ old('city', $doctor->city) }}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control mt-2" name="country" id="country" value="{{ old('country', $doctor->country) }}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="postal">Postal Code</label>
                        <input type="text" class="form-control mt-2" name="postal" id="postal" value="{{ old('postal', $doctor->postal) }}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="specialization">Specialization</label>
                        <input type="text" class="form-control mt-2" name="specialization" id="specialization" value="{{ old('specialization', $doctor->specialization) }}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="qualification">Qualification</label>
                        <input type="text" class="form-control mt-2" name="qualification" id="qualification" value="{{ old('qualification', $doctor->qualification) }}">
                    </div>
                </div>

                <div class="row justify-content-end mt-3 p-2">
                    <div class="col-md-2">
                        <button type="reset" class="btn btn-sm btn-secondary">Clear</button>
                        <button type="submit" class="btn btn-sm btn-primary">Update Doctor</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection