@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規投稿</div>

                <div class="card-body">
                    {{Form::open(['url' => '/store', 'files' => true, 'method' => 'post', 'enctype' => 'multipart/form-data'])}}
                    @csrf
                        {{Form::hidden('userId', $user['id'])}}
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
                                <!-- <button type="submit" class="btn btn-primary"> -->
                                    {{ __('送信') }}
                                </button>
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
