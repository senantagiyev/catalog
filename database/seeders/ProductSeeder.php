<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $imageSets = [
            ['assets/img/fashion-3/product/product-1/product-1.jpg', 'assets/img/fashion-3/product/product-1/product-hover.jpg', 'assets/img/fashion-3/product/product-1/product-2.jpg', 'assets/img/fashion-3/product/product-1/product-3.jpg'],
            ['assets/img/fashion-3/product/product-2/product-1.jpg', 'assets/img/fashion-3/product/product-2/product-hover.jpg', 'assets/img/fashion-3/product/product-2/product-2.jpg'],
            ['assets/img/fashion-3/product/product-3/product-1.jpg', 'assets/img/fashion-3/product/product-3/product-hover.jpg', 'assets/img/fashion-3/product/product-3/product-2.jpg'],
            ['assets/img/fashion-3/product/product-4/product-1.jpg', 'assets/img/fashion-3/product/product-4/product-hover.jpg', 'assets/img/fashion-3/product/product-4/product-2.jpg', 'assets/img/fashion-3/product/product-4/product-3.jpg'],
            ['assets/img/fashion-1/product/product-1/front-img-1.jpg', 'assets/img/fashion-1/product/product-1/back-img-1.jpg', 'assets/img/fashion-1/product/product-1/front-img-2.jpg', 'assets/img/fashion-1/product/product-1/front-img-3.jpg'],
            ['assets/img/fashion-1/product/product-2/front-img-1.jpg', 'assets/img/fashion-1/product/product-2/back-img-1.jpg', 'assets/img/fashion-1/product/product-2/front-img-2.jpg'],
            ['assets/img/fashion-1/product/product-3/front-img-1.jpg', 'assets/img/fashion-1/product/product-3/back-img-1.jpg', 'assets/img/fashion-1/product/product-3/front-img-2.jpg'],
            ['assets/img/fashion-1/product/product-4/front-img-1.jpg', 'assets/img/fashion-1/product/product-4/back-img-1.jpg', 'assets/img/fashion-1/product/product-4/front-img-2.jpg'],
            ['assets/img/bag-collection/bag-1.jpg', 'assets/img/bag-collection/bag-2.jpg', 'assets/img/bag-collection/bag-3.jpg', 'assets/img/bag-collection/bag-4.jpg'],
        ];

        $products = [
            // Tops / T-Shirts
            ['cat' => 'T-Shirts', 'name' => ['az' => 'Pambıq köynək — Klassik kəsim', 'en' => 'Cotton T-Shirt — Classic Cut', 'ru' => 'Хлопковая футболка — Классический крой'], 'price' => 24.90],
            ['cat' => 'T-Shirts', 'name' => ['az' => 'Qrafik köynək — Şəhər ritmi', 'en' => 'Graphic Tee — City Rhythm', 'ru' => 'Футболка с принтом — Городской ритм'], 'price' => 29.50, 'sale' => 22.90],
            ['cat' => 'Polo Shirts', 'name' => ['az' => 'Triko polo köynək', 'en' => 'Rib Knit Polo Shirt', 'ru' => 'Поло из трикотажа в рубчик'], 'price' => 39.00],
            ['cat' => 'Polo Shirts', 'name' => ['az' => 'Mərmər polo — Yay sezonu', 'en' => 'Marled Polo — Summer Edition', 'ru' => 'Меланжевое поло — Летний выпуск'], 'price' => 42.50, 'sale' => 34.90, 'badge' => '-18%'],
            ['cat' => 'Jackets', 'name' => ['az' => 'Bomber gödəkçə — Klassik', 'en' => 'Bomber Jacket — Classic', 'ru' => 'Куртка-бомбер — Классическая'], 'price' => 89.00],
            ['cat' => 'Jackets', 'name' => ['az' => 'Yağmurluq — Yüngül texniki', 'en' => 'Lightweight Technical Raincoat', 'ru' => 'Лёгкий технический плащ'], 'price' => 110.00, 'sale' => 89.90, 'badge' => 'Hot'],
            ['cat' => 'Dresses', 'name' => ['az' => 'Yay donu — Çiçəkli çap', 'en' => 'Summer Dress — Floral Print', 'ru' => 'Летнее платье — Цветочный принт'], 'price' => 54.00],
            ['cat' => 'Dresses', 'name' => ['az' => 'Midi don — Linen toxuma', 'en' => 'Midi Dress — Linen Weave', 'ru' => 'Платье-миди — Льняное плетение'], 'price' => 62.00, 'sale' => 49.90],
            ['cat' => 'Tops', 'name' => ['az' => 'Krop bluza — Yumşaq triko', 'en' => 'Crop Top — Soft Knit', 'ru' => 'Топ-кроп — Мягкий трикотаж'], 'price' => 19.90],
            ['cat' => 'Tops', 'name' => ['az' => 'Tank top — Pambıq qarışıqlı', 'en' => 'Tank Top — Cotton Blend', 'ru' => 'Майка — Хлопковая смесь'], 'price' => 17.50, 'badge' => 'New'],
            // Shoes
            ['cat' => 'Loafers', 'name' => ['az' => 'Old Money zamşa lofer', 'en' => 'Old Money Suede Loafers', 'ru' => 'Замшевые лоферы Old Money'], 'price' => 74.00],
            ['cat' => 'Loafers', 'name' => ['az' => 'Klassik dəri lofer', 'en' => 'Classic Leather Loafers', 'ru' => 'Классические кожаные лоферы'], 'price' => 79.00, 'sale' => 64.90, 'badge' => 'Sale'],
            ['cat' => 'Shoes', 'name' => ['az' => 'Katrina — Şıq idman ayaqqabısı', 'en' => 'Katrina — Chic Comfy Pair', 'ru' => 'Katrina — Стильная удобная пара'], 'price' => 59.00, 'sale' => 44.90, 'badge' => '-24%'],
            ['cat' => 'Shoes', 'name' => ['az' => 'Şəhər krossovkası', 'en' => 'Urban Sneakers', 'ru' => 'Городские кроссовки'], 'price' => 65.00],
            // Bags
            ['cat' => 'Bags', 'name' => ['az' => 'Dəri tote çanta', 'en' => 'Leather Tote Bag', 'ru' => 'Кожаная сумка-тоут'], 'price' => 89.00],
            ['cat' => 'Bags', 'name' => ['az' => 'Krossbodi çanta', 'en' => 'Crossbody Bag', 'ru' => 'Сумка через плечо'], 'price' => 49.90, 'sale' => 39.90],
            ['cat' => 'Bags', 'name' => ['az' => 'Bel çantası — Texniki parça', 'en' => 'Belt Bag — Technical Fabric', 'ru' => 'Поясная сумка — Техническая ткань'], 'price' => 27.90],
            // Sunglasses
            ['cat' => 'Sunglasses', 'name' => ['az' => 'Ray-Ban Round Fleck', 'en' => 'Ray-Ban Round Fleck', 'ru' => 'Ray-Ban Round Fleck'], 'price' => 99.00, 'brand' => 'Ray-Ban', 'badge' => 'Premium'],
            ['cat' => 'Sunglasses', 'name' => ['az' => 'Aviator günəş eynəyi', 'en' => 'Aviator Sunglasses', 'ru' => 'Очки-авиаторы'], 'price' => 49.00, 'brand' => 'Ray-Ban'],
            ['cat' => 'Sunglasses', 'name' => ['az' => 'Kvadrat günəş eynəyi — Mat qara', 'en' => 'Square Sunglasses — Matte Black', 'ru' => 'Квадратные очки — Матово-чёрные'], 'price' => 35.00],
            // Accessories
            ['cat' => 'Accessories', 'name' => ['az' => 'Dəri kəmər — İmza toqqası', 'en' => 'Leather Belt — Signature Buckle', 'ru' => 'Кожаный ремень — Фирменная пряжка'], 'price' => 32.00],
            ['cat' => 'Accessories', 'name' => ['az' => 'Yun şərf — Klassik damkalı', 'en' => 'Wool Scarf — Classic Check', 'ru' => 'Шерстяной шарф — Классическая клетка'], 'price' => 28.50],
            ['cat' => 'Accessories', 'name' => ['az' => 'Dəri saat qayışı', 'en' => 'Leather Watch Strap', 'ru' => 'Кожаный ремешок для часов'], 'price' => 22.00, 'badge' => 'New'],
            // Swimwear
            ['cat' => 'Swimwear', 'name' => ['az' => 'Çimərlik şortu — Tropik çap', 'en' => 'Swim Shorts — Tropical Print', 'ru' => 'Плавательные шорты — Тропический принт'], 'price' => 26.90],
            ['cat' => 'Swimwear', 'name' => ['az' => 'Bikini dəsti — Sadə krem', 'en' => 'Bikini Set — Plain Cream', 'ru' => 'Комплект бикини — Кремовый'], 'price' => 39.90, 'sale' => 29.90, 'badge' => '-25%'],
        ];

        $descTpl = function ($name) {
            return [
                'short' => [
                    'az' => "{$name['az']} — gündəlik istifadə üçün rahat və zövqlü seçim.",
                    'en' => "{$name['en']} — a comfortable and stylish choice for everyday wear.",
                    'ru' => "{$name['ru']} — удобный и стильный выбор для повседневной носки.",
                ],
                'long' => [
                    'az' => "{$name['az']} keyfiyyətli materiallardan, dolğun toxuma ilə hazırlanıb. Forma və rahatlıq arasında balansı qoruyaraq hər gün geyilə bilər.\n\nQulluq: 30°C-də əksinə çevirərək yuyun, ütüləməyin və qurutucudan istifadə etməyin. Düzgün qulluqla illər boyu davam edəcək.\n\nModel 1.78 m boyundadır və M ölçü geyinir.",
                    'en' => "{$name['en']} is crafted from quality materials with a dense weave. It strikes a balance between shape and comfort, ready to be worn every day.\n\nCare: machine wash at 30°C inside out, do not iron the print, do not tumble dry. With proper care it will last for years.\n\nThe model is 1.78 m tall and wears size M.",
                    'ru' => "{$name['ru']} изготовлен из качественных материалов с плотным плетением. Сохраняет баланс между формой и комфортом, готов к ежедневной носке.\n\nУход: машинная стирка при 30°C наизнанку, не гладить принт, не сушить в машине. При правильном уходе прослужит годами.\n\nРост модели 1,78 м, размер M.",
                ],
            ];
        };

        DB::transaction(function () use ($products, $imageSets, $descTpl) {
            $brandsByEn = Brand::all()->keyBy(fn ($b) => $b->getTranslation('name', 'en'));
            $brandIds = $brandsByEn->pluck('id')->values()->all();
            $categoriesByEn = Category::all()->keyBy(fn ($c) => $c->getTranslation('name', 'en'));
            $colorIds = Color::pluck('id')->all();
            $clothingSizeIds = Size::whereIn('code', ['XS', 'S', 'M', 'L', 'XL', 'XXL'])->pluck('id')->all();
            $shoeSizeIds = Size::whereIn('code', ['38', '39', '40', '41', '42', '43', '44', '45'])->pluck('id')->all();
            $tagIds = Tag::pluck('id')->all();

            $shoeCategories = ['Loafers', 'Shoes'];

            foreach ($products as $i => $p) {
                $idx = $i + 1;
                $sku = sprintf('BZR-%03d', $idx);
                $cat = $categoriesByEn[$p['cat']] ?? null;
                $brandId = isset($p['brand']) && $brandsByEn->has($p['brand'])
                    ? $brandsByEn[$p['brand']]->id
                    : $brandIds[array_rand($brandIds)];

                $descs = $descTpl($p['name']);
                $isNew = isset($p['badge']) && $p['badge'] === 'New' ? true : (bool) random_int(0, 1);
                $isFeatured = (bool) random_int(0, 1);
                $badge = $p['badge'] ?? null;
                $badgeColor = null;
                if ($badge) {
                    $badgeColor = match (true) {
                        str_starts_with($badge, '-') => '#dc2626',
                        $badge === 'New' => '#16a34a',
                        $badge === 'Hot' => '#ea580c',
                        $badge === 'Sale' => '#dc2626',
                        $badge === 'Premium' => '#7c3aed',
                        default => '#0ea5e9',
                    };
                }

                $product = Product::create([
                    'category_id' => $cat?->id,
                    'brand_id' => $brandId,
                    'name' => $p['name'],
                    'slug' => Str::slug($p['name']['en']) . '-' . $idx,
                    'short_description' => $descs['short'],
                    'description' => $descs['long'],
                    'sku' => $sku,
                    'price' => $p['price'],
                    'sale_price' => $p['sale'] ?? null,
                    'stock' => random_int(0, 100),
                    'badge_label' => $badge,
                    'badge_color' => $badgeColor,
                    'meta_title' => [
                        'az' => $p['name']['az'] . ' | Catalog',
                        'en' => $p['name']['en'] . ' | Catalog',
                        'ru' => $p['name']['ru'] . ' | Catalog',
                    ],
                    'meta_description' => $descs['short'],
                    'sort_order' => $idx,
                    'is_featured' => $isFeatured,
                    'is_new' => $isNew,
                    'is_active' => true,
                ]);

                // Colors (2-4)
                $colorCount = random_int(2, 4);
                $chosenColors = (array) array_rand(array_flip($colorIds), $colorCount);
                $product->colors()->sync($chosenColors);

                // Sizes
                $useShoes = in_array($p['cat'], $shoeCategories, true);
                if ($useShoes) {
                    $sizeCount = random_int(3, 6);
                    $sizePool = $shoeSizeIds;
                } elseif (in_array($p['cat'], ['Bags', 'Sunglasses', 'Accessories'], true)) {
                    $sizePool = [];
                    $sizeCount = 0;
                } else {
                    $sizeCount = random_int(3, 5);
                    $sizePool = $clothingSizeIds;
                }
                if ($sizeCount > 0) {
                    $chosenSizes = (array) array_rand(array_flip($sizePool), min($sizeCount, count($sizePool)));
                    $product->sizes()->sync($chosenSizes);
                }

                // Tags (1-3)
                $tagCount = random_int(1, 3);
                $chosenTags = (array) array_rand(array_flip($tagIds), $tagCount);
                $product->tags()->sync($chosenTags);

                // Images
                $imageSet = $imageSets[$i % count($imageSets)];
                foreach ($imageSet as $imgIdx => $path) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'color_id' => null,
                        'path' => $path,
                        'alt_text' => $p['name']['en'],
                        'is_primary' => $imgIdx === 0,
                        'is_hover' => $imgIdx === 1,
                        'sort_order' => $imgIdx + 1,
                    ]);
                }
            }
        });
    }
}
