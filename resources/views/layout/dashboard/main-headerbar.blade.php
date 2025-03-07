
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
        @if (Auth::guard('web')->user())
        <a href="{{route('home')}}" class="nav-link">Home</a>
        @else
        <a href="{{route('dashboard')}}" class="nav-link">Home</a>

        @endif
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        
      </li>
    </ul>

    <!-- Right navbar links -->
    
  </nav>


