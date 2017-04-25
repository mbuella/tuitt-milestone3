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
					@can('update-chapter',$curr_chapter)
					<button class="list-group-item list-group-item-info"
							style="text-align: center !important;">
						<i class="fa fa-bars"></i>
						Order chapters						
					</button>
					@endcan
					@foreach($chapters as $chapter)
						@if($curr_chapter->id == $chapter->id)
							{{ HTML::tag('span',"$chapter->title 

							",[
								'class' => 'list-group-item active'
							]) }}
						@else
							{{ HTML::tag('a',$chapter->title,[
								'href' => $chapter->getUrl(),
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
							@can('update-chapter', $curr_chapter)

							<div id="writer-tools">
								<button
									class="btn btn-success"
									id="add-chapter-btn"
									data-toggle="modal"
									data-target="#chapModal">
									<i class="fa fa-plus"></i>
									<span>Insert<span class="hidden-xs"> chapter</span></span>
								</button>			
								<button
									class="btn btn-info"
									id="edit-chapter-btn"
									data-toggle="modal"
									data-target="#chapModal">
									<i class="fa fa-edit"></i>
									<span>Edit<span class="hidden-xs"> chapter</span></span>
								</button>			
								<button class="btn btn-danger" id="delete-chapter-btn">
									<i class="fa fa-trash"></i>
									<span>Delete<span class="hidden-xs"> chapter</span></span>
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

							@endcan
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
					</nav>
				</div>
				@isset($chap_num)
				<div class="panel-footer story-nav">		
					<!--  $page_nav_btns -->
					@if($curr_chapter->getPrevChapUrl())
					<div class='pull-left'>
						<a			
							href='{{ $curr_chapter->getPrevChapUrl() }}'			
							class='btn btn-info'>
								<span aria-hidden='true'>&larr;</span>
								<span class='hidden-xs'>
									Previous Chapter
								</span>
						</a>
					</div>
					@endif
					@if($curr_chapter->getNextChapUrl())
					<div class='pull-right'>
						<a
							href='{{ $curr_chapter->getNextChapUrl() }}'
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
				</div>
				
			</div>
		</div>
	</div>
</main>

@can('update-chapter', $curr_chapter)
<div class="screen">
	
</div>

<div class="modal fade" id="chapModal" role="dialog">
	<div class="modal-dialog modal-lg">		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="fa fa-times"></i>
				</button>
				<h3>Please wait while we load the form...</h3>
			</div>
			<div class="modal-body">
				<div class="loader">
					<div class="progress loader hidden-xs">
					  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					    <span class="sr-only">Loading</span>
					  </div>
					</div>						
					<div class="visible-xs text-center">
						<span class="fa fa-spinner fa-spin fa-5x"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endcan
@endsection