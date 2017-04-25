<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">{{ $modal_title }}</h3>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{ $post_url }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="story-cover">Story cover</label>
                    {{ Form::file('story[cover_filename]',[
                        'id' => "story-cover"
                    ]) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="story-title">Story title</label>
                    <input type="text"
                        name="story[title]"
                        id="story-title"
                        class="form-control"
                        placeholder="example: Noli Me Tangere"
                        value="{{ $story->title or '' }}">    
                </div>
                <div class="form-group">
                    <label for="story-slug">Story slug</label>
                    <input type="text"
                        name="story[title_slug]"
                        id="story-slug"
                        class="form-control"
                        readonly
                        value="{{ $story->title_slug or '' }}">    
                </div>
                <div class="form-group">
                    <label for="story-genre">Story genre</label>
                    <select name='story[genre_id]'
                            id='story_genre'
                            class="form-control">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}"
                                @if($genre->id == $story->genre_id)
                                    selected
                                @endif
                            >
                                {{ ucwords($genre->genre_name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="story-text">Story intro</label>
                    <textarea name="story[intro]"
                        id="story-intro"
                        class="form-control"
                        placeholder="example: One day, isang araw..." 
                        rows=3>{{ $story->intro or '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="story-author">Select an author for the story</label>
                    <select name='story[author_id]'
                            id='story_author'
                            class="form-control">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"
                                @if($author->id == $story->author_id)
                                    selected
                                @endif
                            >
                                {{ ucwords($author->pen_name) }}
                            </option>
                        @endforeach
                    </select>
                </div>                        
            </div>
            <button type="button"
                name = "story[delete]"
                id = "story-delete"
                class="btn btn-danger pull-left">
                Delete Story</button>
            <button type="submit"
                name = "story[submit]"
                id = "story-submit"
                class="btn btn-info pull-right">
                Save Story</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>