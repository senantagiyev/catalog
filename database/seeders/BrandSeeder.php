<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $brands = [
                [
                    'name' => ['az' => 'Aurora', 'en' => 'Aurora', 'ru' => 'Aurora'],
                    'description' => [
                        'az' => 'Aurora — zərif xətlər və yumşaq parçalarla qadın eleqantlığını qeyd edir.',
                        'en' => 'Aurora celebrates feminine elegance with soft fabrics and refined lines.',
                        'ru' => 'Aurora воспевает женственную элегантность через мягкие ткани и утончённые линии.',
                    ],
                    'logo' => 'assets/img/brand/logo-1.png',
                    'website' => 'https://aurora.example.com',
                ],
                [
                    'name' => ['az' => 'Linea', 'en' => 'Linea', 'ru' => 'Linea'],
                    'description' => [
                        'az' => 'Linea italyan ənənələrini müasir kəsimlərlə birləşdirir.',
                        'en' => 'Linea combines Italian heritage with modern silhouettes.',
                        'ru' => 'Linea сочетает итальянские традиции с современными силуэтами.',
                    ],
                    'logo' => 'assets/img/brand/logo-2.png',
                    'website' => 'https://linea.example.com',
                ],
                [
                    'name' => ['az' => 'Verdant', 'en' => 'Verdant', 'ru' => 'Verdant'],
                    'description' => [
                        'az' => 'Verdant ekoloji parçalardan istifadə edən davamlı moda brendidir.',
                        'en' => 'Verdant is a sustainable fashion brand using eco-friendly fabrics.',
                        'ru' => 'Verdant — устойчивый бренд, использующий экологичные ткани.',
                    ],
                    'logo' => 'assets/img/brand/logo-3.png',
                    'website' => 'https://verdant.example.com',
                ],
                [
                    'name' => ['az' => 'Nordic', 'en' => 'Nordic', 'ru' => 'Nordic'],
                    'description' => [
                        'az' => 'Nordic — minimalist Skandinaviya estetikası ilə tanınır.',
                        'en' => 'Nordic is known for minimalist Scandinavian aesthetics.',
                        'ru' => 'Nordic известен минималистичной скандинавской эстетикой.',
                    ],
                    'logo' => 'assets/img/brand/logo-4.png',
                    'website' => 'https://nordic.example.com',
                ],
                [
                    'name' => ['az' => 'Bazaro', 'en' => 'Bazaro', 'ru' => 'Bazaro'],
                    'description' => [
                        'az' => 'Bazaro — rahat gündəlik geyimlərin lider brendi.',
                        'en' => 'Bazaro is a leading brand in comfortable everyday wear.',
                        'ru' => 'Bazaro — ведущий бренд удобной повседневной одежды.',
                    ],
                    'logo' => 'assets/img/brand/logo-5.png',
                    'website' => 'https://bazaro.example.com',
                ],
                [
                    'name' => ['az' => 'Ray-Ban', 'en' => 'Ray-Ban', 'ru' => 'Ray-Ban'],
                    'description' => [
                        'az' => 'Ray-Ban — dünyaca məşhur eynək brendi.',
                        'en' => 'Ray-Ban is a world-famous eyewear brand.',
                        'ru' => 'Ray-Ban — всемирно известный бренд очков.',
                    ],
                    'logo' => 'assets/img/brand/logo-6.png',
                    'website' => 'https://ray-ban.com',
                ],
                [
                    'name' => ['az' => 'Maris', 'en' => 'Maris', 'ru' => 'Maris'],
                    'description' => [
                        'az' => 'Maris dəniz mövzulu kolleksiyalar yaradır.',
                        'en' => 'Maris creates sea-inspired collections.',
                        'ru' => 'Maris создаёт коллекции, вдохновлённые морем.',
                    ],
                    'logo' => 'assets/img/brand/logo-7.png',
                    'website' => 'https://maris.example.com',
                ],
                [
                    'name' => ['az' => 'Atelier 14', 'en' => 'Atelier 14', 'ru' => 'Atelier 14'],
                    'description' => [
                        'az' => 'Atelier 14 əl işi premium aksesuarlar istehsal edir.',
                        'en' => 'Atelier 14 produces handcrafted premium accessories.',
                        'ru' => 'Atelier 14 производит премиальные аксессуары ручной работы.',
                    ],
                    'logo' => 'assets/img/brand/logo-8.png',
                    'website' => 'https://atelier14.example.com',
                ],
            ];

            foreach ($brands as $i => $data) {
                Brand::create(array_merge($data, [
                    'slug' => Str::slug($data['name']['en']),
                    'sort_order' => $i + 1,
                    'is_active' => true,
                    'is_featured' => $i < 4,
                ]));
            }
        });
    }
}
