@extends('layouts.app')

@section('title', 'Clinic Dashboard')

@section('content')
<div class="main py-4">
    <div class="row">
        <div class="col">
            <div class="text-center mb-4">
                <h1 class="fw-bold">Welcome, Clinic Administrator</h1>
                <p class="text-muted">Efficiently manage doctors, appointments, and patients in one place.</p>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 bg-white">
                        <div class="mb-2" style="color: #0e2238;"><i class="fas fa-user-md fa-2x"></i></div>
                        <h5>Doctors</h5>
                        <p class="fs-4 fw-bold">{{ $doctorCount }}</p>
                        <a href="{{ route('DoctorRecord') }}" class="btn btn-outline-primary btn-sm">Manage Doctors</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 bg-white">
                        <div class="text-success mb-2"><i class="fas fa-calendar-check fa-2x"></i></div>
                        <h5>Appointments</h5>
                        <p class="fs-4 fw-bold">{{ $appointmentCount }}</p>
                        <a href="{{ route('appointmentlist') }}" class="btn btn-outline-success btn-sm">View Appointments</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 bg-white">
                        <div class="text-secondary mb-2"><i class="fas fa-users fa-2x"></i></div>
                        <h5>Patients</h5>
                        <p class="fs-4 fw-bold">{{ $patientCount }}</p>
                        <a href="{{ route('PatientList') }}" class="btn btn-outline-secondary btn-sm">View Patients</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col">
                    <div class="border border-0 shadow-sm text-center p-4 bg-white ">
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Monthly Appointments Chart Section -->
      <div class="row mt-3">
        <div class="col-md-8">
            <div class="border border-0 shadow-sm text-center p-4 bg-white">
                <div class="row mt-3 py-2 align-items-center">
                    <div class="col-md-3">
                        <input type="month" class="form-control" id="searchInput" value="{{ date('Y-m') }}">
                    </div>
                    <div class="col-md-9 d-flex justify-content-end">
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <h1 class="text-center fw-bold mb-4">Monthly Patient Appointments</h1>
                    <canvas id="appointmentsChart" width="500" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function renderAppointmentsChart(year) {
        const ctx = document.getElementById('appointmentsChart').getContext('2d');
        const monthNames = [
            '', 'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
    
        fetch(`/appointments/yearly/${year}`)
            .then(res => res.json())
            .then(data => {
                const labels = data.map(d => monthNames[d.month]);
                const counts = data.map(d => d.count);
    
                if (window.myChart) {
                    window.myChart.destroy();
                }
    
                window.myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: `Appointments in ${year}`,
                            data: counts,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 2,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: true }
                        },
                        scales: {
                            x: {
                                title: { display: true, text: 'Month' }
                            },
                            y: {
                                beginAtZero: true,
                                title: { display: true, text: 'Appointments' }
                            }
                        }
                    }
                });
            });
    }
    
    // Initial chart render on page load
    document.addEventListener('DOMContentLoaded', function () {
        const [year] = document.getElementById('searchInput').value.split('-');
        renderAppointmentsChart(year);
    });
    
    // Re-render chart after HTMX swap
    document.body.addEventListener('htmx:afterSwap', function(evt) {
        if (document.getElementById('appointmentsChart')) {
            const [year] = document.getElementById('searchInput').value.split('-');
            renderAppointmentsChart(year);
        }
    });
    </script>

@endsection
