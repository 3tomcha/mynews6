@extends('layouts.profile')
@section('title', 'プロフィール編集');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                @endif
                
                <form method="POST" action="{{action('Admin\ProfileController@update', $profile->id)}}" >
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name" value="{{ $profile->name }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="gender" value="{{ $profile->gender }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hobby" value="{{ $profile->hobby }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction">{{ $profile->introduction }}</textarea>
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="送信"/>
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