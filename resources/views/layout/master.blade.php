<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- LIBRARIES -->
	<!-- Bootstrap CSS -->
	{{ HTML::style('vendors/bootstrap/styles/bootstrap.min.css') }}
	<!-- jQuery -->
	{{ HTML::script('vendors/jquery/scripts/jquery.min.js') }}
	<!-- Bootstrap JS -->
	{{ HTML::script('vendors/bootstrap/scripts/bootstrap.min.js.css') }}

	<!-- CUSTOM -->
	<!-- CSS -->
	{{ HTML::style('assets/styles/app.css') }}
	<!-- JS -->
	{{ HTML::script('assets/scripts/app.js') }}
</head>
<body>

@include('layout.header')

@yield('content')

@include('layout.footer')

</body>
</html>