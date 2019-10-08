@extends('layouts.admin')

@section('content')
    <article class="col-md-10 mx-auto row headline pb-4">
        <div class="col-md-6">
            <div class="caption mx-auto">
            <img src="{{ asset('/storage/images/'.$headline->image_path) }}" class="img-fluid">
            <span>タイトルが入ります</span>
            </div>
        </div>
        <div class="col-md-6">
            {{ $headline->body}}
        </div>
    </article>
    <div class="posts">
        @each('components.article', $posts, 'post')
    </div>
@endsection
