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

	<!-- Font Awesome! -->
	<link rel="stylesheet" type="text/css" href="vendors/fontawesome/styles/font-awesome.min.css">

	<!-- LIBRARIES -->
	<!-- Bootstrap CSS -->
	{{ HTML::style('vendors/bootstrap/styles/bootstrap.min.css') }}
	<!-- jQuery -->
	{{ HTML::script('vendors/jquery/scripts/jquery.min.js') }}
	<!-- Bootstrap JS -->
	{{ HTML::script('vendors/bootstrap/scripts/bootstrap.min.js') }}

	<!-- CUSTOM -->
	<!-- Customized Bootsrap Theme -->
	{{ HTML::style('vendors/bootstrap/styles/bootstrap.custom.min.css') }}
	<!-- CSS -->
	{{ HTML::style('assets/styles/main.css') }}
	<!-- JS -->
	{{ HTML::script('assets/scripts/main.js') }}
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

</body>
</html>