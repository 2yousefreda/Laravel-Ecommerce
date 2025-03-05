
@extends('layout.dashboard.master')
@section('title') create Product @endsection
@section('dashboard_css')@endsection
@section('location') Create Product @endsection
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route("product.store")}}" enctype="multipart/form-data" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Product Name</label>
          <input value="{{old('name')}}" type="text" name="name" class="form-control" id="name" placeholder="category name">
        </div>
        <div class="form-group">
          <label for="Description">Description</label>
          <textarea value="{{old('description')}}" name="description" class="form-control" id="Description" placeholder="Description"></textarea>
        </div>

        <div class="form-group">
          <label>Category</label>
          <select value="{{old('category_id')}}" name="category_id" class="form-control select2bs4" style="width: 100%;">
            @foreach ($categories as $category)
            <option value="{{$category->id}}" >{{$category->name}}</option>
              
            @endforeach
            
           
          </select>
        </div>

        <div>
          <label for="price ">Price</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input value="{{old('price')}}" name="price" id="price" type="text" class="form-control">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
        </div>
        <div>

          <label for="quantity ">Quantity</label>
          <div class="input-group mb-3">
            <input value="{{old('quantity')}}" id="quantity" name="quantity" type="text" class="form-control">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-check"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputFile">Product Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input name="imagepath" type="file" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>
     
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

@endsection
@section('dashboard_script')
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection