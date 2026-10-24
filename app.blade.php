<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description', 'Tin tức và bài viết mới nhất')">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @stack('head')
</head>
<body>
    <a class="skip" href="#main">Bỏ qua đến nội dung</a>

    @include('partials.header')

    <main id="main" class="container">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
