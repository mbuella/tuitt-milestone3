@extends('layout.master')

@section('title','Mabuhay! | kwntu')

@section('content')
<main class="container">	
	<!-- Jumbotron -->	
	<div class="jumbotron home-page text-center">
		<div class="row">
			<h2>Halina't magbasa ng mga kwentong sariling atin.</h2> 

			<a class="btn btn-primary btn-lg" href="read">Tara na!</a>

			<div class="arrow-scroll">
				<a class="btn btn-link" id="home-next">
					<span class="fa fa-angle-down fa-3x"
						  aria-hidden="true">
					</span>									
				</a>
			</div>			
		</div>
	</div>

	<!-- About -->
	
	<div class="row" id="about">
		<div class="col-md-12">
			<h2 class="main-heading">Ano ang kwntu?</h2>
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
						<div class="panel-heading">
							<h4 class="panel-title">
								<h3>Kasaysayan</h3>
							</h4>
						</div>
					</a>
					<div id="collapse1" class="panel-collapse collapse in">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
				<div class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
						<div class="panel-heading">
							<h4 class="panel-title">
								<h3>Wika</h3>
							</h4>
						</div>
					</a>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
				<div class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
						<div class="panel-heading">
							<h4 class="panel-title">
								<h3>Nakakapagpalibang</h3>
							</h4>
						</div>
					</a>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
				<div class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">			
						<div class="panel-heading">
							<h4 class="panel-title">
								<h3>Tagalog</h3>
							</h4>
						</div>
					</a>
					<div id="collapse4" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
				<div class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">			
						<div class="panel-heading">
							<h4 class="panel-title">
								<h3>Ugnayan</h3>							
							</h4>
						</div>
					</a>
					<div id="collapse5" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
			</div> 
		</div>
	</div>

</main>
@endsection