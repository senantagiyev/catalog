<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        // Header navigation
        $header = [
            ['Home', '/', 'Ana səhifə', 'Главная'],
            ['Categories', '/categories', 'Kateqoriyalar', 'Категории'],
            ['Shop', '/products', 'Mağaza', 'Магазин'],
            ['Store', '/store', 'Store', 'Магазин'],
            ['Contact', '/contact', 'Əlaqə', 'Контакты'],
        ];
        foreach ($header as $i => [$en, $url, $az, $ru]) {
            MenuItem::firstOrCreate(
                ['location' => 'header', 'parent_id' => null, 'url' => $url],
                ['label' => ['en' => $en, 'az' => $az, 'ru' => $ru], 'sort_order' => $i, 'is_active' => true],
            );
        }

        // Footer — Shopping (with the parent + children example from the user)
        $shoppingParent = MenuItem::firstOrCreate(
            ['location' => 'footer_shopping', 'parent_id' => null, 'url' => null],
            ['label' => ['en' => 'Shopping', 'az' => 'Alış-veriş', 'ru' => 'Покупки'], 'sort_order' => 0, 'is_active' => true],
        );
        $shopping = [
            ['All Products', '/products', 'Bütün məhsullar', 'Все товары'],
            ['Shop by Brand', '/products', 'Brendə görə', 'По брендам'],
            ['Offers', '/categories', 'Endirimlər', 'Акции'],
            ['Track order', '/contact', 'Sifarişi izlə', 'Отследить заказ'],
            ['Size Guide', '/contact', 'Ölçü cədvəli', 'Таблица размеров'],
        ];
        foreach ($shopping as $i => [$en, $url, $az, $ru]) {
            MenuItem::firstOrCreate(
                ['location' => 'footer_shopping', 'parent_id' => $shoppingParent->id, 'url' => $url],
                ['label' => ['en' => $en, 'az' => $az, 'ru' => $ru], 'sort_order' => $i, 'is_active' => true],
            );
        }

        // Footer — Legal
        $legalParent = MenuItem::firstOrCreate(
            ['location' => 'footer_legal', 'parent_id' => null, 'url' => null],
            ['label' => ['en' => 'Legal', 'az' => 'Hüquqi', 'ru' => 'Правовая информация'], 'sort_order' => 0, 'is_active' => true],
        );
        $legal = [
            ['Terms & Conditions', '/page/terms-and-conditions', 'Şərtlər və qaydalar', 'Условия'],
            ['Privacy Policy', '/page/privacy-policy', 'Məxfilik siyasəti', 'Политика конфиденциальности'],
            ['Shipping & Returns', '/page/shipping-and-returns', 'Çatdırılma və qaytarma', 'Доставка и возврат'],
            ['FAQ', '/page/faq', 'FAQ', 'FAQ'],
        ];
        foreach ($legal as $i => [$en, $url, $az, $ru]) {
            MenuItem::firstOrCreate(
                ['location' => 'footer_legal', 'parent_id' => $legalParent->id, 'url' => $url],
                ['label' => ['en' => $en, 'az' => $az, 'ru' => $ru], 'sort_order' => $i, 'is_active' => true],
            );
        }

        // Footer — Customer services
        $servicesParent = MenuItem::firstOrCreate(
            ['location' => 'footer_services', 'parent_id' => null, 'url' => null],
            ['label' => ['en' => 'Customer Services', 'az' => 'Müştəri xidməti', 'ru' => 'Поддержка'], 'sort_order' => 0, 'is_active' => true],
        );
        $services = [
            ['About Us', '/page/about-us', 'Haqqımızda', 'О нас'],
            ['Contact', '/contact', 'Əlaqə', 'Контакты'],
            ['Showrooms', '/contact', 'Showroom', 'Шоурумы'],
        ];
        foreach ($services as $i => [$en, $url, $az, $ru]) {
            MenuItem::firstOrCreate(
                ['location' => 'footer_services', 'parent_id' => $servicesParent->id, 'url' => $url],
                ['label' => ['en' => $en, 'az' => $az, 'ru' => $ru], 'sort_order' => $i, 'is_active' => true],
            );
        }

        MenuItem::clearCache();
    }
}
