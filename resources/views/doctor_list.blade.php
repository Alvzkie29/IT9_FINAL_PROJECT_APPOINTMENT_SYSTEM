@extends('layouts.app')

@section('title', 'Doctor List')
@section('content')

<div class="main">
    <h1 class="text-primary">Doctor List</h1>
    <div class="border"></div>
        <div class="row mt-4">
            <div class="col">
                <form method="GET" action="{{ route('DoctorList') }}">
                    <div class="row mt-2 justify-content-between">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control w-25 me-2" placeholder="Search doctors..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{route('AddDoctor')}}" class="btn border fw-bold"><i class="ri-add-line border border-primary text-primary rounded-pill me-2"></i>Add Doctor</a>
                        </div>
                    </div>
                </form>
                <div class="row mt-4">
                    @foreach($Doctorlist as $Doctor)
                    <div class="col-md-4 mt-2">
                        <div class="card  rounded-4 overflow-hidden bg-light mb-4">
                            <div class="bg-primary text-white py-3">
                                <h4 class="text-center mb-0 fw-bold">Doctor Details</h4>
                            </div>
                            <div class="row align-content-end mt-3 p-2">
                                <div class="col d-flex justify-content-end">
                                    <a href="{{ route('Availability', ['DoctorId' => $Doctor->DoctorId]) }}" 
                                       class="btn btn-sm border border-secondary rounded-pill me-1">
                                       <i class="ri-calendar-2-line"  style="font-size: 23px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col d-flex justify-content-center">
                                    <img src="{{ $Doctor->image_path ? asset('storage/' . $Doctor->image_path) : asset('default-image.png') }}" alt="Doctor Image" width="200" height="200" class="mb-2">
                                </div>
                            </div>
                            <div class="row mt-2 p-2">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <h1 class="fw-bold mb-0">Dr.</h1>
                                    <span class="text-dark ms-2">{{ $Doctor->firstname }} {{ $Doctor->lastname }}</span>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="d-flex justify-content-center flex-wrap">
                                @foreach(['M', 'T', 'W', 'TH', 'F', 'SAT', 'SUN'] as $day)
                                    <div class="border mx-1 my-1 d-flex align-items-center justify-content-center" 
                                         style="
                                            width: 40px; 
                                            height: 40px; 
                                            border-radius: 50%; 
                                            background-color: {{ in_array($day, $Doctor->availability ?? []) ? '#28a745' : '#e9ecef' }};
                                            color: {{ in_array($day, $Doctor->availability ?? []) ? '#fff' : '#6c757d' }};
                                            font-weight: bold;
                                         ">
                                        {{ $day }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div> 
                <div class="mt-4 d-flex justify-content-center">
                    {{ $Doctorlist->appends(['search' => request('search')])->links() }} 
                    
                </div>
            </div> 
        </div> 
    </div> 
</div> 
@endsection
