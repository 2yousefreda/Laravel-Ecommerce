

@extends('layout.dashboard.master')
@section('title') Orders @endsection
@section('dashboard_css')
{{-- <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/dashboard/css/adminlte.min.css')}}"> --}}
@endsection
@section('location')Orders: {{count($orders)}} @endsection
@section('content')
<div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 10%">
                    Order Id
                </th>
                <th style="width: 20%">
                    Client Id
                </th>
                <th style="width: 20%">
                    Client name
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order )
                
            <tr>
                <td>
                    {{$order->id}}
                </td>
                <td>
                    <a>
                        {{$order->user_id}}
                    </a>
                    <br/>
                    <small>
                        Created {{($order->created_at)}}
                    </small>
                      
                </td>
                <td>
                    {{$order->name}}
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{route('order.show',$order->id)}}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <form method="POST" action="{{route('order.destroy',$order->id)}}" style=" display: inline">
                          @csrf
                          @method('DELETE')
                        <button type="submit" class="btn btn-info btn-sm " >Done</button>
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