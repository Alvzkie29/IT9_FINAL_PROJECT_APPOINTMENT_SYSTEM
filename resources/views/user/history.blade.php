@extends('layouts.nav') {{-- Assuming your main layout is in layouts/app.blade.php --}}

@section('title', 'Appointment History')

@section('content')


<div class="main">
   <div class="border shadow-sm p-3 mb-5 bg-body rounded ">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="row mt-3">
                    <div class="col">
                        <h3 class="text-center"><b>My Accounts</b></h3>
                        <div class="border shadow-sm p-4 mb-5 bg-light rounded-4">
                            <div class="row text-center g-3 justify-content-center">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-outline-secondary btn-lg w-100 shadow-sm rounded-3 text-black">
                                        <i class="bi bi-calendar-check-fill me-2"></i> Sessions
                                    </a>
                                </div>
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-outline-secondary btn-lg w-100 shadow-sm rounded-3 text-black">
                                        <i class="bi bi-clipboard-heart-fill me-2"></i> Medical History
                                    </a>
                                </div>
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-outline-secondary btn-lg w-100 shadow-sm rounded-3 text-black">
                                        <i class="bi bi-cash-coin me-2"></i> Express Billing
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="border shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 bg-white table-striped">
                                    <thead class="bg-light">
                                        <tr>
                                            <th><i class="ri-user-line"></i> Name</th>
                                            <th><i class="ri-calendar-event-line"></i> Appointment Date</th>
                                            <th><i class="ri-time-line"></i> Appointment Time</th>
                                            <th><i class="ri-stethoscope-line"></i> Doctor</th>
                                            <th><i class="ri-checkbox-circle-line"></i> Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection
