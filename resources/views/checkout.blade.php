

@extends('layout.app')
@section('title') Chickout @endsection
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Check Out Product</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                      <div class="card single-accordion">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Billing Address
                            </button>
                          </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="billing-address-form">
                              @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                         
                                <form id="orderForm" method="POST" action="{{route('order.store')}}">
                                    @csrf
                                    <p><input type="text" name="name" placeholder="Name"></p>
                                    <p><input type="email" name="email" placeholder="Email"></p>
                                    <p><input type="text" name="address" placeholder="Address"></p>
                                    <p><input type="tel" name="phone" placeholder="Phone"></p>
                                    <p><textarea name="description"  cols="30" rows="10" placeholder="Say Something"></textarea></p>
                                    <input type="hidden" name="shipping" value="{{$shipping}}">
                                    <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card single-accordion">
                        <div class="card-header" id="headingTwo">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Shipping Address
                            </button>
                          </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="shipping-address-form">
                                <p>Your shipping address form is here.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card single-accordion">
                        <div class="card-header" id="headingThree">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Card Details
                            </button>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="card-details">
                                <p>Your card details goes here.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
           
            <div class="col-lg-4">
                <div class="order-details-wrap">
                  @error('totalPrice')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                    <table class="order-details">
                        <thead>
                            <tr>
                                <th>Your order Details</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                      
                        <tbody class="order-details-body">
                            <tr>
                                <td>Product</td>
                                <td>Total</td>
                            </tr>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->product_Name}}</td>
                                <td>${{$order->total_Price}}</td>
                            </tr>
                            
                            @endforeach
                            
                        </tbody>
                        <tbody class="checkout-details">
                            <tr>
                                <td>Subtotal</td>
                                <td>${{$suptotal}}</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>${{$shipping}}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>${{$totalPrice}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" form="orderForm" value="Place Order" class="boxed-btn"></input>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->
@endsection