<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/loginStyle/vendor/bootstrap/css/bootstrap.min.css")}}">
<!--=============================================asset/loginStyle/==================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/loginStyle/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
<!--=============================================asset/loginStyle/==================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/loginStyle/vendor/animate/animate.css")}}">
<!--=============================================asset/loginStyle/==================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset("assets/loginStyle/vendor/css-hamburgers/hamburgers.min.css")}}">
<!--=============================================asset/loginStyle/==================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/loginStyle/vendor/select2/select2.min.css")}}">
<!--=============================================asset/loginStyle/==================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/loginStyle/css/util.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("assets/loginStyle/css/main.css")}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset("assets/loginStyle/images/img-01.png")}}" alt="IMG">
				</div>


		
                @yield('content')
				
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{asset("assets/loginStyle/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/loginStyle/vendor/bootstrap/js/popper.js")}}"></script>
	<script src="{{asset("assets/loginStyle/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/loginStyle/vendor/select2/select2.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("assets/loginStyle/vendor/tilt/tilt.jquery.min.js")}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset("assets/loginStyle/js/main.js")}}"></script>

</body>
</html>