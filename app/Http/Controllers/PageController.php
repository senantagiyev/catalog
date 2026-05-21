<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function home()
    {
        $sliders = Slider::active()->position('hero')->orderBy('sort_order')->get();
        $middleSliders = Slider::active()->position('middle')->orderBy('sort_order')->get();
        $featuredProducts = Product::active()->featured()->with(['images', 'colors', 'category'])->take(8)->get();
        $newProducts = Product::active()->new()->with(['images', 'colors', 'category'])->take(8)->get();
        $categories = Category::active()->roots()->orderBy('sort_order')->take(8)->get();
        $brands = Brand::active()->orderBy('sort_order')->take(8)->get();

        return view('home', compact(
            'sliders', 'middleSliders', 'featuredProducts', 'newProducts', 'categories', 'brands'
        ));
    }

    public function categories()
    {
        $categories = Category::active()->orderBy('sort_order')->withCount('products')->get();
        $sliders = Slider::active()->position('category_top')->orderBy('sort_order')->get();

        return view('categories', compact('categories', 'sliders'));
    }

    public function contact(Request $request)
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create([
            ...$data,
            'ip' => $request->ip(),
        ]);

        return back()->with('success', __('Mesajınız uğurla göndərildi.'));
    }

    public function store()
    {
        $featured = Product::active()->featured()->with(['images', 'colors'])->take(12)->get();
        $categories = Category::active()->roots()->orderBy('sort_order')->take(6)->get();

        return view('store', compact('featured', 'categories'));
    }

    public function products(Request $request)
    {
        $query = Product::active()->with(['images', 'colors', 'category', 'brand']);

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('brand')) {
            $query->whereHas('brand', fn ($q) => $q->where('slug', $request->brand));
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $sort = $request->get('sort', 'latest');
        match ($sort) {
            'price_asc' => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'name' => $query->orderBy('name->az'),
            default => $query->latest(),
        };

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::active()->roots()->orderBy('sort_order')->withCount('products')->get();
        $brands = Brand::active()->orderBy('sort_order')->withCount('products')->get();

        return view('products', compact('products', 'categories', 'brands'));
    }

    public function productCard()
    {
        $products = Product::active()->with(['images', 'colors'])->paginate(12);

        return view('product-card', compact('products'));
    }

    public function productDetails(?string $slug = null)
    {
        $product = $slug
            ? Product::active()->where('slug', $slug)->with(['images', 'colors', 'sizes', 'tags', 'category', 'brand'])->firstOrFail()
            : Product::active()->with(['images', 'colors', 'sizes', 'tags', 'category', 'brand'])->first();

        abort_if(! $product, 404);

        $related = Product::active()
            ->where('id', '!=', $product->id)
            ->when($product->category_id, fn ($q) => $q->where('category_id', $product->category_id))
            ->with(['images', 'colors'])
            ->take(4)
            ->get();

        return view('product-details', compact('product', 'related'));
    }

    public function page(string $slug)
    {
        $page = Page::active()->where('slug', $slug)->firstOrFail();

        return view('page', compact('page'));
    }

    public function subscribe(Request $request)
    {
        $data = $request->validate(['email' => 'required|email|unique:subscribers,email']);

        Subscriber::create([
            'email' => $data['email'],
            'is_active' => true,
            'subscribed_at' => now(),
        ]);

        return back()->with('success', __('Abunəlik təsdiqləndi.'));
    }

    public function setLocale(string $locale)
    {
        if (in_array($locale, ['az', 'en', 'ru'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }

        return back();
    }

    public function error()
    {
        return view('error');
    }
}
