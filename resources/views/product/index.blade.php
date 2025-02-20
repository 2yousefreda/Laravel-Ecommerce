
@extends('layout.app')
@section('title') index product @endsection
@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>ALL products</h1>
					</div>
				</div>
			</div>
           
		</div>
	</div>
	<!-- end breadcrumb section -->

<!-- products -->
<div class="breadcrumb-text mt-50" style="width: 100%; height: 100px; display: flex; align-items: center; justify-content: center;">
    
        <a href="{{route('product.create')}}" class="btn btn-primary" style="width: 150px; height: 50px;">Create</a>
</div>
<div class="product-section mt-150 mb-150">
    <div class="container">
        
        <div class="row product-lists">
            @foreach ($products as $product)
            @php
            
            $path=Storage::url($product->imagepath)
            @endphp
        
                
            <div class="col-lg-4 col-md-6 text-center  {{$product->category_id}}">
                <div class="single-product-item shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="product-image">
                        <a href="{{route('product.show',$product->id)}}"><img style="max-height: 250px; min-height: 250px;" src="{{$path }}" alt=""></a>
                    </div>
                    <h3>{{$product->name}}</h3>
                    <p class="product-price"><span>Per Kg</span> {{$product->price}}$ </p>
                    <form method="POST" action="{{route('product.updateQuantity')}}" style=" display: inline">
                        @csrf
                        <input type="hidden" value="{{$product->id}}" name="productId">
                        <p class="product-quantity"><span>Quantity:</span><input type="number" name="quantity" value="{{$product->quantity}}">  <button type="submit" class="btn btn-primary ml-3" >set</button></p>
                        
                    </form>
                    <a class="btn btn-info" href="{{route('product.show',$product->id)}}">View</a>
                    <a class="btn btn-primary" href="{{route('product.edit',$product->id)}}">Edit</a>
                    <form method="POST" action="{{route('product.destroy',$product->id)}}" style=" display: inline">
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-danger " >Delete</button>
                    </form>
                  
                </div>
            </div>
            @endforeach
        
    </div>
</div>
<!-- end products -->
@endsection