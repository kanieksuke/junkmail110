@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規投稿</div>

                <div class="card-body">
                    {{Form::open(['url' => '/store', 'files' => true, 'method' => 'post'])}}
                    @csrf
                        {{Form::hidden('userId', $user['id'])}}
                        <div class="form-group row">
                            {{Form::label('title', 'タイトル', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                            <div class="col-md-6">
                                {{Form::text('title', null, ['class' => 'form-control' , 'id' => 'title'])}}
                                <!-- @error('title') -->
                                    <!-- <span class="invalid-feedback" role="alert"> -->
                                        <!-- <strong>{{ $message }}</strong> -->
                                    <!-- </span> -->
                                <!-- @enderror -->
                            </div>
                        </div>

                        <div class="form-group row">
                            {{Form::label('content', '本文', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                            <div class="col-md-6">
                                {{Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content'])}}
                                <!-- @error('content') -->
                                    <!-- <span class="invalid-feedback" role="alert"> -->
                                        <!-- <strong>{{ $message }}</strong> -->
                                    <!-- </span> -->
                                <!-- @enderror -->
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <!-- <input id="image" type="file" class="form-control @error('file') is-invalid @enderror" name="image"> -->
                                {{Form::file('image', ['class' => 'custom-file-input', 'id' => 'image'])}}
                                {{Form::label('image', 'ファイル選択…', ['class' => 'custom-file-label'])}}
                                <!-- @error('image') -->
                                    <!-- <span class="invalid-feedback" role="alert"> -->
                                        <!-- <strong>{{ $image }}</strong> -->
                                    <!-- </span> -->
                                <!-- @enderror -->
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
