@extends('layout.master')

@section('title','Stories | kwntu')

@section('content')

<main class="container" id="genres">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12 stories-right">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<span class="genre-box-lg">
					 <div class="panel text-center tile-1">
					 	<h2>Genres</h2>
					 </div>
				</span>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<a href="{{ url('/stories/classics') }}" class="genre-box-sm">
					 <div class="panel tile-3">
					 	<h4>Classics</h4>
					 </div>
				</a>
				<a href="{{ url('/stories/science-fiction') }}" class="genre-box-sm">
					 <div class="panel tile-3">
					 	<h4>Science Fiction</h4>
					 </div>
				</a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<a href="{{ url('/stories/humor') }}" class="genre-box-sm">
					 <div class="panel tile-1">
					 	<h4>Humor</h4>
					 </div>
				</a>
				<a href="{{ url('/stories/horror') }}" class="genre-box-sm">
					 <div class="panel tile-5">
					 	<h4>Horror</h4>
					 </div>
				</a>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 stories-right">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<a href="{{ url('/stories/fantasy') }}" class="genre-box-sm">
					 <div class="panel tile-3">
					 	<h4>Fantasy</h4>
					 </div>
				</a>
				<a href="{{ url('/stories/history') }}" class="genre-box-sm">
					 <div class="panel tile-4">
					 	<h4>History</h4>
					 </div>
				</a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<a href="{{ url('/stories/poetry') }}" class="genre-box-sm">
					 <div class="panel tile-5">
					 	<h4>Poetry</h4>
					 </div>
				</a>
				<a href="{{ url('/stories/short-story') }}" class="genre-box-sm">
					 <div class="panel tile-2">
					 	<h4>Short Story</h4>
					 </div>
				</a>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<a href="{{ url('/stories/romance') }}" class="genre-box-lg">
					 <div class="panel tile-a">
					 	<h4>Romance</h4>
					 </div>
				</a>
			</div>
		</div>
	</div>		
</main>

@endsection