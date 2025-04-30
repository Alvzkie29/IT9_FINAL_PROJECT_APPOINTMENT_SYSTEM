@extends('layouts.app')

@section('title', 'Doctor Records')
@section('content')

<div class="main">
    <h1 class="text-primary">Doctor Records </h1>
    <div class="border"></div>
     <div class="row mt-3 justify-content-end">
    <div class="col-md-3">
        <form action="{{ route('DoctorRecord') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control w-25 me-2" placeholder="Search doctors..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </div>
        </form>
    </div>
</div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
    @endif
     <div class="row mt-5">
         <div class="table">
             <table class="table align-middle mb-0 bg-white table-striped ">
                 <thead class="bg-light">
                     <tr>
                        <th><i class="ri-collapse-vertical-line"></i>Profile</th>
                         <th><i class="ri-collapse-vertical-line"></i>First Name</th>
                         <th><i class="ri-collapse-vertical-line"></i>Last Name</th>
                         <th><i class="ri-collapse-vertical-line"></i>Gender</th>
                         <th><i class="ri-collapse-vertical-line"></i>Email</th>
                         <th><i class="ri-collapse-vertical-line"></i>Specialization</th>
                         <th><i class="ri-collapse-vertical-line"></i>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     @forelse($DoctorRecord as $record)
                     <tr>
                         <td>
                             @if($record->image_path)
                                 <img src="{{ asset('storage/' . $record->image_path) }}" alt="Profile Image" width="50" height="50" class="rounded-circle">
                             @else
                                 <p class="mb-1">No Image</p>
                             @endif
                         </td>
                         <td>
                            <p class="mb-1">{{ $record->firstname }}</p>
                        </td>
                         <td>
                            <p class="mb-1">{{ $record->lastname }}</p>
                        </td>
                         <td>
                            <p class="mb-1">{{ $record->gender }}</p>
                         </td>
                         <td>
                            <p class="mb-1 text-link">{{ $record->email }}</p>
                         </td>
                         <td>
                            <p class="mb-1">{{ $record->specialization }}</p>
                         </td>
                         <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-settings-3-line me-1"></i>Action
                                </button>
                        
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a href="{{ route('DoctorView', $record->DoctorId) }}" class="dropdown-item text-success">View</a></li>
                                    <li><a href="{{ route('DoctorEdit', $record->DoctorId) }}" class="dropdown-item text-secondary">Edit</a></li>
                                    <li>
                                        <form action="{{ route('DeleteDoctor', $record->DoctorId) }}" method="POST" 
                                            onsubmit="return confirm('Are you sure you want to remove this Doctor?');"
                                            class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                        </form>
                                </ul>
                            </div>
                            
                         </td>
                     </tr>
                     @empty
                     <tr>
                         <td colspan="7">No records found for doctors.</td>
                     </tr>
                     @endforelse
                 </tbody>
             </table>
         </div> 
        <div class="d-flex justify-content-center mt-3">
            {{ $DoctorRecord->appends(['search' => request('search')])->links() }} 
     </div>
 </div>
@endsection
