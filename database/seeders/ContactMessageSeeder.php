<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        $samples = [
            ['subject' => 'Sifariş haqqında sual', 'message' => 'Salam, sifarişimin statusu haqqında məlumat verə bilərsinizmi?'],
            ['subject' => 'Size question', 'message' => 'Hi, do you have the polo shirt in size XL? Thanks!'],
            ['subject' => 'Возврат товара', 'message' => 'Здравствуйте, как оформить возврат купленных кроссовок?'],
            ['subject' => 'Topdansatış', 'message' => 'Topdansatış əməkdaşlığı şərtlərini öyrənmək istərdim.'],
            ['subject' => 'Shipping to abroad', 'message' => 'Do you ship internationally to Georgia and Turkey?'],
            ['subject' => 'Подарочная карта', 'message' => 'Можно ли купить подарочную карту на сайте?'],
            ['subject' => 'Ölçü dəyişikliyi', 'message' => 'Sifarişimdə ölçünü dəyişdirmək mümkündürmü?'],
            ['subject' => 'Feedback', 'message' => 'Great experience with my last order — the quality exceeded expectations!'],
        ];

        DB::transaction(function () use ($samples) {
            foreach ($samples as $i => $s) {
                ContactMessage::create([
                    'name' => fake()->name(),
                    'email' => fake()->safeEmail(),
                    'phone' => fake()->numerify('+994 ## ### ## ##'),
                    'subject' => $s['subject'],
                    'message' => $s['message'],
                    'is_read' => $i % 3 !== 0,
                    'ip' => fake()->ipv4(),
                ]);
            }
        });
    }
}
