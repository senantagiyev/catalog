<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['az' => 'Yeni', 'en' => 'New', 'ru' => 'Новинка'],
            ['az' => 'Endirim', 'en' => 'Sale', 'ru' => 'Распродажа'],
            ['az' => 'Bestseller', 'en' => 'Bestseller', 'ru' => 'Хит продаж'],
            ['az' => 'Trend', 'en' => 'Trending', 'ru' => 'Тренд'],
            ['az' => 'Məhdud sayda', 'en' => 'Limited', 'ru' => 'Ограниченная серия'],
            ['az' => 'Premium', 'en' => 'Premium', 'ru' => 'Премиум'],
            ['az' => 'Seçilmiş', 'en' => 'Featured', 'ru' => 'Рекомендуемое'],
            ['az' => 'Ekoloji', 'en' => 'Eco-friendly', 'ru' => 'Эко-дружественный'],
            ['az' => 'Əl işi', 'en' => 'Handmade', 'ru' => 'Ручная работа'],
            ['az' => 'İmza modeli', 'en' => 'Signature', 'ru' => 'Фирменный'],
        ];

        DB::transaction(function () use ($tags) {
            foreach ($tags as $i => $t) {
                Tag::create([
                    'name' => $t,
                    'slug' => Str::slug($t['en']),
                    'is_active' => true,
                ]);
            }
        });
    }
}
