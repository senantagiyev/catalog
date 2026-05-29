@extends('layouts.app')
@section('content')

      <!-- breadcrumb area start -->
      <div class="aq-breadcrumb-ptb pt-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="aq-breadcrumb-top-heading text-center pb-60">
                     <div class="pd-breadcrumb-list">
                        <span><a href="{{ route('home') }}">{{ t('nav.home', 'home') }}</a></span>
                        <span>/</span>
                        <span><a href="{{ route('store') }}">{{ t('nav.store', 'Store') }}</a></span>
                     </div>
                     <h2 class="aq-blog-inner-top-title">{{ t('store.title', 'Our Store') }}</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->

      <!-- shop by category area start -->
      <div class="aqf-collection-area fix pt-30 pb-80">
         <div class="container">
            <div class="aqf-collection-top mb-40">
               <div class="row align-items-end">
                  <div class="col-md-12">
                     <div class="aqf-collection-title-box text-center mb-15">
                        <h4 class="aq-section-title ff-satoshi-med fs-38 mb-0">{{ t('store.shop_by_category', 'Shop by Category') }}</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-1">
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

      <!-- featured products area start -->
      <div class="aqf-collection-area fix pt-50 pb-100" data-bg-color="#F9F9F9">
         <div class="container">
            <div class="aqf-collection-top mb-40">
               <div class="row align-items-end">
                  <div class="col-md-8">
                     <div class="aqf-collection-title-box text-center text-md-start mb-15">
                        <h4 class="aq-section-title ff-satoshi-med fs-38 mb-0">{{ t('store.featured_products', 'Featured Products') }}</h4>
                     </div>
                  </div>
                  <div class="col-md-4 text-md-end">
                     <a class="aq-btn-black" href="{{ route('products') }}">{{ t('home.view_all', 'View All') }}</a>
                  </div>
               </div>
            </div>
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
               @foreach($featured as $product)
                  <div class="col">
                     @include('partials.product-card', ['product' => $product])
                  </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- featured products area end -->

      <!-- store info area -->
      <div class="aq-store-office-area pb-140 pt-100">
         <div class="container container1330">
            <div class="row">
               <div class="col-lg-6">
                  <div class="aq-store-office-item">
                     <h3 class="aq-store-office-sub-title">{{ t('contact.address', 'Address') }}</h3>
                     <p class="aq-store-office-text">{{ setting('address', '639 Elgin St. Celina, Delaware') }}</p>
                  </div>
                  <div class="aq-store-office-item">
                     <h3 class="aq-store-office-sub-title">{{ t('contact.we_are_open', "We're open") }}</h3>
                     <p class="aq-store-office-text">{{ setting('working_hours', 'Mon-Fri from 8am to 5pm') }}</p>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="aq-store-office-item">
                     <h3 class="aq-store-office-sub-title">{{ t('contact.information', 'Information') }}</h3>
                     <a href="mailto:{{ setting('email', 'support@example.com') }}" class="aq-store-office-text">{{ setting('email', 'support@example.com') }}</a><br>
                     <a href="tel:{{ preg_replace('/\s+/', '', setting('phone', '+1 (555) 000-0000')) }}" class="aq-store-office-text">{{ setting('phone', '+1 (555) 000-0000') }}</a>
                  </div>
               </div>
            </div>
         </div>
      </div>

@endsection
