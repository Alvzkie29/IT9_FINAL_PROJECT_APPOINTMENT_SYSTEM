<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-color: #a2b8da;
    }
    .card {
        border-radius: 1rem;
    }
    .card-body {
        padding: 4rem 2rem;
    }
    .form-label {
        font-size: 1.2rem;
    }
    .btn-dark {
        background-color: #393f81;
        border: none;
    }
    .btn-dark:hover {
        background-color: #7991b4;
    }
    
</style>
<body>
    <section class="vh-100" style="background-color: #a2b8da;">
        <div class="container py-3 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="{{ asset('images/login-register.png') }}" alt="login form" class="img-fluid h-100 w-100 object-fit-cover" style="border-radius: 1rem 0 0 1rem; object-fit: cover;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <span class="d-flex align-items-center mb-4">
                            <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo" style="max-height: 80px;" class="img-fluid">
                        </span>                          
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login into your account</h5>
      
                        <div data-mdb-input-init class="form-outline mb-2">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" />
                        </div>
      
                        <div data-mdb-input-init class="form-outline mb-2">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>
      
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? 
                          <a href="{{ route('register') }}">Register here</a></p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</body>
</html>