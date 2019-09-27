@extends('layouts.profile')
@section('title', 'プロフィールの新規作成');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成画面</h2>
                @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                @endif
                
                <form method="POST" action="{{action('Admin\ProfileController@store')}}" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="gender" value="{{ old('gender') }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hobby" value="{{ old('hobby') }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="送信"/>
                </form>
            </div>
        </div>
    </div>
@endsection