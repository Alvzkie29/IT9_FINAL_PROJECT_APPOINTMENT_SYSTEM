@extends('layouts.nav') 

@section('content')
<div class="container mt-2 mb-5 py-5">
    <div class="hero-section text-center" style="background: linear-gradient(135deg, #0d6efd, #00bcd4);">
        <h1 class="display-4">Book Your Appointment</h1>
        <p class="lead">Choose your doctor and schedule your appointment.</p>
    </div>
    <div class="border p-3">
        <a href="{{route('AccountDetails')}}" class="btn btn-outline-primary btn-lg mx-2 shadow-sm rounded-pill px-4 py-2">
            <i class="ri-user-add-line"></i> Create Personal Info
        </a>
        <a href="{{ route('PatientInfo') }}" class="btn btn-outline-primary btn-lg mx-2 shadow rounded-pill px-4 py-2">
            <i class="ri-user-line"></i> Patient Details
        </a>
        <a href="{{route('user.booking')}}" class="btn btn-outline-primary btn-lg mx-2 shadow-sm rounded-pill px-4 py-2">
            <i class="ri-calendar-check-line"></i> Book an Appointment
        </a>
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if ($patient ?? false)
                    <div class="alert alert-info">Patient information already exists. You can update it if needed.</div>
                @endif
                <form action="{{ route('StoredPatient') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}" readonly>
                         
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}" readonly >
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age">
                            @if ($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="" selected disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact">
                            @if ($errors->has('contact'))
                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="marital">Marital Status</label>
                            <select name="marital" class="form-control" id="marital">
                                <option value="" selected disabled>Select Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                            @if ($errors->has('marital'))
                                <span class="text-danger">{{ $errors->first('marital') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-end mt-4">
                        <div class="col-md-3">
                            <button type="submit" id="save-info" class="btn btn-success btn-block shadow-sm rounded-pill">
                                Save Information
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
