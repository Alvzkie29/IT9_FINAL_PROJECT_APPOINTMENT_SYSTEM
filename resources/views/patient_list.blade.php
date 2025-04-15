@extends('layouts.app')

@section('title', 'Patient List')
@section('content')

<div class="main">
    <h1 class="text-primary">Patient List</h1>
    <div class="border"></div>
    <div class="row mt-4">
        <form action="{{ route('patients.search') }}" method="GET" class=" mb-3 d-flex justify-content-end">
            <input type="text" name="search" class="form-control w-25 me-2" placeholder="Search patients..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary btn-sm">Search</button>
        </form>
    </div>
        <div class="table">
            <table class="table align-middle mb-0 bg-white table-striped ">
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
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->firstname }}</td>
                            <td>{{ $patient->lastname }}</td>
                            <td>{{ $patient->age }}</td>
                            <td>{{ ($patient->gender) }}</td>
                            <td>{{ $patient->contact }}</td>
                            <td>{{ $patient->email }}</td>      
                            <td>{{ ($patient->marital) }}</td>
                            <td>
                                <div class="dropdown ">
                                    <button class="btn btn-sm dropdown-toggle rounded-pill bg-primary text-white" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-settings-3-line me-1"></i>Actions
                                    </button>
                                    <ul class="dropdown-menu shadow-sm border-0 rounded-3" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="{{ route('patient.edit', $patient->id) }}" class="dropdown-item text-success fw-bold">
                                                <i class="fa-solid fa-pen-to-square me-2"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger fw-bold dropdown-item">
                                                    <i class="fa-solid fa-trash me-2"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.show', $patient->id) }}" class="dropdown-item text-primary fw-bold">
                                                <i class="fa-solid fa-eye me-2"></i> View
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                {{ $patients->links() }}
            </div>
        </div>
    
</div>
@endsection