@extends('layouts.nav')

@section('title', 'Book Appointment')
@section('content')

<div class="main">
    <div class="border shadow-sm p-3 mb-5 bg-body rounded "> 
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col text-center">
                            <img src="{{ asset('image_user/doctor.png') }}" alt="Doctor Image" class="img-fluid" height="500px" width="500px">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="border shadow-sm p-3 mb-5 bg-body rounded mt-2">
                    <div class="row text-center">
                        <div class="col">
                            <h4 class="text-primary"><b>Booking Form:</b></h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection