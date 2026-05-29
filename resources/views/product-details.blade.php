@extends('layouts.app')
@section('content')
@php
   $primaryImage = $product->images->firstWhere('is_primary', true) ?? $product->images->first();
@endphp

      <!-- breadcrumb area start -->
      <div class="pd-breadcrumb-area pt-30 pb-30">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="pd-breadcrumb-content">
                     <div class="pd-breadcrumb-list">
                        <span><a href="{{ route('home') }}">{{ t('nav.home') }}</a></span>
                        <span>/</span>
                        <span><a href="{{ route('products') }}">{{ t('nav.shop') }}</a></span>
                        @if($product->category)
                           <span>/</span>
                           <span><a href="{{ route('products', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></span>
                        @endif
                        <span>/</span>
                        <span>{{ $product->name }}</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->

      <!-- product details area start -->
      <div class="aq-product-details-thumbnails-style pb-120">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 order-lg-1 order-2">
                  <div class="product-details-slider-wrap aq-sticky-on">
                     <div class="row">
                        <div class="col-xl-2">
                           <div class="product-slider-nav slider-nav">
                              @foreach($product->images as $image)
                                 <div class="product-slider-nav-img">
                                    <img src="{{ media($image->path) }}" alt="{{ $product->name }}">
                                 </div>
                              @endforeach
                           </div>
                        </div>
                        <div class="col-xl-10">
                           <div class="product-slider-main-wrap p-relative">
                              <div class="product-slider-main slider-for p-relative">
                                 @foreach($product->images as $image)
                                    <div class="product-slider-main-img">
                                       <img src="{{ media($image->path) }}" alt="{{ $product->name }}">
                                    </div>
                                 @endforeach
                                 @if($product->images->isEmpty() && $primaryImage)
                                    <div class="product-slider-main-img"><img src="{{ media($primaryImage->path) }}" alt="{{ $product->name }}"></div>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 order-lg-2 order-1">
                  <div class="aq-product-details-content">
                     @if($product->category)
                        <span class="aqf-product-3-category mb-10 d-block">
                           <a href="{{ route('products', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                        </span>
                     @endif

                     <h2 class="aq-product-details-title mb-15">{{ $product->name }}</h2>

                     <div class="aq-product-details-meta mb-15">
                        <span class="me-15">{{ t('product.sku') }}: <strong>{{ $product->sku }}</strong></span>
                        @if($product->brand)
                           <span class="me-15">{{ t('product.brand') }}: <a href="{{ route('products', ['brand' => $product->brand->slug]) }}"><strong>{{ $product->brand->name }}</strong></a></span>
                        @endif
                        <span class="aq-stock-badge {{ $product->stock > 0 ? 'in-stock text-success' : 'out-stock text-danger' }}">
                           {{ $product->stock > 0 ? t('product.in_stock') : t('product.out_of_stock') }}
                        </span>
                     </div>

                     <div class="aq-product-details-price mb-20">
                        @if($product->has_discount)
                           <ins><span class="aq-product-new-price fs-26">${{ number_format($product->sale_price, 2) }}</span></ins>
                           <del class="ms-10"><span class="aq-product-old-price">${{ number_format($product->price, 2) }}</span></del>
                        @else
                           <ins><span class="aq-product-new-price fs-26">${{ number_format($product->price, 2) }}</span></ins>
                        @endif
                     </div>

                     @if($product->short_description)
                        <div class="aq-product-details-short mb-20">
                           <p>{{ $product->short_description }}</p>
                        </div>
                     @endif

                     @if($product->colors->isNotEmpty())
                        <div class="aq-product-details-color mb-20">
                           <h4 class="mb-10">{{ t('product.color') }}</h4>
                           <ul class="d-flex flex-wrap list-unstyled gap-2">
                              @foreach($product->colors as $color)
                                 <li class="aq-product-color-item aq-tooltip-top aq-color-swatch" title="{{ $color->name }}">
                                    <span class="aq-tooltip-item">{{ $color->name }}</span>
                                    <span class="aq-product-color-value d-inline-block" style="background-color: {{ $color->hex_code }}; width:24px; height:24px; border-radius:50%; border:1px solid #ddd;"></span>
                                 </li>
                              @endforeach
                           </ul>
                        </div>
                     @endif

                     @if($product->sizes->isNotEmpty())
                        <div class="aq-product-details-size mb-20">
                           <h4 class="mb-10">{{ t('product.size') }}</h4>
                           <ul class="d-flex flex-wrap list-unstyled gap-2">
                              @foreach($product->sizes as $size)
                                 <li>
                                    <button type="button" class="btn btn-outline-dark btn-sm">{{ $size->name ?? $size->code }}</button>
                                 </li>
                              @endforeach
                           </ul>
                        </div>
                     @endif

                     <div class="aq-product-details-action mb-30">
                        <button class="aq-btn-black" type="button" {{ $product->stock <= 0 ? 'disabled' : '' }}>{{ t('product.add_to_cart') }}</button>
                     </div>

                     @if($product->tags->isNotEmpty())
                        <div class="aq-product-details-tags mb-20">
                           <strong>{{ t('product.tags') }}:</strong>
                           @foreach($product->tags as $tag)
                              <span class="badge bg-light text-dark">{{ $tag->name }}</span>
                           @endforeach
                        </div>
                     @endif
                  </div>
               </div>
            </div>

            @if($product->description)
               <div class="row pt-60">
                  <div class="col-xl-12">
                     <h3 class="mb-20">{{ t('product.description') }}</h3>
                     <div class="aq-product-details-description">
                        {!! $product->description !!}
                     </div>
                  </div>
               </div>
            @endif
         </div>
      </div>
      <!-- product details area end -->

      <!-- related products area start -->
      @if($related->isNotEmpty())
      <div class="aqf-collection-area fix pt-30 pb-100" data-bg-color="#F9F9F9">
         <div class="container">
            <div class="aqf-collection-top mb-40">
               <div class="row">
                  <div class="col-md-12">
                     <div class="aqf-collection-title-box text-center mb-15">
                        <h4 class="aq-section-title ff-satoshi-med fs-38 mb-0">{{ t('product.related_products') }}</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
               @foreach($related as $product)
                  <div class="col">
                     @include('partials.product-card', ['product' => $product])
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      @endif
      <!-- related products area end -->

@endsection
