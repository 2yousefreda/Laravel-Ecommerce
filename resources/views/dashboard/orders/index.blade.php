

@extends('layout.dashboard.master')
@section('title') Orders @endsection
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
                    @if(Auth::guard('admin')->user())
                    Client Id
                    @else
                    date
                    @endif
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
                    @if(Auth::guard('admin')->user())
                    <a>
                        {{$order->user_id}}
                    </a>
                    <br/>
                    @endif
                    <small>
                        Created {{($order->created_at)}}
                    </small>
                      
                </td>
                <td>
                    {{$order->name}}
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" @if(Auth::guard('web')->user())  href="{{route('user.order.show',$order->id)}}" @else href="{{route('order.show',$order->id)}}" @endif >
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    
                    <form method="POST" action="{{route('order.destroy',$order->id)}}" style=" display: inline">
                          @csrf
                          @method('DELETE')
                        <button type="submit" @if(Auth::guard('web')->user())  class="btn btn-danger btn-sm" @else class="btn btn-info btn-sm "  @endif >@if(Auth::guard('web')->user()) cancel @else Done @endif </button>
                    </form>
                    
    
                    
                </td>
            </tr>
            @endforeach
         
            
        </tbody>
    </table>
  </div>

@endsection
@section('dashboard_script')


@endsection