<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'question' => [
                    'az' => 'Geri qaytarma prosesi necə işləyir?',
                    'en' => 'How does the return process work?',
                    'ru' => 'Как работает процесс возврата?',
                ],
                'answer' => [
                    'az' => 'Sifarişi aldıqdan sonra 14 gün ərzində istifadə olunmamış məhsulu geri qaytara bilərsiniz. Bizimlə əlaqə saxlayın və qaytarma prosesinə kömək edək.',
                    'en' => 'You can return an unused item within 14 days of delivery. Contact us and we will guide you through the return process.',
                    'ru' => 'Вы можете вернуть неиспользованный товар в течение 14 дней после получения. Свяжитесь с нами, и мы поможем с возвратом.',
                ],
            ],
            [
                'question' => [
                    'az' => 'Sifarişi yerləşdirdikdən sonra ləğv edə bilərəmmi?',
                    'en' => 'Can I cancel my order after placing it?',
                    'ru' => 'Могу ли я отменить заказ после оформления?',
                ],
                'answer' => [
                    'az' => 'Sifariş göndərilmədən əvvəl ləğv edilə bilər. Dəstək komandamıza müraciət edin.',
                    'en' => 'Orders can be cancelled before they are dispatched. Please reach out to our support team.',
                    'ru' => 'Заказ можно отменить до его отправки. Пожалуйста, свяжитесь с нашей службой поддержки.',
                ],
            ],
            [
                'question' => [
                    'az' => 'Sifarişimin statusunu necə yoxlaya bilərəm?',
                    'en' => 'How can I check the status of my order?',
                    'ru' => 'Как я могу проверить статус моего заказа?',
                ],
                'answer' => [
                    'az' => 'Sifariş statusunu e-poçtunuza göndərilən izləmə linki ilə yoxlaya bilərsiniz.',
                    'en' => 'You can track your order using the tracking link sent to your email.',
                    'ru' => 'Вы можете отслеживать заказ по ссылке, отправленной на ваш email.',
                ],
            ],
            [
                'question' => [
                    'az' => 'Hansı ödəniş üsulları qəbul olunur?',
                    'en' => 'Which payment methods are accepted?',
                    'ru' => 'Какие способы оплаты принимаются?',
                ],
                'answer' => [
                    'az' => 'Visa, MasterCard və bank köçürmələrini qəbul edirik.',
                    'en' => 'We accept Visa, MasterCard and bank transfers.',
                    'ru' => 'Мы принимаем Visa, MasterCard и банковские переводы.',
                ],
            ],
            [
                'question' => [
                    'az' => 'Çatdırılma nə qədər vaxt aparır?',
                    'en' => 'How long does delivery take?',
                    'ru' => 'Сколько времени занимает доставка?',
                ],
                'answer' => [
                    'az' => 'Çatdırılma adətən 2-5 iş günü çəkir.',
                    'en' => 'Delivery usually takes 2-5 business days.',
                    'ru' => 'Доставка обычно занимает 2-5 рабочих дней.',
                ],
            ],
        ];

        foreach ($items as $i => $item) {
            Faq::updateOrCreate(
                ['id' => $i + 1],
                ['question' => $item['question'], 'answer' => $item['answer'], 'sort_order' => $i, 'is_active' => true],
            );
        }
    }
}
