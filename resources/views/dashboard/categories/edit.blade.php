
@extends('layout.dashboard.master')
@section('title') Edit Category @endsection
@section('dashboard_css')

@endsection
@section('location')Edit Category @endsection
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
      <h3 class="card-title">Create Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('category.update',$category->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="name">Category Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="category name" value="{{$category->name}}">
        </div>
        <div class="form-group">
          <label for="Description">Description</label>
          <textarea name="description" class="form-control" id="Description" placeholder="Description">{{$category->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Category Image</label>
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