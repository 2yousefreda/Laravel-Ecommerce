@extends('layout.auth.userAuth')
@section('title')reset password @endsection
@section('content')

		
				<form class="login100-form validate-form" action="{{route('password.email')}}" method="POST">
					@csrf
					<span class="login100-form-title">
						Forgot Password?
					</span>
						@if (session('status'))
							<div class="mb-4 font-medium text-sm" style="color: green; font-size: 13px;">
								{{ session('status') }}
							</div>
						@endif
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        @error('email')
                        <span class="danger ml-2" role="alert" style=" display: block; font-size: 13px; color: rgb(185, 42, 42);">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						
					</div>

		
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Reset
						</button>
					</div>

					<div class="text-center p-t-100">
						<a class="txt2" href="{{route('register')}}">
							I don't have an account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
@endsection