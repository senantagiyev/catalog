<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'title' => ['az' => 'Yay Kolleksiyası 2026', 'en' => 'Summer Collection 2026', 'ru' => 'Летняя коллекция 2026'],
                'subtitle' => [
                    'az' => 'Yüngül parçalar, parlaq rənglər — yay üçün hazır olun.',
                    'en' => 'Light fabrics, bright colors — get ready for summer.',
                    'ru' => 'Лёгкие ткани, яркие цвета — встречаем лето.',
                ],
                'button_text' => ['az' => 'İndi al', 'en' => 'Shop now', 'ru' => 'Купить сейчас'],
                'image' => 'assets/img/menu/shop',
                'link' => '/category/clothing',
                'position' => 'hero',
            ],
            [
                'title' => ['az' => 'Yeni gələnlər', 'en' => 'New Arrivals', 'ru' => 'Новые поступления'],
                'subtitle' => [
                    'az' => 'Stilinizi yeniləyin — həftəlik yeni modellər.',
                    'en' => 'Refresh your style — new drops every week.',
                    'ru' => 'Обновите свой стиль — новинки каждую неделю.',
                ],
                'button_text' => ['az' => 'Kəşf edin', 'en' => 'Discover', 'ru' => 'Открыть'],
                'image' => 'assets/img/menu/menu-1.jpg',
                'link' => '/new',
                'position' => 'hero',
            ],
            [
                'title' => ['az' => 'Premium aksesuarlar', 'en' => 'Premium Accessories', 'ru' => 'Премиум-аксессуары'],
                'subtitle' => [
                    'az' => 'Hər detalda mükəmməllik — əl işi aksesuarlar.',
                    'en' => 'Perfection in every detail — handcrafted accessories.',
                    'ru' => 'Совершенство в каждой детали — аксессуары ручной работы.',
                ],
                'button_text' => ['az' => 'Bax', 'en' => 'View', 'ru' => 'Смотреть'],
                'image' => 'assets/img/menu/menu-4.jpg',
                'link' => '/category/accessories',
                'position' => 'hero',
            ],
            [
                'title' => ['az' => 'Çantalar', 'en' => 'Bags', 'ru' => 'Сумки'],
                'subtitle' => [
                    'az' => 'Hər səfərə uyğun dəri çantalar.',
                    'en' => 'Leather bags for every journey.',
                    'ru' => 'Кожаные сумки для любого путешествия.',
                ],
                'button_text' => ['az' => 'Bax', 'en' => 'Shop', 'ru' => 'В магазин'],
                'image' => 'assets/img/bag-collection/bag-1.jpg',
                'link' => '/category/bags',
                'position' => 'category_top',
            ],
            [
                'title' => ['az' => 'Ayaqqabı kolleksiyası', 'en' => 'Shoe Collection', 'ru' => 'Коллекция обуви'],
                'subtitle' => [
                    'az' => 'Hər addımda rahatlıq.',
                    'en' => 'Comfort with every step.',
                    'ru' => 'Комфорт с каждым шагом.',
                ],
                'button_text' => ['az' => 'İndi al', 'en' => 'Shop now', 'ru' => 'Купить'],
                'image' => 'assets/img/menu/product-2.jpg',
                'link' => '/category/shoes',
                'position' => 'category_top',
            ],
            [
                'title' => ['az' => 'Endirim həftəsi — 30%-ə qədər', 'en' => 'Sale Week — Up to 30% Off', 'ru' => 'Неделя скидок — до 30%'],
                'subtitle' => [
                    'az' => 'Seçilmiş modellərdə xüsusi qiymətlər.',
                    'en' => 'Special prices on selected styles.',
                    'ru' => 'Специальные цены на избранные модели.',
                ],
                'button_text' => ['az' => 'Endirimlər', 'en' => 'Sale', 'ru' => 'Скидки'],
                'image' => 'assets/img/menu/menu-9.jpg',
                'link' => '/sale',
                'position' => 'middle',
            ],
        ];

        DB::transaction(function () use ($sliders) {
            foreach ($sliders as $i => $s) {
                Slider::create(array_merge($s, [
                    'mobile_image' => $s['image'],
                    'sort_order' => $i + 1,
                    'is_active' => true,
                ]));
            }
        });
    }
}
