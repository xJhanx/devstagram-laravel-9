<div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                    <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen del post {{ $post->titulo }}">
                </a>
                <h1>{{$post->titulo}}</h1>
            </div>
        @endforeach
    </div>
</div>
