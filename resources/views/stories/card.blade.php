<div class="story">
	@if (Auth::check() && Auth::user()->can('update-story', $story))
		<button class="btn btn-info prevw-btn story-edit-btn hide">Edit Story</button>
	@else
		<button class="btn btn-info prevw-btn hide">Sneek Peek</button>
	@endif
	@if(Auth::check())

	<button class="btn btn-info prevw-btn hide" style="left: 0">
		<i class="fa fa-bookmark-o"></i>		
	</button>

	@endif
	<a href='{{ url("/story/$story->id-$story->title_slug") }}'>
		<img class="img-responsive img-thumbnail"
			 src='{{ $story->getCover() }}'
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