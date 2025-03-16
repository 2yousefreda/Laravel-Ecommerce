@extends('layout.auth.adminAuth')

@section('title')Edit profile @endsection 
<a  href="{{route('dashboard')}}"><i class="nav-icon fas fa-sign-out-alt"></i> HOME</a>
@section('name') Edit profile @endsection 

@section('content') 


<div class="login-box"> 

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    {{session('success')}}
  </div>
    
@endif





<div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Edit profile</p>

      <form action="{{route('admin.profile.update')}}" method="post">
        @csrf
        @method('PUT')  
        <div class="input-group mb-3">
          <input name="name" type="text" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
  
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
 
        <div class="input-group mb-3">
            <input name="phone_number" type="text" class="form-control" placeholder="phone">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Update profile</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    <!-- /.form-box -->
  </div><!-- /.card -->
  @endsection 