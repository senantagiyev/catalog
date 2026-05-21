<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            [
                'name' => ['az' => 'Moda', 'en' => 'Fashion', 'ru' => 'Мода'],
                'description' => [
                    'az' => 'Moda dünyasından son xəbərlər və trendlər.',
                    'en' => 'Latest news and trends from the fashion world.',
                    'ru' => 'Последние новости и тренды из мира моды.',
                ],
            ],
            [
                'name' => ['az' => 'Həyat tərzi', 'en' => 'Lifestyle', 'ru' => 'Образ жизни'],
                'description' => [
                    'az' => 'Modern həyat tərzi haqqında məsləhətlər.',
                    'en' => 'Tips on modern lifestyle.',
                    'ru' => 'Советы о современном образе жизни.',
                ],
            ],
            [
                'name' => ['az' => 'Trendlər', 'en' => 'Trends', 'ru' => 'Тренды'],
                'description' => [
                    'az' => 'Sezonun ən vacib trendləri.',
                    'en' => 'The most important trends of the season.',
                    'ru' => 'Самые важные тренды сезона.',
                ],
            ],
            [
                'name' => ['az' => 'Məsləhətlər', 'en' => 'Tips', 'ru' => 'Советы'],
                'description' => [
                    'az' => 'Stil və qulluq üzrə faydalı məsləhətlər.',
                    'en' => 'Useful tips on style and care.',
                    'ru' => 'Полезные советы по стилю и уходу.',
                ],
            ],
        ];

        DB::transaction(function () use ($cats) {
            foreach ($cats as $i => $c) {
                BlogCategory::create([
                    'name' => $c['name'],
                    'description' => $c['description'],
                    'slug' => Str::slug($c['name']['en']),
                    'is_active' => true,
                    'sort_order' => $i + 1,
                ]);
            }
        });
    }
}
