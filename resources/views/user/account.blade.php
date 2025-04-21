@extends('layouts.nav') {{-- Or whatever layout you're using --}}

@section('content')
<div class="container mt-5">
    <h2>Patient Information</h2>

    {{-- Display success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('StoredPatient') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mt-3">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>

            <div class="col-md-6 mt-3">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>

            <div class="col-md-4 mt-3">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="age" required>
            </div>

            <div class="col-md-4 mt-3">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="" selected disabled>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="col-md-4 mt-3">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name="contact" required>
            </div>

            <div class="col-md-6 mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
            </div>

            <div class="col-md-6 mt-3">
                <label for="marital">Marital Status</label>
                <select name="marital" class="form-control">
                    <option value="" selected disabled>Select Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Save Information</button>
        </div>
    </form>
</div>
@endsection
