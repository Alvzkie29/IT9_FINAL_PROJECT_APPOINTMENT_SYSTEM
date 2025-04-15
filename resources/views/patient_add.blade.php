@extends('layouts.app')
@section('title', 'Add Patient')
@section('content')

<div class="main">
    <h1 class="text-primary">Add Patient</h1>
    <div class="border"></div>
    <div class="row mt-3">
        <div class="col">
        <div class="card p-3">
            <span class="text-primary">Patients Details:</span>
            <form action="{{ route('StoredPatient') }}" method="POST">
                @csrf   
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="">First Name:</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                    </div>
                    <div class="col-md-3">
                        <label for="">Last Name:</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                    </div>
                    <div class="col-md-3">
                        <label for="">Age:</label>
                        <input type="number" class="form-control" name="age" placeholder="Age" required>
                    </div>
                    <div class="col-md-3">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="" selected disabled>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="">Contact No.</label>
                        <input type="text" class="form-control" name="contact" placeholder="Contact No." required>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="marital">Marital Status</label>
                        <select name="marital" id="marital" class="form-control" required>
                            <option value="" selected disabled>Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select>
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
