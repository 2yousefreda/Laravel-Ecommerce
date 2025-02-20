@section('title')Admin @endsection   
@extends('layout.dashboard')
@section('content')
          <!-- /. ROW  -->
          <hr />
          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-info">
                <strong>Welcome Jhon Doe ! </strong> You Have No pending Task
                For Today.
              </div>
            </div>
          </div>
          <!-- /. ROW  -->
          <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                <a href="{{route('product.index')}}">
                  <i class="fa fa-circle-o-notch fa-5x"></i>
                  <h4>products</h4>
                </a>
              </div>
            </div>

        
            
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                <a href="blank.html">
                  <i class="fa fa-users fa-5x"></i>
                  <h4>See Users</h4>
                </a>
              </div>
            </div>
            
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                <a href="blank.html">
                  <i class="fa fa-key fa-5x"></i>
                  <h4>Admin</h4>
                </a>
              </div>
            </div>
           
          <!-- /. ROW  -->
          <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                <a href="{{route('category.index')}}">
                  <i class="fa fa-clipboard fa-5x"></i>
                  <h4>Categories</h4>
                </a>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                <a href="blank.html">
                  <i class="fa fa-gear fa-5x"></i>
                  <h4>Settings</h4>
                </a>
              </div>
            </div>
          
          
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                <a href="{{route('order.index')}}">
                  <i class="fa fa-rocket fa-5x"></i>
                  <h4>Orders</h4>
                </a>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 " >
              <div class="div-square ">
                <a href="blank.html">
                  <i class="fa fa-user fa-5x "></i>
                  <h4>Register User</h4>
                </a>
              </div>
            </div>
          </div>
          <!-- /. ROW  -->
          <div class="row text-center pad-top"></div>
        </div>
      </div>
      <!-- /. PAGE INNER  -->
    </div>
@endsection