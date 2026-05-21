<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            SliderSeeder::class,
            PageSeeder::class,
            SettingSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            SubscriberSeeder::class,
            ContactMessageSeeder::class,
            TranslationSeeder::class,
        ]);
    }
}
