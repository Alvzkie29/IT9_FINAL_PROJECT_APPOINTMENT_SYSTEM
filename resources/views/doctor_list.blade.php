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
                        <a href="{{ route('AddDoctor') }}"
                         hx-boost="true"
                        hx-push-url="true"
                        class="btn border fw-bold"><i class="ri-add-line border border-primary text-primary rounded-pill me-2"></i>Add Doctor</a>
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
                            <hr class="my-2">
                            <div class="row md-3 py-3">
                                <div class="d-flex justify-content-center flex-wrap">
                                    @php
                                        $currentDay = \Carbon\Carbon::now()->format('l'); // Full day name like 'Monday'
                                    @endphp

                                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                        @php
                                            $availability = $Doctor->availabilities->firstWhere('day', $day);
                                            $isAvailable = $availability && $availability->status == 1;
                                            $isToday = $currentDay === $day;
                                        @endphp

                                        <div class="mx-1 my-1 d-flex align-items-center justify-content-center"
                                            style="width: 50px; height: 50px; border-radius: 50%;
                                                    background-color: {{ $isAvailable ? '#28a745' : '#e9ecef' }};
                                                    color: {{ $isAvailable ? '#fff' : '#6c757d' }};
                                                    font-weight: bold;
                                                    border: 3px solid {{ $isToday ? '#007bff' : 'transparent' }};">
                                            {{ substr($day, 0, 3) }}
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div> 
            <div class="mt-4 d-flex justify-content-center">
                {{ $Doctorlist->withQueryString()->links() }}
            </div>
        </div> 
    </div> 
</div> 

@endsection
