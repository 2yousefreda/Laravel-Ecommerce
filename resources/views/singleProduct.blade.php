
@extends('layout.app')
@section('title') {{$product->name}} @endsection
	
@section('content')
        <?php
            $path=Storage::url($product->imagepath)
          ?>
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
<!-- single product -->

<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="single-product-img">
                    <img src="{{$path}}" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{$product->name}}</h3>
                    <p class="single-product-pricing"><span>Per Kg</span> ${{$product->price}}</p>
                    <p>{{$product->description}}</p>
                    <div class="single-product-form">
                        <form method="POST" action="{{route('cart.store',[$product->id]) }}">
                            @csrf
                            <input type="number" name="quantity" placeholder="0">
                            <input type="submit" value="Add to Cart"  class="cart-btn" ><i class="fas fa-shopping-cart"></i> </input>
                        </form>
                        <p><strong>Categories: </strong>{{$category}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="more-products mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">Related</span> Products</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($related as $product )  
            <?php
            $path=Storage::url($product->imagepath)
          ?>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{route('product.show',$product->id)}}"><img style="max-height: 250px; min-height: 250px;" src="{{$path}}" alt=""></a>
                    </div>
                    <h3>{{$product->name}}</h3>
                    <p class="product-price"><span>Per Kg</span> {{$product->price}}$ </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end more products -->
@endsection