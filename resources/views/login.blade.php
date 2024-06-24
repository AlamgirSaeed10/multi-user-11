@extends('includes.master')

@section('content')
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: url('https://images.pexels.com/photos/633409/pexels-photo-633409.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center/cover;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .glass-container {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .card-body {
        padding: 0 !important; /* Reset padding as it will be managed by glass-container */
    }
</style>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5 glass-container">
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p style="color:red;">{{ $error }}</p>
                            @endforeach
                        @endif
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"
                                style="background: url('{{ asset('assets/img/auth_img.png') }}');  background-position: center; background-size: cover;">
                            </div> --}}
                            <div class="col-sm-12 col-md-12 col-lg-12">

                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-white-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <form method="POST" class="user" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input id="email" type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input class="custom-control-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="custom-control-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>

                                                @if (Route::has('password.request'))
                                                    <a class="float-right" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Login') }}
                                        </button>

                                        <hr>

                                        <div class="text-center">
                                            <a href="{{ route('register') }}"
                                                class="btn btn-google btn-user btn-block">
                                                Don't have an account? <b> Register</b> </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
@endsection
