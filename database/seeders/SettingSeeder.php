<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        // general
        Setting::set('site_name', ['az' => 'Catalog', 'en' => 'Catalog', 'ru' => 'Каталог'], 'general', 'string', true);
        Setting::set('logo', 'assets/img/logo/logo.png', 'general', 'string');
        Setting::set('logo_dark', 'assets/img/logo/14innocent-logo.svg', 'general', 'string');
        Setting::set('favicon', 'assets/img/logo/logo.png', 'general', 'string');
        Setting::set('primary_color', '#dc2626', 'general', 'string');

        // contact
        Setting::set('phone', '+994 12 345 67 89', 'contact', 'string');
        Setting::set('email', 'info@catalog.az', 'contact', 'string');
        Setting::set('address', [
            'az' => 'Bakı şəh., Nəsimi r., 28 May küç. 14',
            'en' => '14 28 May Str., Nasimi district, Baku',
            'ru' => 'г. Баку, Насиминский р-н, ул. 28 Мая, 14',
        ], 'contact', 'string', true);
        Setting::set('working_hours', [
            'az' => 'B.e-C., 09:00-18:00',
            'en' => 'Mon-Sat, 9AM-6PM',
            'ru' => 'Пн-Сб, 9:00-18:00',
        ], 'contact', 'string', true);

        // social
        Setting::set('facebook', 'https://facebook.com/catalog.az', 'social', 'string');
        Setting::set('instagram', 'https://instagram.com/catalog.az', 'social', 'string');
        Setting::set('twitter', 'https://twitter.com/catalog_az', 'social', 'string');
        Setting::set('tiktok', 'https://tiktok.com/@catalog.az', 'social', 'string');

        // seo
        Setting::set('meta_title', [
            'az' => 'Catalog — Onlayn moda mağazası',
            'en' => 'Catalog — Online fashion store',
            'ru' => 'Catalog — Интернет-магазин моды',
        ], 'seo', 'string', true);
        Setting::set('meta_description', [
            'az' => 'Geyim, ayaqqabı, çanta və aksesuarlar — keyfiyyət və zövqlü dizayn bir arada.',
            'en' => 'Clothing, shoes, bags and accessories — quality and refined design in one place.',
            'ru' => 'Одежда, обувь, сумки и аксессуары — качество и утончённый дизайн в одном месте.',
        ], 'seo', 'string', true);
    }
}
