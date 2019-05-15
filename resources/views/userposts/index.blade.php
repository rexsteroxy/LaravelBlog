@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <hr>
        <h3 class="headingTag"><b>My Blog Posts </b></h3>
        <hr>
    </div>
    @if(Session::has('post_created'))
        <div class="alert alert-dismissible alert-success fade show">
          {{ session('post_created')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    @if(count($posts) > 0)
    <div class="blog-card-row">
        @foreach ($posts as $post)
        <a class="blog-redirection-to-single" href="{{ route('blogposts.show',$post->slug) }}">
            <div class="blog-card">
                <img class="card-img-top" src="{{ $post->photo_id ? $post->photo->file : '/images/placeholder_blog.png' }}" alt="Photo unavailable">
                <div class="card-body">
                    <div class="card-text card-text-font">{{ str_limit($post->title,70) }}</div>
                </div><hr class="blog-hr">
                <div class="card-date">{{ $post->created_at ? $post->created_at->toFormattedDateString() : 'Date Unavailable' }}</div>
                <div class="card-author">By {{ $post->user_id ? $post->user->name : 'Anonymous' }}</div>
            </div>
        </a>
        @endforeach
    </div>
        @else
        <div class="NoDataMessage">
            <h2><b>No Posts to Show!!</b></h2>
        </div>
        @endif
</div>
@endsection
@section('footer-scripts')
@endsection