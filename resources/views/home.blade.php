@extends('layouts.app')
@section('content')

      <!-- hero slider area start -->
      @if($sliders->isNotEmpty())
      <div class="aqf-slider-area">
         <div class="swiper aqf-slider-active p-relative">
            <div class="swiper-wrapper">
               @foreach($sliders as $slider)
               <div class="swiper-slide">
                  <div class="aqf-slider-item p-relative">
                     <div class="aqf-slider-thumb">
                        <img class="w-100 d-none d-md-block" src="{{ media($slider->image, 'assets/img/fashion-1/slider/slider-1.png') }}" alt="{{ $slider->title }}">
                        <img class="w-100 d-md-none" src="{{ media($slider->mobile_image ?: $slider->image, 'assets/img/fashion-1/slider/slider-1-1.jpg') }}" alt="{{ $slider->title }}">
                     </div>
                     <div class="container">
                        <div class="row align-items-center">
                           <div class="col-xl-6 col-lg-8 col-md-8">
                              <div class="aqf-slider-content text-center text-md-start z-index-1">
                                 @if($slider->subtitle)
                                    <span class="aq-section-subtitle ff-satoshi-reg mb-10">{{ $slider->subtitle }}</span>
                                 @endif
                                 <h3 class="aq-section-title ff-satoshi-reg mb-30">{{ $slider->title }}</h3>
                                 @if($slider->button_text)
                                    <a class="aq-btn-black" href="{{ $slider->link ?: route('products') }}">{{ $slider->button_text }}</a>
                                 @else
                                    <a class="aq-btn-black" href="{{ route('products') }}">{{ t('home.shop_collection', 'Shop Collection') }}</a>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="aqf-slider-dot"></div>
         </div>
      </div>
      @endif
      <!-- hero slider area end -->

      <!-- featured products area start -->
      <div class="aqf-collection-area fix pt-100 pb-100">
         <div class="container">
            <div class="aqf-collection-top mb-40">
               <div class="row align-items-end">
                  <div class="col-md-8">
                     <div class="aqf-collection-title-box text-center text-md-start mb-15">
                        <span class="aq-section-subtitle ff-satoshi-med mb-10">{{ t('home.featured_subtitle', 'Best of the season') }}</span>
                        <h4 class="aq-section-title ff-satoshi-med fs-38 mb-0">{{ t('home.featured_products', 'Featured products') }}</h4>
                     </div>
                  </div>
                  <div class="col-md-4 text-md-end">
                     <a class="aq-btn-black" href="{{ route('products') }}">{{ t('home.view_all', 'View All') }}</a>
                  </div>
               </div>
            </div>
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
               @foreach($featuredProducts as $product)
                  <div class="col">
                     @include('partials.product-card', ['product' => $product])
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- featured products area end -->

      <!-- shop by category area start -->
      <div class="aqf-collection-area fix pt-50 pb-80" data-bg-color="#F9F9F9">
         <div class="container">
            <div class="aqf-collection-top mb-40">
               <div class="row align-items-end">
                  <div class="col-md-12">
                     <div class="aqf-collection-title-box text-center mb-15">
                        <span class="aq-section-subtitle ff-satoshi-med mb-10">{{ t('home.shop_by_category_subtitle', 'Discover the new') }}</span>
                        <h4 class="aq-section-title ff-satoshi-med fs-38 mb-0">{{ t('home.shop_by_category', 'Shop by Category') }}</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
               @foreach($categories as $category)
                  <div class="col">
                     <div class="aq-categories-item-wrap text-center p-relative mb-25">
                        <div class="aq-categories-item-img">
                           <a href="{{ route('products', ['category' => $category->slug]) }}">
                              <img src="{{ media($category->image, 'assets/img/categories/item-1.jpg') }}" alt="{{ $category->name }}">
                           </a>
                        </div>
                        <div class="aq-categories-item-content">
                           <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="{{ route('products', ['category' => $category->slug]) }}">{{ $category->name }}</a></h2>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- shop by category area end -->

      <!-- middle slider banner area -->
      @if($middleSliders->isNotEmpty())
      <div class="aq-categories-banner pt-60 pb-60">
         <div class="container container-1240">
            <div class="row">
               @foreach($middleSliders as $slider)
                  <div class="col-lg-{{ $loop->count == 1 ? '12' : ($loop->count == 2 ? '6' : '4') }}">
                     <div class="aq-categories-banner-item p-relative mb-30" data-bg-color="#EEEBE5">
                        <div class="aq-categories-banner-item-img">
                           <img src="{{ media($slider->image, 'assets/img/cosmetics/banner/banner-4.jpg') }}" alt="{{ $slider->title }}">
                        </div>
                        <div class="aq-categories-banner-item-content">
                           @if($slider->subtitle)
                              <span class="aq-categories-banner-item-sub">{{ $slider->subtitle }}</span>
                           @endif
                           <h2 class="aq-categories-banner-item-title">{{ $slider->title }}</h2>
                           <div class="aq-categories-banner-item-btn">
                              <a class="aq-line-anim" href="{{ $slider->link ?: route('products') }}">{{ $slider->button_text ?: t('common.shop_now', 'Shop Now') }}
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 15 12" fill="none">
                                       <path d="M13.7498 5.97092H0.75M13.7498 5.97092L8.50684 0.75M13.7498 5.97092L8.50684 11.1923" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      @endif
      <!-- middle slider banner end -->

      <!-- new arrivals area start -->
      <div class="aqf-collection-area fix pt-80 pb-80">
         <div class="container">
            <div class="aqf-collection-top mb-40">
               <div class="row align-items-end">
                  <div class="col-md-8">
                     <div class="aqf-collection-title-box text-center text-md-start mb-15">
                        <span class="aq-section-subtitle ff-satoshi-med mb-10">{{ t('home.new_arrivals_subtitle', 'Just landed') }}</span>
                        <h4 class="aq-section-title ff-satoshi-med fs-38 mb-0">{{ t('home.new_arrivals', 'New Arrivals') }}</h4>
                     </div>
                  </div>
                  <div class="col-md-4 text-md-end">
                     <a class="aq-btn-black" href="{{ route('products') }}">{{ t('home.view_all', 'View All') }}</a>
                  </div>
               </div>
            </div>
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
               @foreach($newProducts as $product)
                  <div class="col">
                     @include('partials.product-card', ['product' => $product])
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- new arrivals area end -->

      <!-- popular brands area start -->
      @if($brands->isNotEmpty())
      <div class="aqf-brand-area pt-60 pb-80" data-bg-color="#F9F9F9">
         <div class="container">
            <div class="aqf-collection-top mb-40">
               <div class="row align-items-end">
                  <div class="col-md-12">
                     <div class="aqf-collection-title-box text-center mb-15">
                        <h4 class="aq-section-title ff-satoshi-med fs-38 mb-0">{{ t('home.popular_brands', 'Popular Brands') }}</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row row-cols-xl-6 row-cols-lg-4 row-cols-md-3 row-cols-2 align-items-center">
               @foreach($brands as $brand)
                  <div class="col text-center">
                     <a href="{{ route('products', ['brand' => $brand->slug]) }}" class="aqf-brand-item d-block py-30">
                        @if($brand->logo)
                           <img src="{{ media($brand->logo) }}" alt="{{ $brand->name }}" style="max-height:60px;">
                        @else
                           <span class="fs-20 ff-satoshi-med">{{ $brand->name }}</span>
                        @endif
                     </a>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      @endif
      <!-- popular brands area end -->

@endsection
