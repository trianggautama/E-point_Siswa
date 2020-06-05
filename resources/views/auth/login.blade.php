<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">

    <title>Aplikasi E-Point</title>

    <!-- vendor css -->
    <link href="{{asset('admin/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashforge.auth.css')}}">
  </head>
  <body>

    <header class="navbar navbar-header navbar-header-fixed">
      <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
      <div class="navbar-brand">
        <a href="/" class="df-logo">dash<span>forge</span></a>
      </div><!-- navbar-brand -->
      <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
          <a href="/" class="df-logo">dash<span>forge</span></a>
          <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
      </div><!-- navbar-menu-wrapper -->
      <div class="navbar-right">
        <a href="#" class="btn btn-buy"><i data-feather="home"></i> <span>Halaman Depan</span></a>
      </div><!-- navbar-right -->
    </header><!-- navbar -->

    <div class="content content-fixed content-auth mg-t-50 pd-t-100">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
          <div class="media-body align-items-center d-none d-lg-flex">
            <div class="mx-wd-600">
              <img src="{{asset('admin/assets/img/login.png')}}" class="img-fluid" alt="">
            </div>
          </div><!-- media-body -->
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
            <div class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">Sign In</h3>
              <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>

              <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class=" text-md-left">Username</label>

                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="password" class="text-md-left">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btn-brand-02 btn-block">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
            </div>
          </div><!-- sign-wrapper -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <footer class="footer">
      <div>
        <span>&copy; 2019 DashForge v1.0.0. </span>
        <span>Created by <a href="http://themepixels.me">ThemePixels</a></span>
      </div>
      <div>
        <nav class="nav">
          <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
          <a href="../../change-log.html" class="nav-link">Change Log</a>
          <a href="https://discordapp.com/invite/RYqkVuw" class="nav-link">Get Help</a>
        </nav>
      </div>
    </footer>

    <script src="{{asset('admin/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/lib/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/dashforge.js')}}"></script>

    <!-- append theme customizer -->
    <script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashforge.settings.js')}}"></script>

  </body>
</html>
