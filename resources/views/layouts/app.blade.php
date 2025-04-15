
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/htmx.org@1.9.6"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>@yield("title, Default title")</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    ::after,
    ::before {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    h1 {
        font-weight: 600;
        font-size: 1.5rem;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }
    .wrapper {
        display: flex;
    }
    
    .main {
        min-height: 100vh;
        width: 100%;
        overflow: hidden;
        transition: all 0.35s ease-in-out;
        background-color: #fafbfe;
    }
    
    #sidebar {
        width: 70px;
        min-width: 70px;
        z-index: 1000;
        transition: all .25s ease-in-out;
        background-color: #0e2238;
        display: flex;
        flex-direction: column;
    }
    
    #sidebar.expand {
        width: 260px;
        min-width: 260px;
    }
    
    .toggle-btn {
        background-color: transparent;
        cursor: pointer;
        border: 0;
        padding: 1rem 1.5rem;
    }
    
    .toggle-btn i {
        font-size: 1.5rem;
        color: #FFF;
    }
    
    .sidebar-logo {
        margin: auto 0;
    }
    
    .sidebar-logo a {
        color: #FFF;
        font-size: 1.15rem;
        font-weight: 600;
    }
    
    #sidebar:not(.expand) .sidebar-logo,
    #sidebar:not(.expand) a.sidebar-link span {
        display: none;
    }
    
    .sidebar-nav {
        padding: 2rem 0;
        flex: 1 1 auto;
    }
    #sidebar:not(.expand) .logout-btn span {
        display: none;
    }
    
    a.sidebar-link {
        padding: .625rem 1.625rem;
        color: #FFF;
        display: block;
        font-size: 0.9rem;
        white-space: nowrap;
        border-left: 3px solid transparent;
    }
    
    .sidebar-link i {
        font-size: 1.1rem;
        margin-right: .75rem;
    }
    
    a.sidebar-link:hover {
        background-color: rgba(255, 255, 255, .075);
        border-left: 3px solid #3b7ddd;
    }

    
    
    .sidebar-item {
        position: relative;
    }
    
    #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
        position: absolute;
        top: 0;
        left: 70px;
        background-color: #0e2238;
        padding: 0;
        min-width: 15rem;
        display: none;
    }
    
    #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
        display: block;
        max-height: 15em;
        width: 100%;
        opacity: 1;
    }
    
    #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
        border: solid;
        border-width: 0 .075rem .075rem 0;
        content: "";
        display: inline-block;
        padding: 2px;
        position: absolute;
        right: 1.5rem;
        top: 1.4rem;
        transform: rotate(-135deg);
        transition: all .2s ease-out;
    }
    
    #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
        transform: rotate(45deg);
        transition: all .2s ease-out;
    }
 

    .logout-btn {
        background: none;
        border: none;
        color: #FFF;
        width: 100%;
        text-align: left;
        padding: 0.625rem 1.625rem;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        border-left: 3px solid transparent;
        cursor: pointer;
    }

    .logout-btn i {
        font-size: 1.1rem;
        margin-right: .75rem;
    }

    .logout-btn:hover {
        background-color: rgba(255, 255, 255, .075);
        border-left: 3px solid #3b7ddd;
    }
</style>
<body>

    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button id="toggle-btn" type="button" class="toggle-btn">
                    <i class="ri-layout-grid-fill"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">
                        <span>MediCare</span>
                    </a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('mainpage') }}"
                       class="sidebar-link"
                       hx-boost="true"
                       hx-push-url="true">
                        <i class="ri-home-8-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                       data-bs-target="#appointment" aria-expanded="false" aria-controls="appointment">
                        <i class="ri-calendar-todo-fill"></i>
                        <span>Appointment</span>
                    </a>
                    <ul id="appointment" class="sidebar-dropdown list-unstyled collapse"
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('appointment.appointment_list') }}"
                               class="sidebar-link"
                               hx-boost="true"
                               hx-push-url="true">
                                <i class="ri-notification-2-fill"></i> Appointment List
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('appointmentrecord')}}" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                                <i class="ri-folder-history-fill"></i> Appointment Record
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link has-dropdown collapsed"data-bs-toggle="collapse"
                    data-bs-target="#doctor" aria-expanded="false" aria-controls="doctor">
                    <i class="ri-empathize-fill"></i>
                        <span>Doctor</span>
                    </a>
                    <ul id="doctor" class="sidebar-dropdown list-unstyled collapse"
                         data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{route('DoctorList')}}" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-user-shared-line"></i>Doctor List</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('AddDoctor')}}" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-user-add-fill"></i>Add Doctor</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('DoctorRecord')}}" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-id-card-fill"></i>Doctor Record</a>
                        </li>
                    </ul>    
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link has-dropdown collapsed"data-bs-toggle="collapse"
                    data-bs-target="#patient" aria-expanded="false" aria-controls="patient">
                    <i class="ri-user-voice-fill"></i>
                        <span>Patient</span>
                    </a>
                    <ul id="patient" class="sidebar-dropdown list-unstyled collapse"
                         data-bs-parent="#sidebar">
                         <li class="sidebar-item">
                            <a href="{{route('AddPatient')}}"
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-user-add-fill"></i>Add Patient</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('PatientList')}}" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-account-circle-fill"></i>Patient List</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link has-dropdown collapsed"data-bs-toggle="collapse"
                    data-bs-target="#payment" aria-expanded="false" aria-controls="payment">
                    <i class="ri-shake-hands-line"></i>
                        <span>Transactions</span>
                    </a>
                    <ul id="payment" class="sidebar-dropdown list-unstyled collapse"
                         data-bs-parent="#sidebar">
                         <li class="sidebar-item">
                            <a href="" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-list-view"></i>Transaction List</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-capsule-line"></i>
                            Prescription
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-money-dollar-circle-fill"></i>Payment</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-folder-history-fill"></i>Transaction Records</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link has-dropdown collapsed"data-bs-toggle="collapse"
                    data-bs-target="#setting" aria-expanded="false" aria-controls="setting">
                    <i class="ri-settings-2-line"></i>
                    <span>Settings</span>
                    </a>
                    <ul id="setting" class="sidebar-dropdown list-unstyled collapse"
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{route('profile.edit')}}" 
                            class="sidebar-link"
                            hx-boost="true"
                            hx-push-url="true">
                            <i class="ri-profile-line"></i>Profile</a>
                        </li>
                    </ul>
                </li>
            </ul> 
            <div class="sidebar-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link logout-btn">
                        <i class="ri-logout-box-line"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>
        <div class="main p-3">
                @yield('content')
        </div>
    </div>
    
</body>

<script>
    if (typeof toggleSidebar === 'undefined') {
        function toggleSidebar() {
            const toggleBtn = document.getElementById('toggle-btn');
            const sidebar = document.getElementById('sidebar');
            
            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('expand');
                });
            }
        }
    }

    // Initial binding
    toggleSidebar();

    // Rebind after HTMX updates
    document.body.addEventListener('htmx:afterSwap', () => {
        toggleSidebar();
    });
</script>
</html>
