@extends('layouts/admin')
@section('title', '一覧')
@section('content')
<div class="row">
    <div class="col-md-8 mx-auto row mb-5">
        <div class="col-md-4">
            <h1>ニュース一覧</h1>
            <a href="/admin/news/create" class="btn btn-primary">新規作成</a>
        </div>
        <div class="col-md-8">
            <form method="GET" action="/admin/news/" class="row form-group">
                <div class="col-md-2">
                    <label>タイトル</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" value="{{$search}}"/>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary">検索</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8 mx-auto row">
        <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>本文</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td><a href="{{ action('Admin\NewsController@edit', ['id' => $post->id]) }}">編集</a></td>
                <td>
                    <form action="{{ action('Admin\NewsController@destroy', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</div>
@endsection
