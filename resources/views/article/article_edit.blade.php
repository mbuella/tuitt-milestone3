@extends('layout.master')

@section('title','$article->title (Edit)')

@section('content')
<div class="container">
	<form method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title: </label>
			<input type="text"
				   name="title" 
				   id="title" 
				   class="form-control"
				   value="{{ $article->title }}">
		</div>
		<div class="form-group">
			<label for="content">Content: </label>
			<textarea name="content" 
				   id="content" 
				   class="form-control">{{ $article->content }}</textarea>
		</div>
		<input type="submit" class="btn btn-info" value="Save changes">
	</form>
</div>
@endsection

