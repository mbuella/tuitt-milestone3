@extends('layout.master')

@section('title','Articles')

@section('content')
<div class="container">
	<div class="row">		
		@foreach($articles as $idx => $article)		
			<div class="col-md-3">
				<h3>
					<a href='{{url("articles/$article->id")}}'>
						{{ $article->title }}
					</a>
				</h3>		
				<p>
					{{ $article->content }}...
				</p>				
			</div>
		@endforeach	
	</div>
</div>
@endsection

