<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Page -->
    <title>Registrasi Ideasi Edii</title>

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Custom CSS -->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .login-card {
        display: flex;
        width: 100%;
        max-width: 1000px;
        max-height:600px;
        border-radius: 0.25rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .login-image-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ffffff; /* Warna latar belakang */
    }

    .login-image {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Membuat gambar memenuhi area dengan proporsi */
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .login-form-container {
        flex: 1;
        padding: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ffffff; /* Warna latar belakang form */
    }

    @media (max-width: 768px) {
        .login-card {
            flex-direction: column;
        }

        .login-image-container,
        .login-form-container {
            max-width: 100%;
            height: auto;
        }

        .login-image {
            height: 200px;
        }
    }
</style>


</head>

<body>
    <div class="container login-container">
        <div class="login-card">
            <!-- Left Side: Image -->
            <div class="login-image-container">
            <img src="images/registrasi.jpg" alt="Login Image" class="login-image">
            </div>

            <!-- Right Side: Form -->
            <div class="login-form-container">
                <div class="card-body login-form">
                    <div class="text-center mb-1">
                        <a href="#">
                            <img src="images/logo.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
                        </a>
                    </div>
                    <h5 class="text-center mb-3">Registration Page</h5>
                    <form method="POST" action="{{ route('register.post') }}">
              @csrf

              @session('error')
                  <div class="alert alert-danger" role="alert"> 
                      {{ $value }}
                  </div>
              @endsession


              
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name@example.com" required>
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                  </div>
                  @error('name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                  </div>

                  @error('email')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                  </div>
                  @error('password')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="password_confirmation" required>
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                  </div>
                  @error('password_confirmation')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">{{ __('Register') }}</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Have an account? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Sign in</a></p>
                </div>
              </div>
            </form>

                
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="vendor/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
