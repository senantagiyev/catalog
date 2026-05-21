<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@catalog.test')->first() ?? User::first();
        $cats = BlogCategory::all()->keyBy(fn ($c) => $c->getTranslation('name', 'en'));

        $posts = [
            [
                'cat' => 'Fashion',
                'title' => ['az' => 'Yay 2026: Əsas rənglər və materiallar', 'en' => 'Summer 2026: Key Colors and Materials', 'ru' => 'Лето 2026: главные цвета и материалы'],
                'image' => 'assets/img/menu/menu-1.jpg',
                'is_published' => true,
            ],
            [
                'cat' => 'Trends',
                'title' => ['az' => 'Old Money üslubu necə yaradılır', 'en' => 'How to Build an Old Money Look', 'ru' => 'Как создать стиль Old Money'],
                'image' => 'assets/img/menu/menu-2.jpg',
                'is_published' => true,
            ],
            [
                'cat' => 'Lifestyle',
                'title' => ['az' => 'Minimalist qarderob: 10 əsas parça', 'en' => 'Minimalist Wardrobe: 10 Essentials', 'ru' => 'Минималистичный гардероб: 10 базовых вещей'],
                'image' => 'assets/img/menu/menu-3.jpg',
                'is_published' => true,
            ],
            [
                'cat' => 'Tips',
                'title' => ['az' => 'Dəri çantaya necə qulluq etmək', 'en' => 'How to Care for a Leather Bag', 'ru' => 'Как ухаживать за кожаной сумкой'],
                'image' => 'assets/img/menu/menu-4.jpg',
                'is_published' => true,
            ],
            [
                'cat' => 'Fashion',
                'title' => ['az' => 'Polo köynəklər: Yenidən aktual', 'en' => 'Polo Shirts: Back in Style', 'ru' => 'Поло: снова в моде'],
                'image' => 'assets/img/menu/menu-5.jpg',
                'is_published' => true,
            ],
            [
                'cat' => 'Trends',
                'title' => ['az' => 'Pastel çalarları: Yumşaq palitra', 'en' => 'Pastel Hues: A Soft Palette', 'ru' => 'Пастельные оттенки: мягкая палитра'],
                'image' => 'assets/img/menu/menu-6.jpg',
                'is_published' => true,
            ],
            [
                'cat' => 'Tips',
                'title' => ['az' => 'Bədən tipinizə görə don seçimi', 'en' => 'Choosing a Dress for Your Body Type', 'ru' => 'Как выбрать платье по типу фигуры'],
                'image' => 'assets/img/menu/menu-7.jpg',
                'is_published' => false,
            ],
            [
                'cat' => 'Lifestyle',
                'title' => ['az' => 'Səyahət üçün stil bələdçisi', 'en' => 'A Style Guide for Travel', 'ru' => 'Гид по стилю для путешествий'],
                'image' => 'assets/img/menu/menu-8.jpg',
                'is_published' => false,
            ],
        ];

        DB::transaction(function () use ($posts, $admin, $cats) {
            foreach ($posts as $i => $p) {
                $cat = $cats[$p['cat']] ?? $cats->first();
                $title = $p['title'];

                $excerpt = [
                    'az' => "{$title['az']} — qısa baxış və əsas məqamlar bu məqalədə.",
                    'en' => "{$title['en']} — a quick overview and the key takeaways in this article.",
                    'ru' => "{$title['ru']} — краткий обзор и ключевые моменты в этой статье.",
                ];
                $content = [
                    'az' => "Bu məqalədə {$title['az']} mövzusuna dərindən baxırıq. Komandamız sezonun ən vacib detallarını seçərək sizin üçün hazırladı.\n\nƏsas məqamlar: parça keyfiyyəti, rəng kombinasiyaları və gündəlik geyimə uyğunlaşma. Hər biri praktiki misallarla izah olunur.\n\nSon olaraq, öz qarderobunuzu necə yeniləmək olar — sadə addımlarla göstəririk.",
                    'en' => "In this article we take a deep look at {$title['en']}. Our team curated the most important details of the season for you.\n\nKey points: fabric quality, color combinations and how to adapt looks to everyday wear. Each is explained with practical examples.\n\nFinally, we show simple steps to refresh your own wardrobe.",
                    'ru' => "В этой статье мы подробно рассматриваем тему «{$title['ru']}». Наша команда собрала для вас самые важные детали сезона.\n\nКлючевые моменты: качество тканей, сочетания цветов и адаптация под повседневный гардероб. Каждое объяснено на практических примерах.\n\nВ конце — простые шаги, как обновить ваш собственный гардероб.",
                ];

                BlogPost::create([
                    'blog_category_id' => $cat->id,
                    'user_id' => $admin?->id,
                    'title' => $title,
                    'slug' => Str::slug($title['en']) . '-' . ($i + 1),
                    'excerpt' => $excerpt,
                    'content' => $content,
                    'image' => $p['image'],
                    'meta_title' => $title,
                    'meta_description' => $excerpt,
                    'is_published' => $p['is_published'],
                    'published_at' => $p['is_published'] ? Carbon::now()->subDays($i + 1) : null,
                ]);
            }
        });
    }
}
