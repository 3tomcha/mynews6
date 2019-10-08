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