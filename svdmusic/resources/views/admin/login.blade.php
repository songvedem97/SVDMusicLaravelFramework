<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SVD cPanel | Log in</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/dist/css/adminlte.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ url('public/siteadmin') }}/dist/css/style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>
      <form action="" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
         
        </div>
        @error('email')
        <small id="helpId" class="text-muted">{{ $message }}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <small id="helpId" class="text-muted">{{ $message }}</small>
        @enderror
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>        
    @endif
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('public/siteadmin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/siteadmin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/siteadmin') }}/dist/js/adminlte.min.js"></script>
</body>
</html>