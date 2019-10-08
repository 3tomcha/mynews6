@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール一覧</h2>
                @foreach($profiles as $profile)
                <div class="mt-5">
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name" value="{{ $profile->name }}" disabled="true"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="gender" value="{{ $profile->gender }}" disabled="true"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="hobby" value="{{ $profile->hobby }}" disabled="true"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" disabled="true">{{ $profile->introduction }}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection