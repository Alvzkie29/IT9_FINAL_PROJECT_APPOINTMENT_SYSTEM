<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title, Default title")</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(to right, rgba(0, 123, 255, 0.7), rgba(0, 123, 255, 0.5));
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
        }
        .card:hover {
            transform: scale(1.05);
            transition: 0.3s ease-in-out;   
        }
        .stepper {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .step {
      text-align: center;
      cursor: pointer;
    }
    .step-circle {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #dee2e6;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      margin: auto;
      transition: background-color 0.3s;
    }
    .step.active .step-circle {
      background-color: #0d6efd;
      color: white;
    }
    
    .step-line {
      height: 4px;
      background-color: #dee2e6;
      flex: 1;
      margin: 0 10px;
      transition: background-color 0.3s;
    }
    .step.done .step-line {
      background-color: #0d6efd;
    }
    .form-step {
      display: none;
    }
    .form-step.active {
      display: block;
    }
    .form-step {
      display: none;
      animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .card img {
      object-fit: contain;
      width: 100%;
      max-height: 200px;
    }

    .btn-choice {
      margin: 5px;
      border-radius: 20px;
      padding: 8px 16px;
    }

    .btn-choice:hover {
      background-color: #0d6efd;
      color: white;
    }
             
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">MediCare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route("user.dashboard")}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Doctors</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="appointmentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Appointment
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="appointmentDropdown">
                            <li><a class="dropdown-item" href="{{route("user.booking")}}">Book Appointment</a></li>
                            <li><a class="dropdown-item" href="{{route('user.history')}}">History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-user-line"></i> Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                    @csrf
                                    <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main">
        @yield('content')
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
