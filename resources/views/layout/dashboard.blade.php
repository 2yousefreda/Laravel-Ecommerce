<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    

    <!-- GOOGLE FONTS-->
    <link
      href="{{url('http://fonts.googleapis.com/css?family=Open+Sans')}}"
      rel="stylesheet"
      type="text/css"
    />
  </head>
  <body>
    <div id="wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
          <div class="navbar-header">
            <button
              type="button"
              class="navbar-toggle"
              data-toggle="collapse"
              data-target=".sidebar-collapse"
            >
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            @php
            // dd(Auth::user()->name);

            $username=Auth::guard('admin')->User()->name;
            @endphp
            <div style="margin: 20px; display:block;">
  
              <i class="fa fa-user" style="color: white;"> </i>
              <p style="color:white; display: inline;">{{$username}}</p>
            </div>
          </div>

          <span class="logout-spn">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf 
            </form>
            <a href="#" style="color: #fff" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                LOGOUT <i class="fa fa-sign-out-alt"></i>
            </a>
        </span>
        </div>
      </div>
      <!-- /. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="main-menu">
            <li class="active-link">
              <a href="{{route('dashboard')}}"
                ><i class="fa fa-desktop"></i>Dashboard
                </a
              >
            </li>
          </ul>
        </div>
      </nav>
      <!-- /. NAV SIDE  -->
      <div id="page-wrapper">
        <div id="page-inner">
          <div class="row">
            <div class="col-lg-12">
              <h2>ADMIN DASHBOARD</h2>
            </div>
          </div>


          @yield('content')

              <!-- /. PAGE WRAPPER  -->

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
  </body>
</html>
