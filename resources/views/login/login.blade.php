<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vitasker | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Logo -->
  <link rel="shortcut icon" href="{{ asset('images/logo_short_red.png') }}">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/css/iCheck/blue.css') }}">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">Vitasker</div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your system</p>

      <form action="{{ url('login') }}" method="post" enctype="multipart/form-data" role="form">
        <!-- Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- Errors -->
        @if ($errors->any())
        <div class="form-group">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif

        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" required name="username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" required name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember_me"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="#">I forgot my password</a><br>
      <a href="#" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <!-- iCheck -->
  <script src="{{ asset('assets/js/icheck.min.js') }}"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    });
  </script>
</body>
</html>
