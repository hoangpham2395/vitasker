<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ getConfig('APP_NAME', 'Vitasker') }} | @yield('title_page')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('layouts.loads.loadCss')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Header -->
    @include('layouts.navbar')
    <!-- Menu -->
    @include('layouts.sidebar')
    <!-- Content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- Footer -->
    @include('layouts.footer')
  </div>
</body>
@include('layouts.loads.loadJs')
</html>