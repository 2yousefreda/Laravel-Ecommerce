@extends('layout.auth.userAuth')
@section('title')edit profile @endsection
@section('content')

		
				<form class="login100-form validate-form" action="{{route('profile.update')}}" method="POST">
					@csrf
                    @method('PUT')
					<span class="login100-form-title">
						Update Profile
					</span>
						@if (session('status'))
							<div class="mb-4 font-medium text-sm" style="color: green; font-size: 13px;">
								{{ session('status') }}
							</div>
						@endif
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        @error('name')
                        <span class="danger ml-2" role="alert" style=" display: block; font-size: 13px; color: rgb(185, 42, 42);">
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
							Update
						</button>
					</div>
				</form>
@endsection