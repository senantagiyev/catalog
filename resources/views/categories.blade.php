@extends('layouts.app')
@section('content')


      <!-- aq breadcrumb area start -->
      <div class="aq-breadcrumb-area pt-60 pb-40">
         <div class="container container-1240">
            <div class="row align-items-center">
               <div class="col-xl-12">
                  <div class="aq-breadcrumb-wrap">
                     <div class="aq-breadcrumb-content">
                        <h2 class="aq-breadcrumb-title fs-44">{{ t('categories.title') }}</h2>
                        <div class="pd-breadcrumb-list mb-10">
                           <span><a href="{{ route('home') }}">{{ t('nav.home') }}</a></span>
                           <span>/</span>
                           <span><a href="{{ route('categories') }}">{{ t('categories.title') }}</a></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- aq breadcrumb area end -->


      <!-- aq categories banner start -->
      {{-- <div class="aq-categories-banner">
         <div class="container container-1240">
            <div class="row">
               <div class="col-xl-12">
                  <div class="aq-categories-banner-wrap">
                     <div class="row">
                        <div class="col-lg-8">
                           <div class="aq-categories-banner-item p-relative mb-30" data-bg-color="#EEEBE5">
                              <div class="aq-categories-banner-item-video">
                                 <video loop="" muted="" autoplay="" playsinline="">
                                    <source src="https://html.aqlova.com/videos/bazaro/electronics-video.mp4" type="video/mp4">
                                 </video>
                              </div>
                              <div class="aq-categories-banner-item-content">
                                 <span class="aq-categories-banner-item-sub">{{ t('categories.banner_subtitle') }}</span>
                                 <h2 class="aq-categories-banner-item-title">{!! t('categories.banner_title') !!}</h2>
                                 <div class="aq-categories-banner-item-btn">
                                    <a class="aq-line-anim" href="{{ route('products') }}">{{ t('common.shop_now') }} <span>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 15 12" fill="none">
                                          <path d="M13.7498 5.97092H0.75M13.7498 5.97092L8.50684 0.75M13.7498 5.97092L8.50684 11.1923" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                       </span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="aq-categories-banner-item p-relative mb-30" data-bg-color="#F9F9F9">
                              <div class="aq-categories-banner-item-img">
                                 <img src="{{ asset('assets/img/cosmetics/banner/banner-4.jpg') }}" alt="">
                              </div>
                              <div class="aq-categories-banner-item-content style-2">
                                 <span class="aq-categories-banner-item-sub">Sale 35% off</span>
                                 <h2 class="aq-categories-banner-item-title fs-20"> Nest <br>
                                 Camera Wireless <br>
                                 Ip65</h2>
                                 <div class="aq-categories-banner-item-btn">
                                    <a class="aq-line-anim" href="product-details-default.html">Shop Now <span>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 15 12" fill="none">
                                          <path d="M13.7498 5.97092H0.75M13.7498 5.97092L8.50684 0.75M13.7498 5.97092L8.50684 11.1923" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </span></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}
      <!-- aq categories banner end -->


      <!-- aq categories item start -->
      <div class="aq-categories-item-ptb pb-80">
         <div class="container container-1240">
            <div class="row">
               @foreach($categories as $category)
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ media($category->image, 'assets/img/categories/item-1.jpg') }}" alt="{{ $category->name }}">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="{{ route('products', ['category' => $category->slug]) }}">{{ $category->name }}</a></h2>
                        <span>{{ $category->products_count ?? 0 }} {{ t('common.products') }}</span>
                     </div>
                  </div>
               </div>
               @endforeach
               @php $__hide_static_cats = true; @endphp
               @if(false)
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-2.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Watch Series 7</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-3.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Apple Magic</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-4.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html"> Watch 4</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-5.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Gaming pc</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-6.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Beats Studio Buds</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-7.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Anker Soundcore</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-8.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Powerbeats Pro 2</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-9.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Cpu Air Cooler</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-10.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">USB-A to USB-C</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-11.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Lenovo Tab P11</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="aq-categories-item-wrap text-center p-relative mb-25">
                     <div class="aq-categories-item-img">
                        <img src="{{ asset('assets/img/categories/item-12.jpg') }}" alt="">
                     </div>
                     <div class="aq-categories-item-content">
                        <h2 class="aq-categories-item-title"><a class="aq-line-anim" href="product-details-default.html">Sony PlayStation 5</a></h2>
                        <span>23 Products</span>
                     </div>
                  </div>
               </div>
               @endif
            </div>
            <div class="row">
               <div class="col-xl-12">
                  <div class="aq-categories-main-result text-center mb-35 mt-35">
                     <p>{{ t('common.showing') }} {{ $categories->count() }} {{ t('common.of') }} {{ $categories->count() }} {{ t('common.categories') }}</p>
                     <div class="aq-categories-main-result-bar">
                        <span data-width="40%" style="width: 40%;"></span>
                     </div>
                  </div>
                  <div class="aq-categories-main-more text-center">
                     <a href="{{ route('products') }}" class="aq-btn-white btn-square-bg btn-border-gray">
                        {{ t('common.load_more') }}
                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M13.0003 1.698V5.2986H9.39966" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           <path d="M11.4933 8.29916C11.1032 9.40329 10.3649 10.3507 9.38948 10.9987C8.41408 11.6467 7.2545 11.9601 6.08548 11.8917C4.91647 11.8233 3.80134 11.3768 2.90816 10.6195C2.01497 9.86225 1.3921 8.83518 1.13343 7.69309C0.874748 6.551 0.99427 5.35578 1.47398 4.28753C1.95369 3.21928 2.7676 2.33588 3.79306 1.77045C4.81852 1.20502 5.99998 0.988199 7.15939 1.15265C8.3188 1.31711 9.39335 1.85393 10.2211 2.68222L12.9996 5.29866" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- aq categories item end -->


@endsection
