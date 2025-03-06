@extends('layout.auth.userAuth')
@section('title')Register @endsection

				
@section('content')
				<form class="login100-form validate-form" action="{{route('register')}}" method="POST">
					@csrf
					<span class="login100-form-title">
						Member Register
					</span>

					<div class="wrap-input100 validate-input" d>
                        @error('name')
							<span class="danger ml-5" role="alert" style="font-size: small; color: rgb(185, 42, 42);">
								<strong>{{$message}}</strong>
							</span>
						@enderror
						<input class="input100" type="text" name="name" placeholder="name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
                    
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        @error('email')
                        <span class="danger ml-5" role="alert" style="font-size: small; color: rgb(185, 42, 42);">
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
                        <span class="danger ml-5" role="alert" style="font-size: small; color: rgb(185, 42, 42); display: flex; align-items: center;">
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
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="text-center p-t-100">
						<a class="txt2" href="{{route('login')}}">
							I have already account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
@endsection