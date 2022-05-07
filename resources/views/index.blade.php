@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($posts AS $post)
                    <div class="card-header">
                        {{ $post['title'] }}
                    </div>
                    <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                <img src="{{ asset('storage/image/' . $post->image) }}" />
                            </div>
                        <!-- You are logged in! -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
