<section class="widget">
    <h2 class="widget-title">Đọc nhiều</h2>
    <ol class="popular">
        @foreach ($popular as $post)
            <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
        @endforeach
    </ol>
</section>

<section class="widget">
    <h2 class="widget-title">Chuyên mục</h2>
    <ul class="cat-list">
        @foreach ($categories as $cat)
            <li>
                <a href="{{ route('categories.show', $cat) }}">{{ $cat->name }}</a>
                <span>{{ $cat->posts_count }}</span>
            </li>
        @endforeach
    </ul>
</section>

<section class="widget">
    <h2 class="widget-title">Nhận bài mới qua email</h2>
    <form action="{{ url('/dang-ky') }}" method="post" class="newsletter">
        @csrf
        <input type="email" name="email" placeholder="Email của bạn" required>
        <button type="submit">Đăng ký</button>
    </form>
</section>
