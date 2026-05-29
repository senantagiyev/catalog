<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Navigation
            ['nav.home', 'navigation', ['az' => 'Ana səhifə', 'en' => 'Home', 'ru' => 'Главная']],
            ['nav.categories', 'navigation', ['az' => 'Kateqoriyalar', 'en' => 'Categories', 'ru' => 'Категории']],
            ['nav.shop', 'navigation', ['az' => 'Mağaza', 'en' => 'Shop', 'ru' => 'Магазин']],
            ['nav.products', 'navigation', ['az' => 'Məhsullar', 'en' => 'Products', 'ru' => 'Товары']],
            ['nav.product', 'navigation', ['az' => 'Məhsul', 'en' => 'Product', 'ru' => 'Товар']],
            ['nav.store', 'navigation', ['az' => 'Mağaza', 'en' => 'Store', 'ru' => 'Магазин']],
            ['nav.contact', 'navigation', ['az' => 'Əlaqə', 'en' => 'Contact', 'ru' => 'Контакты']],
            ['nav.about', 'navigation', ['az' => 'Haqqımızda', 'en' => 'About', 'ru' => 'О нас']],

            // Common
            ['common.search', 'common', ['az' => 'Axtar', 'en' => 'Search', 'ru' => 'Поиск']],
            ['common.search_placeholder', 'common', ['az' => 'Nə axtarırsınız?', 'en' => 'What are you looking for?', 'ru' => 'Что вы ищете?']],
            ['common.cart', 'common', ['az' => 'Səbət', 'en' => 'Cart', 'ru' => 'Корзина']],
            ['common.wishlist', 'common', ['az' => 'İstək siyahısı', 'en' => 'Wishlist', 'ru' => 'Избранное']],
            ['common.account', 'common', ['az' => 'Hesabım', 'en' => 'My Account', 'ru' => 'Личный кабинет']],
            ['common.login', 'common', ['az' => 'Daxil ol', 'en' => 'Login', 'ru' => 'Войти']],
            ['common.register', 'common', ['az' => 'Qeydiyyat', 'en' => 'Register', 'ru' => 'Регистрация']],
            ['common.read_more', 'common', ['az' => 'Ətraflı', 'en' => 'Read More', 'ru' => 'Подробнее']],
            ['common.shop_now', 'common', ['az' => 'İndi al', 'en' => 'Shop Now', 'ru' => 'Купить сейчас']],
            ['common.add_to_cart', 'common', ['az' => 'Səbətə əlavə et', 'en' => 'Add to Cart', 'ru' => 'В корзину']],
            ['common.quick_view', 'common', ['az' => 'Sürətli baxış', 'en' => 'Quick View', 'ru' => 'Быстрый просмотр']],
            ['common.subscribe', 'common', ['az' => 'Abunə ol', 'en' => 'Subscribe', 'ru' => 'Подписаться']],
            ['common.send', 'common', ['az' => 'Göndər', 'en' => 'Send', 'ru' => 'Отправить']],
            ['common.new', 'common', ['az' => 'Yeni', 'en' => 'New', 'ru' => 'Новый']],
            ['common.sale', 'common', ['az' => 'Endirim', 'en' => 'Sale', 'ru' => 'Скидка']],
            ['common.hot', 'common', ['az' => 'Hot', 'en' => 'Hot', 'ru' => 'Хит']],
            ['common.featured', 'common', ['az' => 'Seçilmiş', 'en' => 'Featured', 'ru' => 'Избранное']],
            ['common.loading', 'common', ['az' => 'Yüklənir...', 'en' => 'Loading...', 'ru' => 'Загрузка...']],

            // Home
            ['home.hero_title', 'home', ['az' => 'Yeni Kolleksiya 2026', 'en' => 'New Collection 2026', 'ru' => 'Новая коллекция 2026']],
            ['home.hero_subtitle', 'home', ['az' => 'Mövsümün ən yaxşı seçimləri', 'en' => 'The best picks of the season', 'ru' => 'Лучшие сезонные подборки']],
            ['home.featured_products', 'home', ['az' => 'Seçilmiş məhsullar', 'en' => 'Featured Products', 'ru' => 'Избранные товары']],
            ['home.new_arrivals', 'home', ['az' => 'Yeni gələnlər', 'en' => 'New Arrivals', 'ru' => 'Новинки']],
            ['home.shop_by_category', 'home', ['az' => 'Kateqoriya üzrə alış-veriş', 'en' => 'Shop by Category', 'ru' => 'Покупки по категориям']],
            ['home.popular_brands', 'home', ['az' => 'Məşhur brendlər', 'en' => 'Popular Brands', 'ru' => 'Популярные бренды']],

            // Product
            ['product.price', 'product', ['az' => 'Qiymət', 'en' => 'Price', 'ru' => 'Цена']],
            ['product.quantity', 'product', ['az' => 'Say', 'en' => 'Quantity', 'ru' => 'Количество']],
            ['product.size', 'product', ['az' => 'Ölçü', 'en' => 'Size', 'ru' => 'Размер']],
            ['product.color', 'product', ['az' => 'Rəng', 'en' => 'Color', 'ru' => 'Цвет']],
            ['product.sku', 'product', ['az' => 'SKU', 'en' => 'SKU', 'ru' => 'Артикул']],
            ['product.brand', 'product', ['az' => 'Brend', 'en' => 'Brand', 'ru' => 'Бренд']],
            ['product.category', 'product', ['az' => 'Kateqoriya', 'en' => 'Category', 'ru' => 'Категория']],
            ['product.in_stock', 'product', ['az' => 'Stokda var', 'en' => 'In Stock', 'ru' => 'В наличии']],
            ['product.out_of_stock', 'product', ['az' => 'Stokda yoxdur', 'en' => 'Out of Stock', 'ru' => 'Нет в наличии']],
            ['product.description', 'product', ['az' => 'Təsvir', 'en' => 'Description', 'ru' => 'Описание']],
            ['product.related', 'product', ['az' => 'Oxşar məhsullar', 'en' => 'Related Products', 'ru' => 'Похожие товары']],

            // Filters
            ['filter.sort_by', 'filter', ['az' => 'Sırala', 'en' => 'Sort By', 'ru' => 'Сортировать']],
            ['filter.latest', 'filter', ['az' => 'Ən yeni', 'en' => 'Latest', 'ru' => 'Новые']],
            ['filter.price_asc', 'filter', ['az' => 'Qiymət: ucuzdan bahalıya', 'en' => 'Price: Low to High', 'ru' => 'Цена: по возрастанию']],
            ['filter.price_desc', 'filter', ['az' => 'Qiymət: bahadan ucuza', 'en' => 'Price: High to Low', 'ru' => 'Цена: по убыванию']],
            ['filter.filter_by', 'filter', ['az' => 'Filtr', 'en' => 'Filter By', 'ru' => 'Фильтр']],
            ['filter.all_categories', 'filter', ['az' => 'Bütün kateqoriyalar', 'en' => 'All Categories', 'ru' => 'Все категории']],
            ['filter.results_count', 'filter', ['az' => 'nəticə tapıldı', 'en' => 'results found', 'ru' => 'результатов найдено']],

            // Contact
            ['contact.title', 'contact', ['az' => 'Bizimlə əlaqə', 'en' => 'Contact Us', 'ru' => 'Свяжитесь с нами']],
            ['contact.subtitle', 'contact', ['az' => 'Sualınız var? Bizə yazın', 'en' => 'Have a question? Write to us', 'ru' => 'Есть вопрос? Напишите нам']],
            ['contact.name', 'contact', ['az' => 'Ad Soyad', 'en' => 'Full Name', 'ru' => 'Ф.И.О.']],
            ['contact.email', 'contact', ['az' => 'E-poçt', 'en' => 'Email', 'ru' => 'Email']],
            ['contact.phone', 'contact', ['az' => 'Telefon', 'en' => 'Phone', 'ru' => 'Телефон']],
            ['contact.subject', 'contact', ['az' => 'Mövzu', 'en' => 'Subject', 'ru' => 'Тема']],
            ['contact.message', 'contact', ['az' => 'Mesaj', 'en' => 'Message', 'ru' => 'Сообщение']],
            ['contact.success', 'contact', ['az' => 'Mesajınız uğurla göndərildi.', 'en' => 'Your message has been sent successfully.', 'ru' => 'Ваше сообщение успешно отправлено.']],
            ['contact.address', 'contact', ['az' => 'Ünvan', 'en' => 'Address', 'ru' => 'Адрес']],
            ['contact.working_hours', 'contact', ['az' => 'İş saatları', 'en' => 'Working Hours', 'ru' => 'Часы работы']],

            // Footer
            ['footer.newsletter', 'footer', ['az' => 'Yeniliklər', 'en' => 'Newsletter', 'ru' => 'Рассылка']],
            ['footer.newsletter_text', 'footer', ['az' => 'Abunə olun və ekskluziv 10% endirim qazanın.', 'en' => 'Subscribe & enjoy an exclusive 10% off.', 'ru' => 'Подпишитесь и получите эксклюзивную скидку 10%.']],
            ['footer.email_placeholder', 'footer', ['az' => 'E-poçtunuzu daxil edin', 'en' => 'Enter Your Email', 'ru' => 'Введите ваш email']],
            ['footer.follow_us', 'footer', ['az' => 'Bizi izləyin', 'en' => 'Follow Us', 'ru' => 'Подписывайтесь на нас']],
            ['footer.shopping', 'footer', ['az' => 'Alış-veriş', 'en' => 'Shopping', 'ru' => 'Покупки']],
            ['footer.customer_service', 'footer', ['az' => 'Müştəri xidməti', 'en' => 'Customer Service', 'ru' => 'Служба поддержки']],
            ['footer.legal', 'footer', ['az' => 'Hüquqi', 'en' => 'Legal', 'ru' => 'Правовая информация']],
            ['footer.copyright', 'footer', ['az' => '© 2026 Bütün hüquqlar qorunur.', 'en' => '© 2026 All Rights Reserved.', 'ru' => '© 2026 Все права защищены.']],

            // Pagination
            ['pagination.previous', 'pagination', ['az' => 'Əvvəlki', 'en' => 'Previous', 'ru' => 'Назад']],
            ['pagination.next', 'pagination', ['az' => 'Növbəti', 'en' => 'Next', 'ru' => 'Вперёд']],

            // Empty states
            ['empty.cart', 'empty', ['az' => 'Səbətiniz boşdur', 'en' => 'Your cart is empty', 'ru' => 'Ваша корзина пуста']],
            ['empty.products', 'empty', ['az' => 'Məhsul tapılmadı', 'en' => 'No products found', 'ru' => 'Товары не найдены']],
            ['empty.wishlist', 'empty', ['az' => 'İstək siyahınız boşdur', 'en' => 'Your wishlist is empty', 'ru' => 'Ваш список избранного пуст']],

            // Error page
            ['error.title', 'error', ['az' => 'Səhifə tapılmadı', 'en' => 'Page Not Found', 'ru' => 'Страница не найдена']],
            ['error.subtitle', 'error', ['az' => 'Axtardığınız səhifə mövcud deyil.', 'en' => 'The page you are looking for does not exist.', 'ru' => 'Запрашиваемая страница не существует.']],
            ['error.back_home', 'error', ['az' => 'Ana səhifəyə qayıt', 'en' => 'Back to Home', 'ru' => 'На главную']],
            ['error.oops', 'error', ['az' => 'Oops!', 'en' => 'Oops!', 'ru' => 'Упс!']],

            // Search
            ['search.placeholder', 'search', ['az' => 'Nə axtarırsınız?', 'en' => 'What are you looking for?', 'ru' => 'Что вы ищете?']],

            // Common — additions
            ['common.of', 'common', ['az' => '/', 'en' => 'of', 'ru' => 'из']],
            ['common.products', 'common', ['az' => 'məhsul', 'en' => 'products', 'ru' => 'товаров']],
            ['common.load_more', 'common', ['az' => 'Daha çox göstər', 'en' => 'Load more', 'ru' => 'Загрузить ещё']],
            ['common.showing', 'common', ['az' => 'Göstərilir', 'en' => 'Showing', 'ru' => 'Показано']],
            ['common.categories', 'common', ['az' => 'Kateqoriyalar', 'en' => 'Categories', 'ru' => 'Категории']],

            // Pagination — additions
            ['pagination.showing', 'pagination', ['az' => 'Göstərilir', 'en' => 'Showing', 'ru' => 'Показано']],

            // Home — additions
            ['home.shop_collection', 'home', ['az' => 'Kolleksiyaya bax', 'en' => 'Shop Collection', 'ru' => 'К коллекции']],
            ['home.view_all', 'home', ['az' => 'Hamısına bax', 'en' => 'View All', 'ru' => 'Все']],
            ['home.featured_subtitle', 'home', ['az' => 'Mövsümün ən yaxşıları', 'en' => 'Best of the season', 'ru' => 'Лучшее сезона']],
            ['home.new_arrivals_subtitle', 'home', ['az' => 'Yeni endi', 'en' => 'Just landed', 'ru' => 'Только что']],
            ['home.shop_by_category_subtitle', 'home', ['az' => 'Yeniliyi kəşf et', 'en' => 'Discover the new', 'ru' => 'Откройте новое']],

            // Footer — additions
            ['footer.shop_by_category', 'footer', ['az' => 'Kateqoriya üzrə', 'en' => 'Shop by Category', 'ru' => 'По категориям']],

            // Products listing
            ['products.title', 'products', ['az' => 'Bütün məhsullar', 'en' => 'All Products', 'ru' => 'Все товары']],
            ['products.subtitle', 'products', ['az' => 'Sizin üçün seçilmişlər', 'en' => 'Curated for you', 'ru' => 'Подобрано для вас']],
            ['products.all', 'products', ['az' => 'Hamısı', 'en' => 'All', 'ru' => 'Все']],
            ['products.all_categories', 'products', ['az' => 'Bütün kateqoriyalar', 'en' => 'All Categories', 'ru' => 'Все категории']],
            ['products.brands', 'products', ['az' => 'Brendlər', 'en' => 'Brands', 'ru' => 'Бренды']],
            ['products.price', 'products', ['az' => 'Qiymət', 'en' => 'Price', 'ru' => 'Цена']],
            ['products.min', 'products', ['az' => 'Min', 'en' => 'Min', 'ru' => 'Мин']],
            ['products.max', 'products', ['az' => 'Max', 'en' => 'Max', 'ru' => 'Макс']],
            ['products.filter', 'products', ['az' => 'Filtrlə', 'en' => 'Filter', 'ru' => 'Фильтр']],
            ['products.showing', 'products', ['az' => 'Göstərilir', 'en' => 'Showing', 'ru' => 'Показано']],
            ['products.sort_by', 'products', ['az' => 'Sırala', 'en' => 'Sort by', 'ru' => 'Сортировка']],
            ['products.sort_latest', 'products', ['az' => 'Ən yenilər', 'en' => 'Latest', 'ru' => 'Новые']],
            ['products.sort_price_asc', 'products', ['az' => 'Qiymət: aşağıdan', 'en' => 'Price: low to high', 'ru' => 'Цена: возрастание']],
            ['products.sort_price_desc', 'products', ['az' => 'Qiymət: yuxarıdan', 'en' => 'Price: high to low', 'ru' => 'Цена: убывание']],
            ['products.sort_name', 'products', ['az' => 'Ad', 'en' => 'Name', 'ru' => 'Имя']],
            ['products.no_results', 'products', ['az' => 'Heç bir məhsul tapılmadı.', 'en' => 'No products found.', 'ru' => 'Товары не найдены.']],

            // Store page
            ['store.title', 'store', ['az' => 'Mağaza', 'en' => 'Store', 'ru' => 'Магазин']],
            ['store.shop_by_category', 'store', ['az' => 'Kateqoriya üzrə', 'en' => 'Shop by Category', 'ru' => 'По категориям']],
            ['store.featured_products', 'store', ['az' => 'Seçilmiş məhsullar', 'en' => 'Featured Products', 'ru' => 'Избранные товары']],

            // Product detail
            ['product.add_to_cart', 'product', ['az' => 'Səbətə əlavə et', 'en' => 'Add to Cart', 'ru' => 'В корзину']],
            ['product.related_products', 'product', ['az' => 'Oxşar məhsullar', 'en' => 'Related Products', 'ru' => 'Похожие товары']],
            ['product.tags', 'product', ['az' => 'Etiketlər', 'en' => 'Tags', 'ru' => 'Теги']],

            // Categories page
            ['categories.title', 'categories', ['az' => 'Kateqoriyalar', 'en' => 'Categories', 'ru' => 'Категории']],
            ['categories.banner_title', 'categories', ['az' => 'Bütün kateqoriyalar', 'en' => 'All Categories', 'ru' => 'Все категории']],
            ['categories.banner_subtitle', 'categories', ['az' => 'Sevdiyiniz kateqoriyanı seçin', 'en' => 'Pick what you love', 'ru' => 'Выберите любимую категорию']],

            // Contact — additions
            ['contact.no_faqs', 'contact', ['az' => 'Hələ FAQ yoxdur.', 'en' => 'No FAQs yet.', 'ru' => 'Пока нет FAQ.']],
            ['contact.faq_subtitle', 'contact', ['az' => 'FAQ bölməsi', 'en' => 'FAQ section', 'ru' => 'Раздел FAQ']],
            ['contact.faq_title', 'contact', ['az' => 'Tez-tez verilən <br> suallar', 'en' => 'Frequently <br> Asked Questions', 'ru' => 'Часто задаваемые <br> вопросы']],
            ['contact.visit_us', 'contact', ['az' => 'Bizə baş çəkin', 'en' => 'Visit Us', 'ru' => 'Посетите нас']],
            ['contact.visit_us_text', 'contact', ['az' => 'Yaxınlıqdakı ofisimizə baş çəkin', 'en' => 'Stop by our office nearby', 'ru' => 'Загляните в наш офис']],
            ['contact.call_us', 'contact', ['az' => 'Bizə zəng edin', 'en' => 'Call Us', 'ru' => 'Позвоните нам']],
            ['contact.office_hours', 'contact', ['az' => 'İş saatları', 'en' => 'Office Hours', 'ru' => 'Часы работы']],
            ['contact.open_time', 'contact', ['az' => 'Açıq saatlar', 'en' => 'Open hours', 'ru' => 'Открыто']],
            ['contact.we_are_open', 'contact', ['az' => 'Biz açığıq', 'en' => 'We are open', 'ru' => 'Мы открыты']],
            ['contact.information', 'contact', ['az' => 'Məlumat', 'en' => 'Information', 'ru' => 'Информация']],
            ['contact.email_placeholder', 'contact', ['az' => 'E-poçtunuzu daxil edin', 'en' => 'Enter your email', 'ru' => 'Введите ваш email']],
            ['contact.name_placeholder', 'contact', ['az' => 'Adınızı daxil edin', 'en' => 'Enter your name', 'ru' => 'Введите ваше имя']],
            ['contact.phone_placeholder', 'contact', ['az' => 'Telefon nömrəniz', 'en' => 'Your phone number', 'ru' => 'Ваш телефон']],
            ['contact.subject_placeholder', 'contact', ['az' => 'Mövzu', 'en' => 'Subject', 'ru' => 'Тема']],
            ['contact.message_placeholder', 'contact', ['az' => 'Mesajınızı yazın', 'en' => 'Write your message', 'ru' => 'Напишите сообщение']],
            ['contact.feedback', 'contact', ['az' => 'Rəy', 'en' => 'Feedback', 'ru' => 'Отзыв']],
            ['contact.feedback_text', 'contact', ['az' => 'Sizin rəyiniz bizim üçün dəyərlidir', 'en' => 'Your feedback matters to us', 'ru' => 'Ваш отзыв важен']],
            ['contact.send', 'contact', ['az' => 'Göndər', 'en' => 'Send', 'ru' => 'Отправить']],
            ['contact.send_message', 'contact', ['az' => 'Mesaj göndər', 'en' => 'Send Message', 'ru' => 'Отправить сообщение']],
        ];

        DB::transaction(function () use ($items) {
            foreach ($items as [$key, $group, $values]) {
                Translation::updateOrCreate(
                    ['key' => $key],
                    ['group' => $group, 'value' => $values]
                );
            }
        });

        Translation::clearCache();
    }
}
