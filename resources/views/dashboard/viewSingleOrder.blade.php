@extends('layout.dashboard')
@section('title')Orders @endsection
@section('content')

<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
         <h2>Order  </h2>   
        </div>
    </div>              
  <hr/>


  <table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">Order Details</th>
            <th scope="col">Information</th>
        </tr>
    </thead>
    <tbody>
      
        <tr>
            <td><strong>Order ID</strong></td>
            <td>{{$order['id']}}</td>
        </tr>
        <tr>
            <td><strong>Name</strong></td>
            <td>{{$order['name']}}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{$order['email']}}</td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td>{{$order['address']}}</td>
        </tr>
        <tr>
            <td><strong>Phone</strong></td>
            <td>{{$order['phone']}}</td>
        </tr>
        <tr>
            <td><strong>Description</strong></td>
            <td>{{$order->description ? $order['description'] : 'not found'}}</td>
        </tr>
        <tr>
            <td><strong>shipping</strong></td>
            <td>{{$order->shipping}}</td>
        </tr>
        <tr>
            <td><strong>Price</strong></td>
            <td>{{$order->total_price}}</td>
        </tr>
       
        <tr>
            <td><strong>Products</strong></td>
            <td>
                @php
                    
                    $products = json_decode($order->cart_items);
                    
                @endphp
                @if (is_array($products) && count($products) > 0)
                    <ul>
                        @foreach ($products as $product)
                         <li><p>product Id : {{ $product->product_id }}</p></li> 
                         <li><p>product Name : {{ $product->product_name }}</p></li> 
                         <li><p>product quantity : {{ $product->quantity }}</p></li> 
                         <li><p>Price : {{ $product->product_price }}</p></li> 
                            
                        @endforeach
                    </ul>
                @else
                    <span>No products available</span>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Created At</strong></td>
            <td>{{$order->created_at}}</td>
        </tr>
        <tr>
            <td colspan="2"><hr/></td> 
        </tr>
       
    </tbody>
</table>

@endsection