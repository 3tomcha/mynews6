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
    @foreach($posts as $post)
    <article class="col-md-8 mx-auto row">
        <div class="col-md-6">
            @datetime($post->updated_at)
            <h2>{{ $post->title }}</h2>
            {{ $post->body }}
        </div>
        <div class="col-md-6">
            <img src="{{ asset('/storage/images/'.$post->image_path) }}" class="img-fluid">
        </div>
        </article>
    @endforeach
    </div>
@endsection
