@extends('layout.dashboard.master')
@section('title') show Admin @endsection
@section('dashboard_css') @endsection
@section('location') Admin @endsection
@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-user"></i>
          User: {{$user['id']}}
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <ul>
          <li>User ID: {{$user['id']}}</li>
          <li>Client Name: {{$user['name']}}</li>
          <li>UserName: {{$user['username']}}</li>
          <li>Email: {{$user['email']}}</li> 
          <li>Phone: {{$user['phone_number']}}</li> 
          @can('super_admin')
          @if ($user['is_superAdmin'])
          <li>Super Admin: YES</li> 
          @else
          <li>Super Admin: NO</li> 

          @endif
            
          @endcan
          <li>Created at: {{$user['created_at']}}</li>
          <li>Updated at: {{$user['updated_at']}}</li>
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    @can('admin.Profile.edit',$user)
    {{-- @dd($user) --}}
    <a href="{{route('admin.profile.edit')}}" class="btn btn-primary">Edit Profile</a>
    @endcan
    <!-- /.card -->
  </div>
  </div>
@endsection
@section('dashboard_script') @endsection