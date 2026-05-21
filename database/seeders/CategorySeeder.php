<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $roots = [
                [
                    'name' => ['az' => 'Geyim', 'en' => 'Clothing', 'ru' => 'Одежда'],
                    'description' => [
                        'az' => 'Hər mövsüm üçün rahat və zövqlü geyim kolleksiyası.',
                        'en' => 'Comfortable and stylish clothing collection for every season.',
                        'ru' => 'Удобная и стильная коллекция одежды на каждый сезон.',
                    ],
                    'image' => 'assets/img/menu/menu-1.jpg',
                    'icon' => 'ph ph-t-shirt',
                    'is_featured' => true,
                ],
                [
                    'name' => ['az' => 'Ayaqqabı', 'en' => 'Shoes', 'ru' => 'Обувь'],
                    'description' => [
                        'az' => 'Hər addımda rahatlıq vəd edən ayaqqabı modelləri.',
                        'en' => 'Footwear that promises comfort with every step.',
                        'ru' => 'Обувь, дарящая комфорт с каждым шагом.',
                    ],
                    'image' => 'assets/img/menu/menu-2.jpg',
                    'icon' => 'ph ph-sneaker',
                    'is_featured' => true,
                ],
                [
                    'name' => ['az' => 'Çantalar', 'en' => 'Bags', 'ru' => 'Сумки'],
                    'description' => [
                        'az' => 'Gündəlik və xüsusi anlar üçün dəri və parça çantalar.',
                        'en' => 'Leather and fabric bags for daily and special occasions.',
                        'ru' => 'Кожаные и тканевые сумки для будней и особых случаев.',
                    ],
                    'image' => 'assets/img/menu/menu-3.jpg',
                    'icon' => 'ph ph-handbag',
                    'is_featured' => true,
                ],
                [
                    'name' => ['az' => 'Aksesuarlar', 'en' => 'Accessories', 'ru' => 'Аксессуары'],
                    'description' => [
                        'az' => 'Stilinizə son toxunuş verən aksesuarlar.',
                        'en' => 'Accessories that add the final touch to your style.',
                        'ru' => 'Аксессуары, которые завершают ваш образ.',
                    ],
                    'image' => 'assets/img/menu/menu-4.jpg',
                    'icon' => 'ph ph-watch',
                    'is_featured' => false,
                ],
                [
                    'name' => ['az' => 'Eynəklər', 'en' => 'Sunglasses', 'ru' => 'Очки'],
                    'description' => [
                        'az' => 'UV qoruyucu və trend dizaynlı günəş eynəkləri.',
                        'en' => 'UV-protected sunglasses with trendy designs.',
                        'ru' => 'Солнцезащитные очки с UV-защитой и модным дизайном.',
                    ],
                    'image' => 'assets/img/menu/menu-5.jpg',
                    'icon' => 'ph ph-sun',
                    'is_featured' => true,
                ],
                [
                    'name' => ['az' => 'Çimərlik geyimi', 'en' => 'Swimwear', 'ru' => 'Пляжная одежда'],
                    'description' => [
                        'az' => 'Yay təətilləri üçün rahat və zövqlü çimərlik geyimləri.',
                        'en' => 'Comfortable and stylish swimwear for summer holidays.',
                        'ru' => 'Удобная и стильная пляжная одежда для летних каникул.',
                    ],
                    'image' => 'assets/img/menu/menu-6.jpg',
                    'icon' => 'ph ph-sun-horizon',
                    'is_featured' => false,
                ],
            ];

            $rootIds = [];
            foreach ($roots as $i => $data) {
                $cat = Category::create(array_merge($data, [
                    'parent_id' => null,
                    'slug' => Str::slug($data['name']['en']),
                    'sort_order' => $i + 1,
                    'is_active' => true,
                ]));
                $rootIds[$data['name']['en']] = $cat->id;
            }

            $children = [
                [
                    'parent' => 'Clothing',
                    'name' => ['az' => 'Köynəklər', 'en' => 'T-Shirts', 'ru' => 'Футболки'],
                    'description' => [
                        'az' => 'Pambıq və qarışıq parçalardan hazırlanmış köynəklər.',
                        'en' => 'T-shirts made from cotton and blended fabrics.',
                        'ru' => 'Футболки из хлопка и смешанных тканей.',
                    ],
                    'image' => 'assets/img/menu/menu-7.jpg',
                    'icon' => 'ph ph-t-shirt',
                ],
                [
                    'parent' => 'Clothing',
                    'name' => ['az' => 'Polo köynəklər', 'en' => 'Polo Shirts', 'ru' => 'Поло'],
                    'description' => [
                        'az' => 'Klassik kəsim polo köynəklər.',
                        'en' => 'Classic-cut polo shirts.',
                        'ru' => 'Поло классического кроя.',
                    ],
                    'image' => 'assets/img/menu/menu-8.jpg',
                    'icon' => 'ph ph-t-shirt',
                ],
                [
                    'parent' => 'Clothing',
                    'name' => ['az' => 'Gödəkçələr', 'en' => 'Jackets', 'ru' => 'Куртки'],
                    'description' => [
                        'az' => 'Soyuq mövsüm üçün isti gödəkçələr.',
                        'en' => 'Warm jackets for the cold season.',
                        'ru' => 'Тёплые куртки на холодный сезон.',
                    ],
                    'image' => 'assets/img/menu/menu-9.jpg',
                    'icon' => 'ph ph-coat-hanger',
                ],
                [
                    'parent' => 'Clothing',
                    'name' => ['az' => 'Donlar', 'en' => 'Dresses', 'ru' => 'Платья'],
                    'description' => [
                        'az' => 'Hər gün və xüsusi günlər üçün don modelləri.',
                        'en' => 'Dress models for every day and special occasions.',
                        'ru' => 'Платья на каждый день и для особых случаев.',
                    ],
                    'image' => 'assets/img/menu/menu-10.jpg',
                    'icon' => 'ph ph-dress',
                ],
                [
                    'parent' => 'Clothing',
                    'name' => ['az' => 'Üst geyim', 'en' => 'Tops', 'ru' => 'Топы'],
                    'description' => [
                        'az' => 'Trend dizaynlı qadın üst geyimləri.',
                        'en' => 'Trendy women\'s tops.',
                        'ru' => 'Модные женские топы.',
                    ],
                    'image' => 'assets/img/menu/product-1.jpg',
                    'icon' => 'ph ph-shirt-folded',
                ],
                [
                    'parent' => 'Shoes',
                    'name' => ['az' => 'Lofer ayaqqabılar', 'en' => 'Loafers', 'ru' => 'Лоферы'],
                    'description' => [
                        'az' => 'Klassik və müasir lofer modelləri.',
                        'en' => 'Classic and modern loafer styles.',
                        'ru' => 'Классические и современные лоферы.',
                    ],
                    'image' => 'assets/img/menu/product-2.jpg',
                    'icon' => 'ph ph-shoe',
                ],
            ];

            foreach ($children as $i => $data) {
                $parentName = $data['parent'];
                unset($data['parent']);
                Category::create(array_merge($data, [
                    'parent_id' => $rootIds[$parentName],
                    'slug' => Str::slug($data['name']['en']),
                    'sort_order' => $i + 1,
                    'is_active' => true,
                    'is_featured' => false,
                ]));
            }
        });
    }
}
