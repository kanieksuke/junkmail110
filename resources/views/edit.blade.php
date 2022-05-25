@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">投稿内容編集</div>

                <div class="card-body">
                    {{Form::open(['url' => '/update/{id}', 'files' => true, 'method' => 'post', 'enctype' => 'multipart/form-data'])}}
                    {{Form::hidden('userId', $user['id'])}}
                    @csrf
                        <div class="form-group row">
                            {{Form::label('title', 'タイトル', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                            <div class="col-md-6">
                                {{Form::text('title', null, ['class' => 'form-control' , 'id' => 'title'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{Form::label('content', '本文', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                            <div class="col-md-6">
                                {{Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                {{Form::file('image')}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                    {{ __('送信') }}
                                {{Form::submit('送信', ['class' => 'btn btn-primary btn-block'])}}
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
