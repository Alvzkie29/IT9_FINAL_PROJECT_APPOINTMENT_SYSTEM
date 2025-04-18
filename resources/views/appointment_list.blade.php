@extends("layouts.app")
@section("title", "Appointment List")
@section("content")

<div class="container mt-3">
    <div class="border p-2 shadow rounded">
        <div class="row p-2 mt-2">
            <h2 class="text-primary">Today's Appointment</h2>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="card">
                    <div class="card-body text-white" style="background-color: #0e2238">
                        <h5 class="card-title">Appointment List</h5>
                        <p class="card-text">Here you can view all the appointments for today.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 p-2">
        <div class="col-md-10 offset-md-1">
            <div class="card p-2" style="border-radius: 10px; background-color: #f8f9fa;">
                <div class="row p-2">
                    <div class="col-md-4">
                        <h1 class="lead">Patient Info:</h1>
                        <span>Harold John M. Naquila</span>
                    </div>
                    <div class="col-md-5">
                        <h1 class="lead text-center">Appointment Info:</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Date:</strong>
                                <span>2025:10:04</span>
                            </div>
                            <div class="col-md-6">
                                <strong>Time:</strong>
                                <span>8:00AM</span>
                            </div>
                            <div class="col-md-12">
                                <strong>Doctor:</strong>
                                <span>Dr. John Doe</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h1 class="lead text-center">Status:</h1>
                        <div class="row">
                            <div class="col-md-12 text-center">
                               <button class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection