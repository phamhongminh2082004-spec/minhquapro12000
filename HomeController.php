<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $published = Post::with('category')->published()->latest('published_at');

        // 1 bài nổi bật lớn + 2 bài phụ bên cạnh
        $featured = (clone $published)->where('is_featured', true)->take(3)->get();
        $hero     = $featured->first();
        $subHeros = $featured->slice(1);

        // Danh sách mới nhất (bỏ các bài đã dùng ở khu nổi bật)
        $latest = (clone $published)
            ->whereNotIn('id', $featured->pluck('id'))
            ->paginate(8);

        // Sidebar
        $popular    = Post::published()->orderByDesc('views')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('name')->get();

        // Khối theo chuyên mục (mỗi chuyên mục 4 bài)
        $sections = Category::whereIn('slug', ['cong-nghe', 'doi-song'])
            ->with(['posts' => fn ($q) => $q->published()->latest('published_at')->take(4)])
            ->get();

        return view('home', compact(
            'hero', 'subHeros', 'latest', 'popular', 'categories', 'sections'
        ));
    }
}
