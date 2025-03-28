@extends('layout.app')
@section('title') Shop @endsection
@section('content')
    
       
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head" >
                            <tr class="table-head-row">
                                <a href="{{route('cart.destroyAll')}}" class="boxed-btn black">Clear Cart</a>
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$isEmpty)
                                
                                @foreach ($products as  $product)
                                @php
                                    $iamge_Path=Storage::url($product->image_Path)
                                @endphp
                                <tr class="table-body-row">
                                    <form  method="POST" action="{{route('cart.destroy',$product->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <td class="product-remove"><button type="submit" style="border-style: none;"> <i class="far fa-window-close"></i></button></td>
                                    </form>
                                    <td class="product-image"><img src="{{($iamge_Path)}}" alt=""></td>
                                    <td class="product-name">{{$product->product_Name}}</td>
                                    <td class="product-price">${{$product->product_Price}}</td>
                                    <td class="product-quantity"><p>{{$product->quantity}}</p></td>
                                    <td class="product-total">{{$product->total_Price}}</td>
                                </tr>
                                @endforeach
                                
                            @endif
                           
                        </tbody>
                    </table>
                    @if ($isEmpty)
                        
                    <div class="mt-5" style="width: 100%; display: flex; justify-content: center;">
                        <h1>EMPTY</h1>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @error('totalPrice')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td>${{$subtotal}}</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Shipping: </strong></td>
                                <td>${{$shipping}}</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>${{$totalPrice}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons" style="display: flex; align-items:center; justify-content: center;">
                        <a href="{{route('order.create',['isEmpty'=>$isEmpty,'suptotal'=>$subtotal,'shipping'=>$shipping,'totalPrice'=>$totalPrice])}}" class="boxed-btn black">Check Out</a>
                    </div>
                </div>

                


            </div>
        </div>
    </div>
</div>
<!-- end cart -->
@endsection