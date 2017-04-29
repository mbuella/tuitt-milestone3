<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3 class="modal-title">{{ $modal_title }}</h3>
	</div>
	<div class="modal-body">
		<form method="POST" action="{{ $post_url }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="chapter-title">Chapter title</label>
				<input type="text"
					name="chapter[title]"
					id="chapter-title"
					class="form-control"
					placeholder="example: Chapter 20: Gabi ng Lagim!"
					value="{{ $chapter->title or '' }}">	
			</div>
			<div class="form-group">
				<label for="chapter-text">Chapter content</label>
				<textarea name="chapter[text]"
					id="chapter-text"
					class="form-control"
					placeholder="example: One day, isang araw..." 
					rows=15>{{ $chapter->text or '' }}</textarea>
			</div>
			<button type="submit"
				name = "chapter[submit]"
				id = "chapter-submit"
				class="btn btn-info pull-right">
				Save Chapter</button>
			<div class="clearfix"></div>
		</form>
	</div>
</div>