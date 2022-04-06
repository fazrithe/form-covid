<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Online SK - MurniCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('login1/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('login1/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('login1/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login1/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('theme1/images/icon.png') }}" />
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('login1/images/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4"></p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group first">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              </div>
              <div class="form-group last mb-4">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

              </div>

              <div class="d-flex mb-5 align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <span class="caption" for="remember">
                        {{ __('Remember Me') }}
                    </span>
                </div>
                <span class="ml-auto"> @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-pass">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif</span>
              </div>
              <button type="submit" class="btn btn-block btn-primary">
                {{ __('Login') }}
             </button>
              {{-- <a href="{{ route('register') }}">
              <span class="d-block text-left my-4 text-muted">&mdash; Register&mdash;</span>
              </a> --}}
            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="{{ asset('login1/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login1/js/popper.min.js') }}"></script>
    <script src="{{ asset('login1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login1/js/main.js') }}"></script>
  </body>
</html>
