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
			@forelse($stories as $story)
				@include('stories.card')
				@if($loop->last)
					@push('styles-footer')
						<link rel="stylesheet"
							type="text/css"
							href="{{ asset('assets/css/salvattore-cards.css') }}">
					@endpush()

					@push('scripts-footer')
					    <script src="{{ asset('assets/js/lib/salvattore.js') }}"></script>
					@endpush
				@endif
			@empty
				<h3 class="text-center">No stories for this genre.</h3>
			@endforelse
			<div class="clearfix"></div>
		</div>
	</div>
</main>


@endsection