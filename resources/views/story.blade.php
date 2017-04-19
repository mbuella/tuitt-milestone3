@extends('layout.master')

@section('title',"{$chap_title} - {$story->title} | kwntu")

@section('content')
<main class="container" id="story">
	<div class="row">
		<div class="col-md-3">
			<div class="panel">
				<div class="panel story-cover text-center">
					<div class="panel-heading">
						<!-- story cover -->
						<img src="{{ $story_cover }}" 
							 class="img-thumbnail img-responsive">				
					</div>
					<h4>
						<strong> {{ $story->title }} </strong>
					</h4>
					<small> ni {{ $story->author->pen_name }} </small>
				</div>
				<div class="list-group chapter-list">

				@foreach($chapters as $chapter)
					@if($curr_chapter->id == $chapter->id)
						{{ HTML::tag('span',$chapter->title,[
							'class' => 'list-group-item active'
						]) }}
					@else
						{{ HTML::tag('a',$chapter->title,[
							'href' => url("story/$story->id-$story->title_slug/chapter/$chapter->sort_id"),
							'class' => 'list-group-item'
						]) }}
					@endif
				@endforeach

				</div>
			</div>
		</div>
		<div class="col-md-7 story-body">
			<div class="panel">
				<div class="panel-heading">
					<div class="story-top" data-spy="affix" data-offset-top="75">
						<!-- $chap_nav_btn  -->
						@if(Auth::check())
							@if($story->author->user_id == Auth::id())

							<div id="writer-tools">
								<button
									class="btn btn-success"
									id="add-chapter-btn"
									data-toggle="modal"
									data-target="#addChapModal">
									<i class="fa fa-plus"></i>
									<span>Insert chapter</span>
								</button>			
								<button class="btn btn-info" id="edit-chapter-btn">
									<i class="fa fa-edit"></i>
									<span>Edit chapter</span>
								</button>			
								<button class="btn btn-danger" id="delete-chapter-btn">
									<i class="fa fa-trash"></i>
									<span>Delete chapter</span>
								</button>				
							</div>

							@else

							<span class="react-icons">
								<button class="btn btn-info">
									<i class="fa fa-bookmark-o"></i>
								</button>				
								<button class="btn btn-info">
									<i class="fa fa-heart-o"></i>
								</button>						
							</span>

							@endif
						@else	

							<a href="/login" class="btn btn-info" id="signin-btn">
								<i class="fa fa-user"></i>
								<span>Signin to like this chapter.</span>
							</a>			

						@endif
						<div class="clearfix"></div>				
					</div>
					<h3 class="text-center">
						<span class="chapter-title">
							{{ $curr_chapter->title or "No chapter here." }}
						</span>	
					</h3>	
				</div>
				<div class="panel-body">
					<div class="chapter-text">						
						{!!
							$chap_p or
							"

							<blockquote>
								It seems the story is still in your mind.
								Click the + button above to make it a reality!
								<small class='text-right'>
									<em>Anonymous</em>
								</small>
							</blockquote>

							"
						!!}						
					</div>
					<nav class="text-center" aria-label="Chapter navigation">
						@isset($text_pgn)
							{!! $text_pgn->links() !!}
						@endisset
						<!-- <ul class="pagination">
							<li>
								<a href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<li>
								<a href="#">1</a>
							</li>
							<li class="active">
								<span>2</span>
							</li>
							<li class="disabled">
								<span>3</span>
							</li>
							<li class="disabled">
								<span>
									<span aria-hidden="true">&raquo;</span>
								</span>
							</li>
						</ul> -->
					</nav>
				</div>
				@isset($chap_num)
				<div class="panel-footer story-nav">		
					<!--  $page_nav_btns -->
					@if($chap_num > 1)
					<div class='pull-left'>
						<a			
							href='/story/{{ $story->id }}-{{ $story->title_slug }}/chapter/{{ $chap_num-1 }}'				
							class='btn btn-info'>
								<span aria-hidden='true'>&larr;</span>
								<span class='hidden-xs'>
									Previous Chapter
								</span>
						</a>
					</div>
					@endif
					@if($chap_num < $chapters->max('sort_id'))
					<div class='pull-right'>
						<a
							href='/story/{{ $story->id }}-{{ $story->title_slug }}/chapter/{{ $chap_num+1 }}'
							class='btn btn-info '>
								<span class='hidden-xs'>
									Next Chapter
								</span>
								<span aria-hidden='true'>&rarr;</span>
						</a>
					</div>	
					@endif		
					<div class="clearfix"></div>
				</div>
				@endisset
			</div>
		</div>
		<div class="col-md-2 story-recom">
			<div class="panel text-center">
				<div class="panel-heading">
					<h4> Other Stories by {{ $story->author->pen_name }} </h4>
				</div>
				<div class="panel-body">	
					@foreach($author_stories as $author_story)
					<a href='{{ url("story/$author_story->id-$author_story->title_slug") }}'>
						<img class="img-responsive img-thumbnail"
							 src='{{ asset("storage/covers/$author_story->cover_filename") }}'
						 	 alt='{{ $author_story->title }}'>
					</a>								
					@endforeach
				</div>
				
			</div>
			<div class="panel text-center">
				<div class="panel-heading">
					<h4> Popular {{ ucfirst($story->genre->genre_name) }} Stories </h4>
				</div>
				<div class="panel-body">	
					@foreach($genre_stories as $genre_story)
					<a href='{{ url("story/$genre_story->id-$genre_story->title_slug") }}'>
						<img class="img-responsive img-thumbnail"
							 src='{{ asset("storage/covers/$genre_story->cover_filename") }}'
						 	 alt='{{ $genre_story->title }}'>
					</a>								
					@endforeach
<!-- 					<a href="#">
						<img class="img-responsive img-thumbnail"
							 src="assets/images/covers/bakit-di-ka-crush-ng-crush-mo.jpg"
						 	 alt="Card image">						
					</a>				

					<a href="#">
						<img class="img-responsive img-thumbnail"
							 src="assets/images/covers/ang-tundo-man-may-langit-din.jpg"
						 	 alt="Card image">						
					</a>

					<a href="#">
						<img class="img-responsive img-thumbnail"
							 src="assets/images/covers/rizal-without-the-overcoat.jpg"
						 	 alt="Card image">						
					</a>

					<a href="#">
						<img class="img-responsive img-thumbnail"
							 	 src="assets/images/covers/titser.jpg"
						 alt="Card image">						
					</a> -->
				</div>
				
			</div>
		</div>
	</div>
</main>
<div class="screen">
	
</div>

<div class="modal fade" id="addChapModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Add Chapter</h3>
			</div>
			<div class="modal-body">
				<form method="POST" action="save_chapter">
					<div class="form-group">
						<label for="chapter-title">Title of the chapter</label>
						<input type="text"
							name="chapter[title]"
							id="chapter-title"
							class="form-control"
							placeholder="example: Chapter 20: Gabi ng Lagim!">						
					</div>
					<div class="form-group">
						<label for="chapter-text">Chapter content</label>
						<textarea name="chapter[text]"
							id="chapter-text"
							class="form-control"
							placeholder="example: One day, isang araw..." 
							rows=10></textarea>
					</div>
					<button type="submit"
						name = "chapter[submit]"
						id = "chapter-submit"
						class="btn btn-info pull-right">
						Create new chapter</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection