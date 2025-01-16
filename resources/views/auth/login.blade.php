<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE -->
    <title>Login | Fillow Saas Admin Template</title>

    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICON -->
    <!-- Include Favicon here if needed -->

    <!-- CSS STYLES -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- You can add other stylesheets as needed -->
</head>

<body>
    <div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="card mb-0 h-auto">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="text-center mb-3">
                                <a href="{{ url('/') }}">
                                    <img class="logo-auth" src="{{ asset('images/logo-full.png') }}" alt="Logo">
                                </a>
                            </div>

                            <!-- Login Form Heading -->
                            <h4 class="text-center mb-4">Login to your account</h4>

                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Name or Email Field -->
                                <div class="form-group mb-4">
                                    <label for="login" class="form-label">Name or Email</label>
                                    <input 
                                        id="login" 
                                        type="text" 
                                        name="login" 
                                        class="form-control @error('login') is-invalid @enderror" 
                                        value="{{ old('login') }}" 
                                        required 
                                        autocomplete="login" 
                                        autofocus
                                    >
                                    @error('login')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="form-group mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input 
                                        id="password" 
                                        type="password" 
                                        name="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        required 
                                        autocomplete="current-password"
                                    >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Remember Me Checkbox -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" class="form-check-label">Remember me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                                    @endif
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </form>

                            <!-- New Account Link -->
                            <div class="new-account mt-3 text-center">
                                <p>Don't have an account? <a href="{{ route('register') }}" class="text-primary">Sign up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <!-- Include the necessary JS files -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
</body>

</html>
