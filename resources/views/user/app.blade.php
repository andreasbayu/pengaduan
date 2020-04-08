<!doctype html>
<html lang="en">

<head>
	<title>LaporIN @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset ('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset ('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset ('assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset ('assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset ('assets/img/favicon.png')}}">
</head>

<body>
	@include('sweetalert::alert')
	<!-- WRAPPER -->
	<div id="wrapper">

        <!-- navbar -->
            @include('user.layout.nav')
        <!-- end navbar -->

        <!-- left sidebar -->
            @include('user.layout.sidebar')
        <!-- end side bar -->

		<!-- MAIN -->
		<div class="main">
            @yield('content')
		</div>
        <!-- END MAIN -->


		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="#">Andbayu</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset ('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset ('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset ('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ asset ('assets/scripts/klorofil-common.js')}}"></script>

</body>

</html>
