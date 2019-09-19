@extends('layouts.admin')

@section('title', 'ニュースの新規作成') 


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成</h2>
                <form method="POST" action="/admin/news/create" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title"/>
                    <input type="text" name="body"/>
                    <input type="file" name="image"/>
                    <input type="submit" value="送信"/>
                </form>
            </div>
        </div>
    </div>
@endsection