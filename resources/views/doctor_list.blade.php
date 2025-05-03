@extends('layouts.app')
@section('title', 'Doctor List')

@section('scripts')
@section('content')

<div class="main">
    <h1 class="text-primary">Doctor List</h1>
    <div class="border"></div>
    <div class="row mt-4">
        <div class="col">
            <form hx-get="{{ route('DoctorList') }}"
                  hx-target="body"
                  hx-push-url="true">
                <div class="row mt-2 justify-content-between">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control w-25 me-2" placeholder="Search doctors..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <a href="{{ route('AddDoctor') }}" class="btn border fw-bold"><i class="ri-add-line border border-primary text-primary rounded-pill me-2"></i>Add Doctor</a>
                    </div>
                </div>
            </form>
            <div class="row mt-4">
                @foreach($Doctorlist as $Doctor)
                    <div class="col-md-3 mt-2">
                        <div class="border border-0 shadow-sm text-center bg-white rounded-4 overflow-hidden mb-4">
                            <div class="text-white py-3" style="background-color: #0e2238;">
                                <h4 class="text-center mb-0 fw-bold">Doctor Details</h4>
                            </div>
                            <div class="row align-content-end mt-3 p-2">
                                <div class="col d-flex justify-content-end">
                                    <a href="{{ route('Availability', ['DoctorId' => $Doctor->DoctorId]) }}" 
                                       hx-boost="true"
                                       hx-push-url="true"
                                       class="btn btn-sm border border-secondary rounded-pill me-1">
                                       <i class="ri-calendar-2-line" style="font-size: 23px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col d-flex justify-content-center">
                                    <img src="{{ $Doctor->image_path ? asset('storage/' . $Doctor->image_path) : asset('default-image.png') }}" alt="Doctor Image" width="100" height="100" class="mb-2">
                                </div>
                            </div>
                            <div class="row mt-2 p-2">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <h1 class="fw-bold mb-0">Dr.</h1>
                                    <span class="text-dark ms-2">{{ $Doctor->firstname }} {{ $Doctor->lastname }}</span>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row p-3">
                                <div class="d-flex justify-content-center flex-wrap">
                                    @php
                                        $currentDay = \Carbon\Carbon::now()->format('l');
                                        $currentTime = \Carbon\Carbon::now()->format('H:i');
                                    @endphp
                                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                        @php
                                            // Check if the doctor has availability for the current day
                                            $availability = $Doctor->availabilities->firstWhere('day', $day);
                                            
                                            // If there's an availability, check if it matches the current day and time
                                            if ($availability) {
                                                $isAvailable = false;
                                                if ($availability->status == 1) { // Check if the status is "available"
                                                    $isAvailable = \Carbon\Carbon::parse($availability->start_time)->lte($currentTime) &&
                                                                   \Carbon\Carbon::parse($availability->end_time)->gte($currentTime);
                                                }
                                            }
                                        @endphp
                                        <div class="border mx-1 my-1 d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px; border-radius: 50%; 
                                                 background-color: {{ isset($isAvailable) && $isAvailable ? '#28a745' : '#e9ecef' }}; 
                                                 color: {{ isset($isAvailable) && $isAvailable ? '#fff' : '#6c757d' }}; 
                                                 font-weight: bold;">
                                            {{ substr($day, 0, 1) }}
                                        </div>
                                    @endforeach
                                </div>
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

@endsection
