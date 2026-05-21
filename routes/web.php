<?php

use App\Http\Controllers\PageController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', [PageController::class, 'setLocale'])->name('locale.set');

Route::middleware(SetLocale::class)->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/categories', [PageController::class, 'categories'])->name('categories');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
    Route::get('/store', [PageController::class, 'store'])->name('store');
    Route::get('/products', [PageController::class, 'products'])->name('products');
    Route::get('/product-card', [PageController::class, 'productCard'])->name('product.card');
    Route::get('/product/{slug?}', [PageController::class, 'productDetails'])->name('product.details');
    Route::get('/page/{slug}', [PageController::class, 'page'])->name('page');
    Route::post('/subscribe', [PageController::class, 'subscribe'])->name('subscribe');
});
