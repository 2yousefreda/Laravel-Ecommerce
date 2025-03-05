@extends('layout.dashboard.master')
@section('title') show product @endsection
@section('dashboard_css') @endsection
@section('location')Show Product @endsection
@section('content')
<div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          {{-- <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3> --}}
          <div class="col-12">
            @php
                
            $path=Storage::url($product->imagepath)
            @endphp

            <img src="{{$path}}" class="product-image" alt="Product Image" style="max-width: 300px">
          </div>
       
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3">Product Name:  {{$product->name}}</h3>
          <h4>Category ID: {{$product->category_id}} </h4>
          <h4>Category Name: {{$categoryName}} </h4>
          <h4>Price: {{$product->price}} $</h4>
          <h4>Quantity: {{$product->quantity}} </h4>
          <p><h5>Dscription:</h5> {{$product->description}} </p>
          </div>

        </div>
      </div>
      
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('dashboard_script') @endsection