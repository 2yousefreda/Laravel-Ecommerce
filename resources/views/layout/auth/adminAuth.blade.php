<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
@include('layout.dashboard.head')
@include('layout.dashboard.footer-script')
</head>
<body class="hold-transition login-page">
    <div class="login-logo">
        <a href=""><b>Admin</b>@yield('name')</a>
      </div>
@yield('content')
</body>
</html>
