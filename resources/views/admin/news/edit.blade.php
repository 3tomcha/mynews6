@extends('layouts.admin')

@section('title', 'ニュースの更新') 


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュースの更新</h2>
                <form method="POST" action="{{ action('Admin\NewsController@update', $news->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @if($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $news->title }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body">{{ $news->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input class="form-control-image" type="file" name="image" value="{{ $news->image_path }}"/><br>
                            設定中: {{ $news->image_path }}
                            <input type="checkbox" name="delete">設定画像を削除
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="更新"/>
                </form>
                <div class="mt-5">
                    @if(count($histories) > 0)
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                        @foreach($histories as $history)
                            <li class="list-group-item">{{ $history->updated_at }}</li>
                        @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection