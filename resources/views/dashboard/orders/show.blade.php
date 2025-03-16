@extends('layout.dashboard.master')
@section('title') show category @endsection
@section('dashboard_css') @endsection
@section('location')Show Order @endsection
@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-plane"></i>
          Order: {{$order->id}}
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <ul>
          <li>Order ID: {{$order->id}}</li>
          <li>Client Name: {{$order->name}}</li>
          <li>Phone Number: {{$order->phone}}</li>
          <li>Email: {{$order->email}}</li>
          <li>Address: {{$order->address}}</li>
          <li>Description: {{$order->description}}</li>
          <li>Products
            @foreach ($products as $product)
            <ul>
              <li>Product ID: {{$product->product_id}}</li>
              <ul>

                <li>Product name: {{$product->product_name}}</li>
                <li>Product price: {{$product->product_price}}</li>
                <li>Product quantity: {{$product->quantity}}</li>
              </ul>
                
            </ul>
              @endforeach
          </li>
          <li>shipping: {{$order->shipping}}</li>
         
          <li>Total Price: {{$order->total_price}}</li>
          
          <li>Created at: {{$order->created_at}}</li>
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  </div>
@endsection
@section('dashboard_script') @endsection