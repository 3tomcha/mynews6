@extends('layouts.profile')
@section('title', 'プロフィールの新規作成');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成画面</h2>
                
                <form method="POST" action="{{action('Admin\ProfileController@create')}}" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="gender"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hobby"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction"></textarea>
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="送信"/>
                </form>
            </div>
        </div>
    </div>
@endsection