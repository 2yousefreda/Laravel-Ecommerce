
@extends('layout.app')
@section('title') index category @endsection
@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>ALL Categories</h1>
					</div>
				</div>
			</div>
           
		</div>
	</div>
	<!-- end breadcrumb section -->

<!-- products -->
<div class="breadcrumb-text mt-50" style="width: 100%; height: 100px; display: flex; align-items: center; justify-content: center;">
    
        <a href="{{route('category.create')}}" class="btn btn-primary" style="width: 150px; height: 50px;">Create</a>
</div>
<div class="product-section mt-150 mb-150">
    <div class="container">
        
        <div class="row product-lists">
            <div class="row">
                @foreach ($categories as $category )
                @php
                
                $path=Storage::url($category->imagepath)
                @endphp
					
                    <div class="col-lg-4 col-md-6 text-center ">
					<div class="single-product-item shadow p-3 mb-5 bg-body-tertiary rounded">
						<div class="product-image ">
							<a href="{{route('category.product',$category->id)}}"><img src="{{$path}}" alt=""></a>
						</div>
						<h3>{{$category->name}}</h3>
                        <p>{{$category->description}}</p>
                        <a class="btn btn-info" href="{{route('category.product',$category->id)}}">View</a>
                        <a class="btn btn-primary" href="{{route('category.edit',$category->id)}}">Edit</a>
                        <form method="POST" action="{{route('category.destroy',$category->id)}}" style=" display: inline">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger " >Delete</button>
                        </form>
					</div>
				</div>
                @endforeach
				
				
			</div>
		</div>
	</div>
        
    </div>
</div>
<!-- end products -->
@endsection