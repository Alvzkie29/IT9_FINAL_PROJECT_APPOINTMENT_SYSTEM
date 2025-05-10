@php
    $notifications = Auth::user()->unreadNotifications;
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title, Default title")</title>
    <script src="https://unpkg.com/htmx.org"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    

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

  .card {
animation: fadeIn 0.5s ease-in-out;
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
  #doctor_id ,#date, #time, #firstname, #lastname, #age, #gender, #contact, #email, #marital {
  font-size: 18px;
  padding: 12px; 
  width: 100%;
  height: 60px; 
  }
  .btn {
      transition: all 0.3s ease-in-out;
  }
  
  .btn:hover {
      transform: scale(1.05);
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  }

  #btn-book  , #save-info{
      background-color: #0d6efd;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
  }
  .hover-shadow:hover {
    box-shadow: 0 0 20px rgba(0,0,0,0.15) !important;
}
.transition {
    transition: all 0.3s ease;
}   
.navbar-nav .nav-link:hover {
    color: #000000 !important;
    text-decoration: underline;
    transition: color 0.3s ease-in-out;
}

    .navbar-nav .nav-link {
        color: #000000 !important;
        font-weight: 500;
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
                    <li class="nav-item"><a class="nav-link" href="{{route("user.dashboard")}}"
                        hx-boost="true"
                        hx-push-url="true">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.About') }}"
                        hx-boost="true"
                        hx-push-url="true">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.Doctors') }}"
                        hx-boost="true"
                        hx-push-url="true">Doctors</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="appointmentDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Appointment
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="appointmentDropdown">
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('AccountDetails') }}"
                                       hx-boost="true"
                                       hx-push-url="true">
                                        Book Appointment
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('user.history') }}"
                                       hx-boost="true"
                                       hx-push-url="true">
                                        History
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-user-line"></i> Profile
                            @if($notifications->count() > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $notifications->count() }}
                                </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown" style="width: 300px;">
                            <li class="dropdown-item disabled fw-semibold">🔔 Notifications</li>
                            @forelse($notifications as $notification)
                                <li>
                                    <a class="dropdown-item text-wrap" href="{{ route('notifications.read', $notification->id) }}"
                                        hx-boost="true"
                                        hx-push-url="true">
                                        {{ $notification->data['message'] ?? 'New Notification' }}
                                        <br><small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </a>
                                </li>
                            @empty
                                <li><span class="dropdown-item text-muted">No new notifications</span></li>
                            @endforelse
                            <li><hr class="dropdown-divider"></li>
                            <li class="dropdown-header text-primary fw-bold">{{ Auth::user()->email }}</li>
                            <li><hr class="dropdown-divider"></li>
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
    <script>
            document.addEventListener("htmx:beforeRequest", function() {
                document.getElementById("reload-bar").style.display = "block";
            });

            document.addEventListener("htmx:afterRequest", function() {
                document.getElementById("reload-bar").style.display = "none";

            });
    </script>
</body>
</html>
