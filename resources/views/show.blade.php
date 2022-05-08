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
</div>
<div class="card-body line-height">
    <div class="row actions" id="comment-form-post-{{ $post->id }}">
        <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
            {{csrf_field()}}
            <input value="{{ $post->id }}" type="hidden" name="post_id" />
            <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
            <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
        </form>
    </div>
</div>
@endsection
