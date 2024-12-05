<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Page -->
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="icon" href="images/icon.png" type="image/png">
    <!-- Custom CSS -->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-image {
            background: url('images/bg-title-02.jpg') no-repeat center center;
            background-size: cover;
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .login-card {
            display: flex;
            width: 100%;
            max-width: 1000px;
            border-radius: 0.25rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-form {
            padding: 3rem;
        }

        .login-image-container {
            flex: 1;
            max-width: 50%;
        }

        .login-form-container {
            flex: 1;
            max-width: 50%;
        }

        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
            }

            .login-image-container {
                max-width: 100%;
                height: 200px;
            }

            .login-form-container {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="login-card">
            <!-- Left Side: Image -->
            <div class="login-image-container">
                <div class="login-image w-100 h-100"></div>
            </div>

            <!-- Right Side: Form -->
            <div class="login-form-container">
                <div class="card-body login-form">
                    <div class="text-center mb-4">
                        <a href="#">
                            <img src="images/logo.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
                        </a>
                    </div>
                    <h5 class="text-center mb-3">Login Page</h5>
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                               <small> {{ session('error') }} </small>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                            @error('email')
                                <div class="invalid-feedback">
                                <small>{{ $message }} </small>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                <small> {{ $message }} </small>
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rememberMe" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Keep me logged in
                                </label>
                            </div>
                            <a href="#!" class="text-decoration-none">Forgot password?</a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        </div>
                    </form>

                    <p class="text-center mt-3">
                        Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="vendor/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
