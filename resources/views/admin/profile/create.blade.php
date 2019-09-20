@extends('layouts.profile')
@section('title', 'プロフィールの新規作成');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成画面</h2>
                
                <form method="POST" action="{{action('Admin\ProfileController@create')}}" >
                    @csrf
                    <input type="text" name="name"/>
                    <input type="text" name="gender"/>
                    <input type="text" name="hobby"/>
                    <textarea name="introduction"></textarea>
                    <input type="submit" value="送信"/>
                </form>
            </div>
        </div>
    </div>
@endsection