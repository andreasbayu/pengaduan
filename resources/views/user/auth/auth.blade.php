<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaporIN @yield('titlte')</title>
    <link rel="stylesheet" href="{{ asset ('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset ('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/css/main.css')}}">
</head>
<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        @yield('content')
    </div>
    <!-- Script -->
    <script src="{{ asset ('assets/vendor/jquery/jquery.min.js')}}"></script>
</body>
</html>