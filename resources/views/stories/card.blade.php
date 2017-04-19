<div class="story">
	<button class="btn btn-info prevw-btn hide">Sneek Peek</button>
	@if(Auth::check())

	<button class="btn btn-info prevw-btn hide" style="left: 0">
		<i class="fa fa-bookmark-o"></i>		
	</button>

	@endif
	<a href='{{ url("/story/$story->id-$story->title_slug") }}'>
		<img class="img-responsive img-thumbnail"
			 src='{{ asset(Storage::url("covers/$story->cover_filename")) }}'
		 	 alt="{{ $story->title }}">
		<div class="panel hide">
			<h4>
				<strong> {{ $story->title }} </strong>
			</h4>
			<h5>ni {{ $story->author->pen_name }} </h5>
			<div>
				<span>
					<i class="fa fa-eye"></i>
					{{ $story->getTotalViews() }}								
				</span>
				<span>										
					<i class="fa fa-heart"></i>
					{{ $story->getTotalHearts() }}	
				</span>
			</div>
		</div>
	</a>
</div>	