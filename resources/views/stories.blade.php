@extends('layout.master')

@section('title',ucfirst($genre->genre_name).' | kwntu')

@section('content')

<main class="container">	
	<div class="row" id="stories-home">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<a href="#">
				<div class="panel week-story">
					<h4>Story of the week</h4>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 stories-right">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<a href="#">
					 <div class="panel new-stories">
					 	<h4>New</h4>
					 </div>
				</a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<a href="#">
					 <div class="panel rising-stories">
					 	<h4>Rising</h4>
					 </div>
				</a>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<a href="#">
					 <div class="panel featured-stories">
					 	<h4>Featured</h4>
					 </div>
				</a>
			</div>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="grid" data-columns>	
			@each('stories.card', $stories, 'story')
			<div class="clearfix"></div>
		</div>
	</div>
</main>

@endsection