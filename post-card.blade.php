@props(['post', 'size' => 'md'])

<article {{ $attributes->class(['card', "card--$size"]) }}>
    @if ($post->thumbnail)
        <a href="{{ route('posts.show', $post) }}" class="card-thumb">
            <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" loading="lazy">
        </a>
    @endif

    <div class="card-body">
        <a class="tag" href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
        <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>

        @if ($size !== 'sm')
            <p class="excerpt">{{ Str::limit($post->excerpt, $size === 'lg' ? 180 : 110) }}</p>
        @endif

        <time datetime="{{ $post->published_at->toIso8601String() }}">
            {{ $post->published_at->diffForHumans() }}
        </time>
    </div>
</article>
