@extends('layout.app')
@section('title') Edit @endsection
	
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                   
                    <h1>Edit Category</h1>
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
                    <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p>
                            <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{$category->name}}" >

                            
                            <div class="input-group mb-3">
                                <input type="file" name="imagepath" class="form-control" >
                                <label class="input-group-text">Upload</label>
                              </div>
                        </p>
                        <p><textarea name="description"  cols="60" rows="10" placeholder="Category description">{{$category->description}}</textarea></p>
                        <p><input type="submit" value="Add"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->
@endsection