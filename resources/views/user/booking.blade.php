@extends('layouts.nav')

@section('title', 'Book Appointment')
@section('content')
<div class="container mt-2">
    <div class="hero-section text-center">
        <h1 class="display-4">Book Your Appointment</h1>
        <p class="lead">Choose your doctor and schedule your appointment.</p>
   </div>
   <div class="border p-3 ">
        <a href="{{route('AccountDetails')}}" class="btn btn-outline-primary btn-lg mx-2 shadow-sm rounded-pill px-4 py-2">
            <i class="ri-user-add-line"></i> Create Personal Info
        </a>
        <a href="{{ route('PatientInfo') }}" class="btn btn-outline-primary btn-lg mx-2 shadow rounded-pill px-4 py-2">
            <i class="ri-user-line"></i> Patient Details
        </a>
        <a href="{{route('user.booking')}}" class="btn btn-outline-primary btn-lg mx-2 shadow-sm rounded-pill px-4 py-2 ">
            <i class="ri-calendar-check-line"></i> Book an Appointment
        </a>
      <div class="row justify-content-center mt-3">
        <div class="col-md-10">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
    
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Select Doctor</label>
                        <select name="doctor_id" id="doctor_id" class="form-select form-control-lg  w-100">
                            <option value="">Choose...</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->DoctorId }}">{{ $doctor->firstname }} {{ $doctor->lastname }} - {{ $doctor->specialization }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('doctor_id'))
                            <span class="text-danger">{{ $errors->first('doctor_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">Select Date</label>
                        <input type="date" name="date" id="date" class="form-control" min="{{ date('Y-m-d') }}">
                        @if ($errors->has('date'))
                            <span class="text-danger">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    
                </div>
        
                <div class="mb-3">
                    <label for="time" class="form-label">Available Time Slots</label>
                    <select name="time" id="time" class="form-select">
                        <option value="">Select a time</option>
                    </select>
                    @if ($errors->has('time'))
                        <span class="text-danger">{{ $errors->first('time') }}</span>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="concern" class="form-label">Your Concern</label>
                    <textarea name="concern" id="concern" class="form-control" rows="3"></textarea>
                    @if ($errors->has('concern'))
                        <span class="text-danger">{{ $errors->first('concern') }}</span>
                    @endif
                </div>
            </div>
        </div>
      </div>
        <div class="row justify-content-end mt-2">
                <div class="col-md-2">
                    <button type="submit" id="btn-book" class="btn">Book Now</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const doctorSelect = document.getElementById('doctor_id');
    const dateInput = document.getElementById('date');
    const timeSelect = document.getElementById('time');

    function loadAvailableSlots() {
        const doctorId = doctorSelect.value;
        const date = dateInput.value;

        if (doctorId && date) {
            fetch(`/booking/available-slots?doctor_id=${doctorId}&date=${date}`)
                .then(response => response.json())
                .then(data => {
                    timeSelect.innerHTML = '<option value="">Select a time</option>';
                    data.forEach(time => {
                        // Format time using Carbon-like formatting
                        const formattedTime = new Date(`1970-01-01T${time}:00`).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                        timeSelect.innerHTML += `<option value="${time}">${formattedTime}</option>`;
                    });
                });
        }
    }

    doctorSelect.addEventListener('change', loadAvailableSlots);
    dateInput.addEventListener('change', loadAvailableSlots);
});
</script>
@endsection
