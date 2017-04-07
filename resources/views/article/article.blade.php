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
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-info"
				id="edit-article"
				data-toggle="modal"
				data-target="#editModal">
				Edit
			</button>
			<a href='{{ url("articles/$article->id/delete") }}' class="btn btn-danger pull-right">Delete</a>
		</div>
	</div>
</div>
<!-- Edit modal -->
<div class="modal fade" id="editModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit article</h4>
			</div>
			<div class="modal-body">	
				<form action='{{ url("articles/$article->id/update") }}' method="POST">
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
							   rows=5
							   class="form-control">{{ $article->content }}</textarea>
					</div>
					<button class="btn btn-default pull-left">Cancel</button>
					<input type="submit" class="btn btn-info pull-right" value="Save changes">
					<div class="clearfix"></div>
				</form>				
			</div>
		</div>

	</div>
</div>
@endsection

