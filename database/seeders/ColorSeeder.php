<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            ['name' => ['az' => 'Narıncı', 'en' => 'Orange', 'ru' => 'Оранжевый'], 'hex' => '#FD8B4E'],
            ['name' => ['az' => 'Səma mavisi', 'en' => 'Sky Blue', 'ru' => 'Небесно-голубой'], 'hex' => '#B0C0D8'],
            ['name' => ['az' => 'Zeytun', 'en' => 'Olive', 'ru' => 'Оливковый'], 'hex' => '#8F9673'],
            ['name' => ['az' => 'Martini', 'en' => 'Martini', 'ru' => 'Мартини'], 'hex' => '#B7A696'],
            ['name' => ['az' => 'Tüfəng yaşılı', 'en' => 'Rifle Green', 'ru' => 'Тёмно-зелёный'], 'hex' => '#494532'],
            ['name' => ['az' => 'Buğda', 'en' => 'Wheat', 'ru' => 'Пшеничный'], 'hex' => '#F2E9DA'],
            ['name' => ['az' => 'Krem', 'en' => 'Cream', 'ru' => 'Кремовый'], 'hex' => '#F2E7C1'],
            ['name' => ['az' => 'Bej', 'en' => 'Beige', 'ru' => 'Бежевый'], 'hex' => '#A99283'],
            ['name' => ['az' => 'Eko mavi', 'en' => 'Echo Blue', 'ru' => 'Эхо-синий'], 'hex' => '#B19169'],
            ['name' => ['az' => 'Yay boz rəngi', 'en' => 'Summer Gray', 'ru' => 'Летний серый'], 'hex' => '#B1A8A4'],
        ];

        DB::transaction(function () use ($colors) {
            foreach ($colors as $i => $c) {
                Color::create([
                    'name' => $c['name'],
                    'slug' => Str::slug($c['name']['en']),
                    'hex_code' => $c['hex'],
                    'sort_order' => $i + 1,
                    'is_active' => true,
                ]);
            }
        });
    }
}
