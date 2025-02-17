@extends('layout.app')
@section('title') Shpo @endsection
	
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                   
                    <h1>Add Item</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               
                 <div id="form_status"></div>
                <div class="contact-form">
                    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                        
                        <p>
                            <input type="text" placeholder="Name" value="{{old('name')}}" name="name" style="width: 100%" >
                            <div class="input-group mb-3">
                                <input type="file" name="imagepath" class="form-control" >
                                <label class="input-group-text" for="imagepath">Upload</label>
                              </div>
                           
                        </p>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">Price</span>
                            <input type="text" value="{{old('price')}}"  name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                          </div>
                          <p>
                            <input type="number" value="{{old(key: 'quantity')}}" placeholder="quantity" name="quantity" > quantity
                          </p>
                        <div class="mb-3">
                            Category
                            <select name="category_id" value="{{old('category_id')}}" class="form-control" style="width: 50%"> 
                              @foreach ($categories as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        <p><textarea name="description" value="{{old('description')}}" id="message" cols="30" rows="10" placeholder="description"></textarea></p>
                        <p><input type="submit" value="Add"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- end contact form -->
@endsection