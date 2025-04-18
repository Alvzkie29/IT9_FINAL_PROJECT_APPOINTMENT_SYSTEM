@extends('layouts.nav')

@section('title', 'Book Appointment')
@section('content')

<div class="container mt-5">
    <div class="bg-white shadow rounded p-4">
      <div class="stepper mb-4">
        <div class="step" >
          <div class="step-circle">1</div>
          <div>Personal Info</div>
        </div>
        <div class="step-line" id="line-1"></div>
        <div class="step">
          <div class="step-circle">2</div>
          <div>Doctor</div>
        </div>
        <div class="step-line" id="line-2"></div>
        <div class="step" >
          <div class="step-circle">3</div>
          <div>Confirmation</div>
        </div>
      </div>
      <form id="stepForm">
        <div class="form-step active" id="form-step-1">
          <div class="row">
              <div class="col-md-4">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" id="firstName" class="form-control" required>
              </div>
              <div class="col-md-4">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" id="lastName" class="form-control" required>
              </div>
          </div>
      </div>
      
        <!-- Step 2 -->
        
        <div class="form-step" id="form-step-2">
          <div class="row">
            @foreach($Doctorlist as $doctor)
            <div class="col-md-4 mb-3">
              <div class="card text-center shadow-sm p-3">
                <img src="{{ asset('storage/' . $doctor->image_path) }}" alt="Doctor Image" class="img-fluid" style="max-height: 150px;">
                <h5 class="mt-3">DR. {{ $doctor->firstname }} {{ $doctor->lastname }}</h5>
                <div class="mt-3">
                  <button type="button" class="btn btn-outline-primary btn-choice">Morning</button>
                  <button type="button" class="btn btn-outline-primary btn-choice">Afternoon</button>
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
              <!-- Step 3 -->
        <div class="form-step" id="form-step-3">
          <div class="row mt-3">
             <div class="col">
              <h1>Choose day</h1>
             </div>
          </div>
        </div>
      </form>
      <div class="text-center mt-4">
          <button class="btn btn-secondary me-2" onclick="prevStep()">Back</button>
          <button class="btn btn-primary" onclick="nextStep()">Next</button>
      </div>
    </div>
  </div>

  <script>
    let currentStep = 1;

    function updateSteps(step) {
    const steps = document.querySelectorAll('.step');
    const lines = document.querySelectorAll('.step-line');
    const forms = document.querySelectorAll('.form-step');

    steps.forEach((s, index) => {
        s.classList.toggle('active', index < step);
    });

    lines.forEach((line, index) => {
        line.classList.toggle('done', index < step - 1);
    });

    forms.forEach((form, index) => {
        form.classList.toggle('active', index + 1 === step);
    });

    currentStep = step;
    }

    function nextStep() {
    if (currentStep < 3) {
        updateSteps(currentStep + 1);
    }
    }

    function prevStep() {
    if (currentStep > 1) {
        updateSteps(currentStep - 1);
    }
    }

    function goToStep(step) {
    updateSteps(step);
    }

    updateSteps(currentStep);
  </script>
@endsection