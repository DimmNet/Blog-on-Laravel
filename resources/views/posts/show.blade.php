@extends ('layouts.main')

@section ('content')
    <div class="col-sm-8 blog-main">
        <h1 class="blog-post-title">
            {{ $post->title }}
        </h1>
        <p class="blog-post-meta">
            {{ $post->user->name }} on
            {{ $post->created_at->toFormattedDateString() }}
        </p>
        
        @if (count($post->tags))
            <ul>
                @foreach ($post->tags as $tag)
                    <li>
                        <a href="/posts/tag/{{ $tag->name }}">
                            {{ $tag->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        {{ $post->body }}
        
        <hr>
        
        <div class="comments">
            <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->user->name }} on
                        {{ $comment->created_at->diffForHumans() }} &nbsp;
                    </strong>
                    {{ $comment->body }}
                </li>
            @endforeach
            </ul>
        </div>
        
        @if (Auth::check())
            <hr>

            <div class="card">
                <div class="card-block">
                    <form method="POST" action="/posts/{{ $post->id }}/comments">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea class="form-control" name="body" placeholder="Your comment here."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add comment</button>
                        </div>

                        @include('layouts.errors')
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection