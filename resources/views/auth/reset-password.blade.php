@extends('layout.auth.userAuth')
@section('title')reset password @endsection

				
@section('content')
@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
				<form class="login100-form validate-form" action="{{route('password.update')}}" method="POST">
					@csrf
					<span class="login100-form-title">
						Update Password?
					</span>
                    
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        @error('email')
                        <span class="danger ml-5" role="alert" style=" display: block; font-size: small; color: rgb(185, 42, 42);">
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
                    <div class="wrap-input100 validate-input" data-validate = "Password is required" style="margin-top: -20px">
						<input class="input100 is-invalid" type="password" name="password_confirmation" placeholder="Password conformation">
						<span class="focus-input100"></span>
						<span class="symbol-input100" >
							<i class="fa fa-lock" style="margin-bottom: 20px " aria-hidden="true"></i>
						</span>
						
					</div>
                    <input type="hidden" name="token" value="{{$request->route('token')}}">
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Update password
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