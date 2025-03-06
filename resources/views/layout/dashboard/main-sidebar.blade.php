@php
// dd(Auth::user()->name);

$username=Auth::guard('admin')->User()->name;
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('assets/dashboard/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dashboard/img/user8-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$username}}</a>
        </div>
        <div class="info">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf 
        </form>
          <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-block">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            Logout
          </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Products
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
          <li class="nav-item">
            <a href="{{route('order.index')}}" class="nav-link">
              <i class="nav-icon fas fa-plane"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            
          </li>
          @can('super_admin')
            
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Admins
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.create')}}" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Register Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          @endcan
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>