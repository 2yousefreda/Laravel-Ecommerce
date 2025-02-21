@extends('layout.dashboard')
@section('title')Orders @endsection
@section('content')


        
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Orders </h2>   
                    </div>
                </div>              
              <hr/>

        <div class="row">
            <div class="col-lg-12">
        <table class="table mt-4 row text-center pad-top" >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">phone</th>
                <th scope="col">description</th>
                <th scope="col">Create At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order )
                    
                <tr>
                  <td>{{$order['id']}}</td>
                  <td>{{$order['name']}}</td>
                  <td>{{$order['email']}}</td>
                  <td>{{$order['address']}}</td>
                  <td>{{$order['phone']}}</td>
                  <td>{{$order->description?$order['description']:'not found'}}</td>
                  <td>{{$order->created_at}}</td>
                  <td>
                      <a class="btn btn-info" href="{{route('order.show',$order->id)}}">View</a>
                      <form method="POST" action="{{route('order.destroy',$order->id)}}" style=" display: inline">
                          @csrf
                          @method('DELETE')
                        <button type="submit" class="btn btn-success " >done</button>
                      </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
            </div>
            </div>
  
@endsection