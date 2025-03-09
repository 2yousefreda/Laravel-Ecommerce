

@extends('layout.dashboard.master')
@section('title') categories @endsection
@section('dashboard_css')
{{-- <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/dashboard/css/adminlte.min.css')}}"> --}}
@endsection
@section('location')Categories: {{count($categories)}}@endsection
@section('content')
<div class="create_section" style="width: 100%; height: 100px; display: flex; align-items: center; justify-content: center;"> 
        <a href="{{route('category.create')}}" class="btn btn-primary" style="width: 100px;">Create</a>
</div>
<div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 10%">
                    Category Id
                </th>
                <th style="width: 20%">
                    Category Name
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )
                
            <tr>
                <td>
                    {{$category->id}}
                </td>
                <td>
                    <a>
                        {{$category->name}}
                    </a>
                    <br/>
                    <small>
                        Created {{($category->created_at)}}
                    </small>
                      
                <td>
                 
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{route('category.A_show',$category->id)}}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                   
                    <form method="POST" action="{{route('category.destroy',$category->id)}}" style=" display: inline">
                        @csrf
                        @method('DELETE')
                       
                      <button type="submit" class="btn btn-danger btn-sm " >
                        <i class="fas fa-trash">
                        </i>
                        Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
         
            
        </tbody>
    </table>
  </div>

@endsection
@section('dashboard_script')
{{-- <script src="{{asset('assets/dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dashboard/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dashboard/js/demo.js')}}"></script> --}}

@endsection