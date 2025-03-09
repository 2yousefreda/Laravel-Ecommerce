@extends('layout.dashboard.master')
@section('title') show category @endsection
@section('dashboard_css') @endsection
@section('location')Show Category @endsection
@section('content')
<div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          {{-- <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3> --}}
          <div class="col-12">
            @php
                
            $path=Storage::url($category->imagepath)
            @endphp

            <img src="{{$path}}" class="product-image" alt="Product Image" style="max-width: 400px">
          </div>
       
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3">Category Name:  {{$category->name}}</h3>
          <h3>Number Of Products: {{$products}}</h3>
          <p><h5>description:</h5> {{$category->description}}</p>
          </div>

        </div>
      </div>
      
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('dashboard_script') @endsection