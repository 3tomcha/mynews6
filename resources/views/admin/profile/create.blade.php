@extends('layouts.admin')
@section('title', 'プロフィールの新規作成');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成画面</h2>
            @include('components.error')
                <form method="POST" action="{{action('Admin\ProfileController@store')}}" >
                    @csrf
                    @include('components.form', ['japanese_name' => '氏名', 'english_name' => 'name'])
                    @include('components.form', ['japanese_name' => '性別', 'english_name' => 'gender'])
                    @include('components.form', ['japanese_name' => '趣味', 'english_name' => 'hobby'])
                    @include('components.form', ['japanese_name' => '自己紹介欄', 'english_name' => 'introduction'])
                    <input class="btn btn-primary" type="submit" value="送信"/>
                </form>
            </div>
        </div>
    </div>
@endsection