@extends('layout.master')

@section('title',$article->title)

@section('content')
<div class="container">
	<div class="row">		
		<div class="col-md-12">
			<h3>{{ $article->title }}</h3>		
			<p>
				{{ $article->content }}
			</p>				
		</div>
	</div>
</div>
@endsection

