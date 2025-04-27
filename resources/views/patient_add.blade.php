@extends('layouts.app')
@section('title', 'Add Patient')
@section('content')

<div class="main">
    <h1 class="text-primary">Add Patient</h1>
    <div class="border"></div>
    <div class="row mt-3">
        <div class="col">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card p-3">
                <span class="text-primary">Patients Details:</span>
                <form action="{{ route('StoredPatient') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="First Name" value="{{ old('firstname') }}" required>
                            @error('firstname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" required>
                            @error('lastname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="Age" value="{{ old('age') }}" required>
                            @error('age') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                <option value="" selected disabled>Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="contact">Contact No.</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" placeholder="Contact No." value="{{ old('contact') }}" required>
                            @error('contact') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="marital">Marital Status</label>
                            <select name="marital" id="marital" class="form-control @error('marital') is-invalid @enderror" required>
                                <option value="" selected disabled>Status</option>
                                <option value="Single" {{ old('marital') == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ old('marital') == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Widowed" {{ old('marital') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                            @error('marital') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="row mt-3 justify-content-end">
                            <div class="col-md-2">
                                <button type="reset" class="btn btn-sm btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-sm btn-primary">Create Patient</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>            
    </div>
</div>
@endsection
