@extends('layouts.app')

@section('title', 'Doctor List')
@section('content')

<div class="main">
    <h1 class="text-primary">Doctor List</h1>
    <div class="border"></div>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="row mt-2 justify-content-between">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control w-25 me-2" placeholder="Search patients..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <a href="{{route('AddDoctor')}}" class="btn border fw-bold"><i class="ri-add-line border border-primary text-primary rounded-pill me-2"></i>Add Doctor</a>
                    </div>
                </div>
                <div class="row mt-4">
                    @foreach($Doctorlist as $Doctor)
                    <div class="col-md-4 mt-2">
                        <div class="border p-2" style="border-radius: 10px; background-color: #f8f9fa;">
                            <div class="row align-content-end">
                                <div class="col d-flex justify-content-end">
                                    <a href="{{ route('Availability', ['DoctorId' => $Doctor->DoctorId]) }}" 
                                       class="btn btn-sm border border-secondary rounded-pill me-1">
                                       <i class="ri-calendar-2-line"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col d-flex justify-content-center">
                                    <img src="{{ $Doctor->image_path ? asset('storage/' . $Doctor->image_path) : asset('default-image.png') }}" alt="Doctor Image" width="200" height="200" class="mb-2">
                                </div>
                            </div>
                            <div class="row mt-2 p-2">
                                <div class="col d-flex justify-content-center">
                                    <h1 class=" fw-bold d-inline">Dr.</h1><span class="text-dark ms-2 mt-1">{{ $Doctor->firstname }} {{ $Doctor->lastname }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div> 
            </div> 
            <div class="col-md-4 mt-3">
                <div class="card p-3">
                    <div class="row">
                        <div class="d-flex align-items-center">
                            <span>Schedules</span>
                            <i class="ri-arrow-right-fill"></i>
                            
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </div> 
</div> 
@endsection
