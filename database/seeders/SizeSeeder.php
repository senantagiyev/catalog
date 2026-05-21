<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        $clothing = [
            ['code' => 'XS', 'name' => ['az' => 'Çox kiçik', 'en' => 'Extra Small', 'ru' => 'Очень маленький']],
            ['code' => 'S', 'name' => ['az' => 'Kiçik', 'en' => 'Small', 'ru' => 'Маленький']],
            ['code' => 'M', 'name' => ['az' => 'Orta', 'en' => 'Medium', 'ru' => 'Средний']],
            ['code' => 'L', 'name' => ['az' => 'Böyük', 'en' => 'Large', 'ru' => 'Большой']],
            ['code' => 'XL', 'name' => ['az' => 'Çox böyük', 'en' => 'Extra Large', 'ru' => 'Очень большой']],
            ['code' => 'XXL', 'name' => ['az' => 'İki dəfə böyük', 'en' => 'Double Extra Large', 'ru' => 'Двойной очень большой']],
        ];

        $shoes = [];
        foreach (range(38, 45) as $n) {
            $shoes[] = [
                'code' => (string) $n,
                'name' => [
                    'az' => "Ayaqqabı ölçüsü $n",
                    'en' => "Shoe size $n",
                    'ru' => "Размер обуви $n",
                ],
            ];
        }

        DB::transaction(function () use ($clothing, $shoes) {
            $i = 0;
            foreach ($clothing as $s) {
                Size::create([
                    'name' => $s['name'],
                    'code' => $s['code'],
                    'sort_order' => ++$i,
                    'is_active' => true,
                ]);
            }
            foreach ($shoes as $s) {
                Size::create([
                    'name' => $s['name'],
                    'code' => $s['code'],
                    'sort_order' => ++$i,
                    'is_active' => true,
                ]);
            }
        });
    }
}
