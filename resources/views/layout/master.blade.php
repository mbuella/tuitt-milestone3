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