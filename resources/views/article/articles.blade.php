@extends('layout.master')

@section('title','Articles')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-6">
			<h1>Articles</h1>			
		</div>
		<div class="col-md-6 col-xs-6">
			<a href="{{url("articles/new")}}" class="btn btn-info pull-right">New article</a>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="row">		
		@foreach($articles as $idx => $article)		
			<div class="col-md-3 col-sm-4">
				<h3>
					<a href='{{url("articles/$article->id")}}'>
						{{ $article->title }}
					</a>
				</h3>		
				<p>
					{{ $article->content }}...
				</p>				
			</div>
			@if(($loop->index + 1)%4 == 0)
				<div class="clearfix visible-lg visible-md"></div>
			@elseif(($loop->index + 1)%3 == 0)
				<div class="clearfix visible-sm"></div>
			@endif
		@endforeach	
	</div>
</div>
@endsection

