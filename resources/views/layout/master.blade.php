<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/kwntu.ico" />

	<!-- FONTS -->

	<!-- Raleway font -->
	{{ HTML::style('https://fonts.googleapis.com/css?family=Raleway') }}
	<!-- Lora font -->
	{{ HTML::style('https://fonts.googleapis.com/css?family=Lora') }}

	<!-- CSS -->
	{{ HTML::style('assets/css/main.css') }}	
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


	<!-- JS -->
	{{ HTML::script('assets/js/main.js') }}
	
</body>
</html>