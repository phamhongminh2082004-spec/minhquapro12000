<header class="site-header">
    <div class="container header-row">
        <a href="{{ route('home') }}" class="brand">{{ config('app.name') }}</a>

        <nav aria-label="Chuyên mục chính" class="main-nav">
            <a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>Trang chủ</a>
            {{-- $navCategories: chia sẻ qua View::share() hoặc View Composer (xem README) --}}
            @foreach ($navCategories ?? [] as $cat)
                <a href="{{ route('categories.show', $cat) }}">{{ $cat->name }}</a>
            @endforeach
        </nav>

        <form action="{{ url('/tim-kiem') }}" method="get" class="search" role="search">
            <input type="search" name="q" placeholder="Tìm bài viết" aria-label="Tìm bài viết">
            <button type="submit">Tìm</button>
        </form>
    </div>
</header>
