@extends('layout.master')

@section('title',"Storyboard - $user_name | kwntu")

@section('content')
<!-- Dashboard to display when a user is logged in -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-md-6">
                        <img src="{{ $member->getAvatar() }}">                        
                    </div>
                    <div class="col-md-6 text-right">
                        <h1>Storyboard</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row bookmarked-stories">        
        <div class="col-md-12">
            <h2 class="text-center">My Bookmarked Stories</h2>
            <div class="panel">
                <div class="panel-body text-center">
                    <h4 class="text-center">You still don't have bookmarked stories yet. Start by looking for your favorite stories.</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row fav-stories">        
        <div class="col-md-12">
            <h2 class="text-center">My Favorite Stories</h2>
            <div class="panel">
                <div class="panel-body text-center">
                    <h4 class="text-center">You still don't have hearted stories yet. Start by looking for your favorite stories.</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-stories">        
        <div class="col-md-12">
            <h2 class="text-center">My Trending Stories</h2>
        </div>
        <div class="grid" data-columns> 
            @foreach($allStories->take(7) as $story)
                @include('stories.card')
            @endforeach
            @if($more_stories_count > 0)
            <div class="story">
                <a href='#'>
                    <img class="img-responsive img-thumbnail"
                         src='http://placehold.it/200x300?text={{$more_stories_count}}%2B'
                         alt="More stories">
                    <div class="panel hide">
                        <h4>
                            <strong> Load more stories. </strong>
                        </h4>
                    </div>
                </a>
            </div>  
            @endif
        </div>
    </div>
    <div class="row authors">        
        <div class="col-md-12">
            <h2 class="text-center">My Authors</h2>
            @foreach($authors as $author)
                <div class="col-md-3 author">
                    <a href="#">
                        <div class="panel">
                            <div class="panel-body text-center">
                                <img src="{{ $author->getAvatar() }}" class="img-responsive">                            
                            </div>
                            <div class="panel-footer text-center">
                                <div>{{ $author->pen_name }}</div>                                                
                            </div>
                        </div>                        
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @push('styles-footer')
        <link rel="stylesheet"
            type="text/css"
            href="{{ asset('assets/css/salvattore-cards.css') }}">
    @endpush()
    @push('scripts-footer')
        <script src="{{ asset('assets/js/lib/salvattore.js') }}"></script>
    @endpush
</div>
@endsection
