<?php

use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route tạm để link trên trang chủ không bị lỗi — thay bằng controller riêng khi làm tiếp.
Route::get('/bai-viet/{post:slug}', fn (Post $post) => $post->body ?: $post->title)->name('posts.show');
Route::get('/chuyen-muc/{category:slug}', fn (Category $category) => 'Chuyên mục: '.$category->name)->name('categories.show');
