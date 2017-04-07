@extends('layout.master')

@section('title','New Article')

@section('content')
<div class="container">
	<form method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title: </label>
			<input type="text"
				   name="title" 
				   id="title" 
				   class="form-control">
		</div>
		<div class="form-group">
			<label for="content">Content: </label>
			<textarea name="content" 
				   id="content" 
				   class="form-control"></textarea>
		</div>
		<input type="submit" class="btn btn-info">
	</form>
</div>
@endsection

