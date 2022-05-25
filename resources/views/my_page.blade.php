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
                                <img src="{{ $post->image }}" alt="image" style="width:30%; height: auto;">
                            </div>
                            <a href="/show/{{$post->id}}" style="margin:20px;">詳細</a>
                            <a href="/edit/{{$post->id}}" style="margin:20px;">編集</a>
                            <form method="post" action="{{ route('delete', $post->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
