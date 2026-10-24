<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $names = ['Công nghệ', 'Đời sống', 'Kinh doanh', 'Thể thao', 'Du lịch'];

        $categories = collect($names)->map(fn ($n) => Category::create([
            'name' => $n,
            'slug' => Str::slug($n),   // cong-nghe, doi-song, ...
        ]));

        $samples = [
            'Ra mắt mẫu điện thoại gập mới với pin dùng hai ngày',
            'Cách sắp xếp góc làm việc nhỏ cho người ở trọ',
            'Giá xăng điều chỉnh: người dùng cần lưu ý gì',
            'Đội tuyển giành chiến thắng ở phút bù giờ',
            'Năm điểm đến yên tĩnh cho kỳ nghỉ cuối tuần',
            'Trí tuệ nhân tạo đang thay đổi cách viết phần mềm',
            'Công thức nấu ăn nhanh cho bữa tối ngày bận',
            'Startup nội địa gọi vốn vòng mới',
        ];

        // 4 bài mỗi chuyên mục (20 bài), bài đầu tiên của 3 chuyên mục đầu là nổi bật
        foreach ($categories as $ci => $category) {
            for ($i = 0; $i < 4; $i++) {
                $title = $samples[($ci * 4 + $i) % count($samples)] . ' #' . ($ci * 4 + $i + 1);

                Post::create([
                    'category_id'  => $category->id,
                    'title'        => $title,
                    'slug'         => Str::slug($title),
                    'excerpt'      => 'Tóm tắt ngắn cho bài viết: ' . $title . '. Nội dung mẫu để kiểm tra giao diện.',
                    'body'         => '<p>Nội dung đầy đủ của bài viết mẫu.</p>',
                    'thumbnail'    => null,
                    'views'        => random_int(50, 5000),
                    'is_featured'  => $i === 0 && $ci < 3,
                    'published_at' => now()->subHours(random_int(1, 200)),
                ]);
            }
        }
    }
}
