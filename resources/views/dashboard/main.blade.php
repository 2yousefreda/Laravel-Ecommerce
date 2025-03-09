
@extends('layout.dashboard.master')
@section('title') dashboard @endsection
@section('dashboard_css') @endsection
@section('location')dashboard @endsection
@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$order}}</h3>

            <p>Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-plane"></i>
          </div>
          <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$product}}<sup style="font-size: 20px"></sup></h3>

            <p>Product</p>
          </div>
          <div class="icon">
            <i class="ion ion-cube"></i>
          </div>
          <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      </div>
      </div>

@endsection
@section('dashboard_script') @endsection
