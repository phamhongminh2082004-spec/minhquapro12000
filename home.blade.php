@extends('layouts.app')

@section('title', config('app.name').' – Trang chủ')

@section('content')

    {{-- KHU 1: NỔI BẬT (1 bài lớn + 2 bài phụ) --}}
    @if ($hero)
        <section class="hero" aria-label="Bài nổi bật">
            <x-post-card :post="$hero" size="lg" class="hero-main" />
            <div class="hero-side">
                @foreach ($subHeros as $post)
                    <x-post-card :post="$post" size="md" />
                @endforeach
            </div>
        </section>
    @endif

    {{-- KHU 2: NỘI DUNG CHÍNH + SIDEBAR --}}
    <div class="layout">
        <section class="feed" aria-label="Mới nhất">
            <h2 class="section-title">Mới nhất</h2>

            @forelse ($latest as $post)
                <x-post-card :post="$post" size="row" />
            @empty
                <p>Chưa có bài viết nào. Hãy quay lại sau.</p>
            @endforelse

            {{ $latest->links() }}
        </section>

        <aside class="sidebar" aria-label="Thanh bên">
            @include('partials.sidebar')
        </aside>
    </div>

    {{-- KHU 3: THEO CHUYÊN MỤC --}}
    @foreach ($sections as $section)
        <section class="category-block">
            <div class="section-head">
                <h2 class="section-title">{{ $section->name }}</h2>
                <a href="{{ route('categories.show', $section) }}">Xem tất cả</a>
            </div>
            <div class="grid-4">
                @foreach ($section->posts as $post)
                    <x-post-card :post="$post" size="md" />
                @endforeach
            </div>
        </section>
    @endforeach

@endsection
