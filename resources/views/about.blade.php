@extends('layout.master')

@section('title','Ano ito? | kwntu')

@section('content')
<main class="container">
	
	<!-- About -->
	
	<div class="row" id="about">
		<div class="col-md-12">
			<h1 class="main-heading text-center">Ano ang kwntu?</h1>
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
						<div class="panel-heading">
							<h4 class="panel-title">
								<h3><strong>K</strong>asaysayan</h3>
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
								<h3><strong>W</strong>ika</h3>
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
								<h3><strong>N</strong>akakapagpalibang</h3>
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
								<h3><strong>T</strong>agalog</h3>
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
								<h3><strong>U</strong>gnayan</h3>							
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