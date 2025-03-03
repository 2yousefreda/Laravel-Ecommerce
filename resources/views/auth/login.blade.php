@extends('layout.auth')
@section('title')Login @endsection
@php
	
@endphp

@section('content')

				<form class="login100-form validate-form" action="{{route('login')}}" method="POST">
					@csrf
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						@error('email')
							<span class="danger ml-3" role="alert" style="font-size:12px; color: rgb(185, 42, 42); display:block;">
								<strong>{{$message}}</strong>
							</span>
						@enderror
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						@error('password')
                        <span class="danger ml-5" role="alert" style="font-size: small; color: rgb(185, 42, 42); display: block;">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>ٍ
						<span class="symbol-input100">
							<i class="fa fa-lock" style="margin-bottom: 20px " aria-hidden="true"></i>
						</span>
						
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="{{route('password.request')}}">
							Password?
						</a>
					</div>
					@if (Route::has('register'))
						
					<div class="text-center p-t-136">
						<a class="txt2" href="{{route('register')}}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					@endif
				</form>

@endsection

