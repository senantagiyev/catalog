<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'about-us',
                'image' => 'assets/img/about/about-thumb-1.jpg',
                'title' => ['az' => 'Haqqımızda', 'en' => 'About Us', 'ru' => 'О нас'],
                'content' => [
                    'az' => "Catalog 2018-ci ildən etibarən Azərbaycanda müasir, keyfiyyətli və əlçatan moda təqdim edir. Komandamız beynəlxalq trendləri yerli zövqlə birləşdirir.\n\nMağazalarımızda yalnız sınaqdan keçmiş və davamlı materiallardan istifadə olunur. Hər mövsüm yeni kolleksiyalar buraxırıq və müştəri rəylərinə əsasən modellərimizi inkişaf etdiririk.\n\nBizim missiyamız hər kəs üçün stil və rahatlığı bir araya gətirməkdir.",
                    'en' => "Since 2018, Catalog has been delivering modern, high-quality and accessible fashion in Azerbaijan. Our team blends international trends with local taste.\n\nOnly tested and durable materials make it into our stores. We release new collections every season and evolve our models based on customer feedback.\n\nOur mission is to combine style and comfort for everyone.",
                    'ru' => "С 2018 года Catalog предлагает в Азербайджане современную, качественную и доступную моду. Наша команда объединяет международные тренды с местными вкусами.\n\nВ наши магазины попадают только проверенные и долговечные материалы. Мы выпускаем новые коллекции каждый сезон и развиваем модели на основе отзывов покупателей.\n\nНаша миссия — объединить стиль и комфорт для всех.",
                ],
            ],
            [
                'slug' => 'privacy-policy',
                'image' => 'assets/img/about/about-thumb-2.jpg',
                'title' => ['az' => 'Məxfilik siyasəti', 'en' => 'Privacy Policy', 'ru' => 'Политика конфиденциальности'],
                'content' => [
                    'az' => "Catalog şəxsi məlumatlarınızı qoruyur. Yığdığımız məlumatlar yalnız sifarişlərin emalı, müştəri dəstəyi və marketinq məqsədləri (sizin razılığınızla) üçün istifadə olunur.\n\nBütün ödənişlər şifrələnmiş kanallarla aparılır. Məlumatlarınız üçüncü şəxslərlə paylaşılmır.\n\nİstənilən vaxt məlumatlarınızı silmək və ya dəyişmək üçün bizimlə əlaqə saxlaya bilərsiniz.",
                    'en' => "Catalog protects your personal data. The information we collect is used only for order processing, customer support and marketing (with your consent).\n\nAll payments are processed over encrypted channels. Your data is never shared with third parties.\n\nYou can request to update or delete your data at any time by contacting us.",
                    'ru' => "Catalog защищает ваши персональные данные. Собранные сведения используются только для обработки заказов, поддержки клиентов и маркетинга (с вашего согласия).\n\nВсе платежи проходят по зашифрованным каналам. Мы не передаём данные третьим лицам.\n\nВы можете запросить обновление или удаление своих данных в любой момент, связавшись с нами.",
                ],
            ],
            [
                'slug' => 'terms-and-conditions',
                'image' => 'assets/img/about/about-thumb-3.jpg',
                'title' => ['az' => 'Qaydalar və şərtlər', 'en' => 'Terms & Conditions', 'ru' => 'Условия использования'],
                'content' => [
                    'az' => "Saytdan istifadə edərək siz aşağıdakı şərtləri qəbul edirsiniz. Bütün məhsul qiymətləri ABŞ dollarındadır və ƏDV daxildir.\n\nSifarişlər ödəniş təsdiqləndikdən sonra emal edilir. Stokda olmayan məhsullar üçün geri qaytarma 3 iş günü ərzində aparılır.\n\nCatalog hər hansı sifarişdən imtina etmək hüququnu özündə saxlayır.",
                    'en' => "By using the site you accept the following terms. All product prices are in USD and include VAT.\n\nOrders are processed once payment is confirmed. Refunds for out-of-stock items are issued within 3 business days.\n\nCatalog reserves the right to refuse any order.",
                    'ru' => "Используя сайт, вы принимаете следующие условия. Все цены указаны в долларах США и включают НДС.\n\nЗаказы обрабатываются после подтверждения оплаты. Возврат за товары, отсутствующие на складе, оформляется в течение 3 рабочих дней.\n\nCatalog оставляет за собой право отказать в любом заказе.",
                ],
            ],
            [
                'slug' => 'shipping-and-returns',
                'image' => 'assets/img/about/about-thumb-4.jpg',
                'title' => ['az' => 'Çatdırılma və qaytarma', 'en' => 'Shipping & Returns', 'ru' => 'Доставка и возврат'],
                'content' => [
                    'az' => "Bakı daxilində sifarişlər 1-2 iş günündə, regionlara isə 2-4 iş günündə çatdırılır. 50 AZN-dən yuxarı sifarişlər üçün çatdırılma pulsuzdur.\n\nMəhsulu aldığınız tarixdən 14 gün ərzində geri qaytara bilərsiniz. Etiketlər saxlanılmalı və məhsul istifadə edilməməlidir.\n\nQaytarma üçün bizimlə əlaqə saxlayın və biz kuryer xidmətini təşkil edək.",
                    'en' => "Orders within Baku arrive in 1-2 business days, and 2-4 business days for the regions. Shipping is free for orders above 50 AZN.\n\nYou may return a product within 14 days of receipt. Tags must be intact and the item unused.\n\nContact us to start a return and we will arrange the courier.",
                    'ru' => "Заказы по Баку доставляются за 1-2 рабочих дня, по регионам — за 2-4 рабочих дня. Доставка бесплатна при заказе от 50 AZN.\n\nВы можете вернуть товар в течение 14 дней с момента получения. Бирки должны быть сохранены, товар — не использован.\n\nСвяжитесь с нами, чтобы оформить возврат, и мы организуем курьера.",
                ],
            ],
            [
                'slug' => 'faq',
                'image' => 'assets/img/about/about-thumb-5.jpg',
                'title' => ['az' => 'Tez-tez verilən suallar', 'en' => 'FAQ', 'ru' => 'Часто задаваемые вопросы'],
                'content' => [
                    'az' => "Sifarişimi necə izləyə bilərəm? — Sifariş təsdiqləndikdən sonra e-poçt vasitəsilə izləmə linki alacaqsınız.\n\nÖlçü dəyişdirilə bilərmi? — Bəli, məhsul göndərilməyibsə dəstək komandasına yazaraq ölçü dəyişikliyi tələb edə bilərsiniz.\n\nHansı ödəniş üsulları qəbul olunur? — Kart, bank köçürməsi və çatdırılma zamanı nağd ödəniş qəbul edirik.",
                    'en' => "How do I track my order? — Once your order is confirmed you'll receive a tracking link by email.\n\nCan I change the size? — Yes, if the order has not yet been shipped, write to our support team to request a size change.\n\nWhich payment methods do you accept? — Card, bank transfer and cash on delivery.",
                    'ru' => "Как отследить заказ? — После подтверждения заказа вы получите ссылку для отслеживания по электронной почте.\n\nМожно ли изменить размер? — Да, если заказ ещё не отправлен, напишите в службу поддержки для замены размера.\n\nКакие способы оплаты вы принимаете? — Карта, банковский перевод и оплата наличными при получении.",
                ],
            ],
        ];

        DB::transaction(function () use ($pages) {
            foreach ($pages as $p) {
                Page::create([
                    'slug' => $p['slug'],
                    'image' => $p['image'],
                    'title' => $p['title'],
                    'content' => $p['content'],
                    'meta_title' => $p['title'],
                    'meta_description' => [
                        'az' => mb_substr(strip_tags($p['content']['az']), 0, 160),
                        'en' => mb_substr(strip_tags($p['content']['en']), 0, 160),
                        'ru' => mb_substr(strip_tags($p['content']['ru']), 0, 160),
                    ],
                    'is_active' => true,
                ]);
            }
        });
    }
}
