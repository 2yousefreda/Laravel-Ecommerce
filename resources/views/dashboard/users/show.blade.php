@extends('layout.dashboard.master')
@section('title') show User @endsection
@section('dashboard_css') @endsection
@section('location')Show User @endsection
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
          <li>Email: {{$user['email']}}</li> 
          <li>Created at: {{$user['created_at']}}</li>
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  </div>
@endsection
@section('dashboard_script') @endsection