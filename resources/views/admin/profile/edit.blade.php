@extends('layouts.admin')
@section('title', 'プロフィール編集');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                @include('components.error')
                <form method="POST" action="{{action('Admin\ProfileController@update', $profile->id)}}" >
                    @method('PUT')
                    @csrf
                    @include('components.form_edit', ['japanese_name' => '氏名', 'english_name' => 'name', 'value' => $profile->name])
                    @include('components.form_edit', ['japanese_name' => '性別', 'english_name' => 'gender', 'value' => $profile->gender])
                    @include('components.form_edit', ['japanese_name' => '趣味', 'english_name' => 'hobby', 'value' => $profile->hobby])
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