@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="/">
                <input type="text" placeholder="検索" name="search" value="@if (isset($search)) {{ $search }} @endif" style="width:80%">
                <button type="submit">検索</button>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card">
                @foreach($posts AS $post)
                    <div class="card-header">
                        {{ $post['title'] }}
                    </div>
                    <div class="card-body">
                            <div class="alert alert-success">
                                <img src="data:image/png;base64,{{ $post->image }}" alt="image" style="width:30%; height: auto;">
                                <!-- @if(file_exists(public_path().'/storage/image/'. $post->id .'.jpg')) -->
                                    <!-- <img src="/storage/image/{{ $post->id }}.jpg" width=300px/> -->
                                <!-- @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.jpeg')) -->
                                    <!-- <img src="/storage/image/{{ $post->id }}.jpeg" width=300px/> -->
                                <!-- @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.png')) -->
                                    <!-- <img src="/storage/image/{{ $post->id }}.png" width=300px/> -->
                                <!-- @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.gif')) -->
                                    <!-- <img src="/storage/image/{{ $post->id }}.gif" width=300px/> -->
                                <!-- @endif -->
                            </div>
                            <a href="/show/{{$post->id}}">詳細</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
