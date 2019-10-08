@extends('layouts.admin')

@section('title', 'ニュースの新規作成') 


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成</h2>
                <form method="POST" action="{{ action('Admin\NewsController@store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('components.error')
                    @include('components.form', ['japanese_name' => 'タイトル', 'english_name' => 'title'])
                    @include('components.form', ['japanese_name' => '本文', 'english_name' => 'body'])
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input class="form-control-image" type="file" name="image"/>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="更新"/>
                </form>
            </div>
        </div>
    </div>
@endsection