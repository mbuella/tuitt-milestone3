<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Responsive Design Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/kwntu.ico') }}" />

	<!-- FONTS -->

	<!-- Raleway font -->
	{{ HTML::style('https://fonts.googleapis.com/css?family=Raleway') }}
	<!-- Lora font -->
	{{ HTML::style('https://fonts.googleapis.com/css?family=Lora') }}

	<!-- App styles/scripts -->
	<!-- CSS -->
	{{ HTML::style(asset('assets/css/main.css')) }}
	<!-- JS -->
	{{ HTML::script(asset('assets/js/main.js')) }}	

</head>
<body>


@include('layout.header')

@if(Session::has('message'))
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success alert-dismissable">
		  			<a href="#" class="close"
		  			   data-dismiss="alert" aria-label="close">&times;</a>
					{{ Session::get('message') }}
				</div>				
			</div>
		</div>
	</div>
@endif

@yield('content')

@include('layout.footer')

@stack('styles-footer')

@stack('scripts-footer')
	
</body>
</html>