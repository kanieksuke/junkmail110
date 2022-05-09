@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $post['title'] }} by {{ $post->user->name }}
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        @if(file_exists(public_path().'/storage/image/'. $post->id .'.jpg'))
                            <img src="/storage/image/{{ $post->id }}.jpg" width=300px/>
                        @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.jpeg'))
                            <img src="/storage/image/{{ $post->id }}.jpeg" width=300px/>
                        @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.png'))
                            <img src="/storage/image/{{ $post->id }}.png" width=300px/>
                        @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.gif'))
                            <img src="/storage/image/{{ $post->id }}.gif" width=300px/>
                        @endif
                    </div>
                    {{ $post['content']}}
                </div>
            </div>
        </div>
    </div>
    <div class="card-body line-height">
        <div class="row actions" id="comment-form-post-{{ $post->id }}">
            <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                {{csrf_field()}}
                <input value="{{ $post->id }}" type="hidden" name="post_id" />
                <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                <input class="form-control message-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="message" />
            </form>
        </div>
    </div>
    @foreach ($post->comments as $comment)
    <div class="mb-2">
        <span>
            {{ $comment->user->name }}:
        </span>
        <span>{{ $comment->message }}</span>
        <!-- @if ($comment->user->id == Auth::id()) -->
        <!-- <a class="delete-comment" data-remote="true" rel="nofollow" data-method="delete" href="/comments/{{ $comment->id }}"> -->
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"> -->
                <!-- <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> -->
                <!-- </svg> -->
            <!-- </a> -->
        <!-- @endif -->
    </div>
    @endforeach
</div>
@endsection
