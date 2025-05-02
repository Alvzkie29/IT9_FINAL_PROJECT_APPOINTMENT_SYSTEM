@extends('layouts.app')

@section('title', 'Patient List')
@section('scripts')
@section('content')

<div class="main">
    <h1 class="text-primary">Patient List</h1>
    <div class="border"></div>
    <div class="row mt-4">
        <form 
        hx-get="{{ route('patients.search') }}"
        hx-target="body" 
        hx-push-url="true"
        class="mb-3 d-flex justify-content-end">
        <input type="text" name="search" class="form-control w-25 me-2" placeholder="Search patients..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary btn-sm">Search</button>
    </form>
    </div>
    <div id="patient-list" class="row mt-3">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('patient_exists'))
                <div class="alert alert-warning">{{ session('patient_exists') }}</div>
            @endif
        </div>
        <div class="table">
            <table class="table align-middle mb-0 bg-white table-striped">
                <thead class="bg-light">
                    <tr>
                        <th><i class="ri-collapse-vertical-line"></i>ID</th>
                        <th><i class="ri-collapse-vertical-line"></i>First Name</th>
                        <th><i class="ri-collapse-vertical-line"></i>Last Name</th>
                        <th><i class="ri-collapse-vertical-line"></i>Age</th>
                        <th><i class="ri-collapse-vertical-line"></i>Gender</th>
                        <th><i class="ri-collapse-vertical-line"></i>Contact No.</th>
                        <th><i class="ri-collapse-vertical-line"></i>Email</th>
                        <th><i class="ri-collapse-vertical-line"></i>Marital Status</th>
                        <th><i class="ri-collapse-vertical-line"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->firstname }}</td>
                        <td>{{ $patient->lastname }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->contact }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->marital }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle rounded-pill bg-primary text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-settings-3-line me-1"></i>Actions
                                </button>
                                <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                                    <li>
                                        <a href="{{ route('patient.edit', $patient->id) }}"
                                           class="dropdown-item text-success"
                                           hx-boost="true"
                                           hx-push-url="true">
                                           Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form 
                                            hx-post="{{ route('patients.destroy', $patient->id) }}"
                                            hx-target="body"
                                            hx-boost="true"
                                            hx-push-url="true"
                                            onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-danger dropdown-item">
                                                Delete
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <a 
                                            href="{{ route('patients.show', $patient->id) }}"
                                            hx-boost="true"
                                            hx-push-url="true"
                                            class="dropdown-item text-primary">
                                            View
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No patients found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-md-2 mt-3">
                    {{ $patients->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection