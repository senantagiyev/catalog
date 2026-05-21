@extends('layouts.app')
@section('content')

      <!-- breadcrumb area start -->
      <div class="aq-breadcrumb-area pt-60 pb-60" data-bg-color="#F9F9F9">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-12">
                  <div class="aq-breadcrumb-wrap text-center">
                     <div class="pd-breadcrumb-list mb-10">
                        <span><a href="{{ route('home') }}">{{ t('nav.home', 'home') }}</a></span>
                        <span>/</span>
                        <span><a href="{{ route('products') }}">{{ t('nav.shop', 'shop') }}</a></span>
                     </div>
                     <div class="aq-breadcrumb-content">
                        <h2 class="aq-breadcrumb-title fs-44">{{ t('products.title', 'Shop') }}</h2>
                        <p>{{ t('products.subtitle', 'Shop through our latest selection of Fashion') }}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->

      <!-- shop area start -->
      <div class="aqf-shop-area pt-80 pb-80">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-4">
                  <aside class="aqf-shop-sidebar mb-50">
                     <!-- categories filter -->
                     <div class="aqf-shop-widget mb-40">
                        <h4 class="aqf-shop-widget-title mb-20">{{ t('products.all_categories', 'All Categories') }}</h4>
                        <ul class="aqf-shop-cat-list list-unstyled">
                           <li class="mb-10">
                              <a href="{{ route('products') }}" class="{{ ! request('category') ? 'fw-bold' : '' }}">
                                 {{ t('products.all', 'All') }}
                              </a>
                           </li>
                           @foreach($categories as $category)
                              <li class="mb-10">
                                 <a href="{{ route('products', ['category' => $category->slug]) }}" class="{{ request('category') === $category->slug ? 'fw-bold' : '' }}">
                                    {{ $category->name }} <span class="text-muted">({{ $category->products_count ?? 0 }})</span>
                                 </a>
                              </li>
                           @endforeach
                        </ul>
                     </div>

                     <!-- brands filter -->
                     <div class="aqf-shop-widget mb-40">
                        <h4 class="aqf-shop-widget-title mb-20">{{ t('products.brands', 'Brands') }}</h4>
                        <ul class="aqf-shop-cat-list list-unstyled">
                           @foreach($brands as $brand)
                              <li class="mb-10">
                                 <a href="{{ route('products', ['brand' => $brand->slug]) }}" class="{{ request('brand') === $brand->slug ? 'fw-bold' : '' }}">
                                    {{ $brand->name }} <span class="text-muted">({{ $brand->products_count ?? 0 }})</span>
                                 </a>
                              </li>
                           @endforeach
                        </ul>
                     </div>

                     <!-- price filter -->
                     <div class="aqf-shop-widget mb-40">
                        <h4 class="aqf-shop-widget-title mb-20">{{ t('products.price', 'Price') }}</h4>
                        <form method="GET" action="{{ route('products') }}">
                           @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                           @if(request('brand'))<input type="hidden" name="brand" value="{{ request('brand') }}">@endif
                           <div class="row gx-2">
                              <div class="col-6">
                                 <input class="form-control" type="number" min="0" name="min_price" placeholder="{{ t('products.min', 'Min') }}" value="{{ request('min_price') }}">
                              </div>
                              <div class="col-6">
                                 <input class="form-control" type="number" min="0" name="max_price" placeholder="{{ t('products.max', 'Max') }}" value="{{ request('max_price') }}">
                              </div>
                           </div>
                           <button type="submit" class="aq-btn-black mt-15 w-100">{{ t('products.filter', 'Filter') }}</button>
                        </form>
                     </div>
                  </aside>
               </div>
               <div class="col-lg-9 col-md-8">
                  <!-- sort dropdown -->
                  <div class="aqf-shop-sort d-flex justify-content-between align-items-center mb-30">
                     <div class="aqf-shop-result">
                        <p class="mb-0">{{ t('products.showing', 'Showing') }} {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} {{ t('common.of', 'of') }} {{ $products->total() }}</p>
                     </div>
                     <form method="GET" action="{{ route('products') }}" class="d-flex align-items-center">
                        @foreach(request()->except(['sort','page']) as $k => $v)
                           <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endforeach
                        <label class="me-10">{{ t('products.sort_by', 'Sort by') }}:</label>
                        <select name="sort" class="form-select" onchange="this.form.submit()">
                           <option value="latest" {{ request('sort','latest') === 'latest' ? 'selected' : '' }}>{{ t('products.sort_latest', 'Latest') }}</option>
                           <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>{{ t('products.sort_price_asc', 'Price: Low to High') }}</option>
                           <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>{{ t('products.sort_price_desc', 'Price: High to Low') }}</option>
                           <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>{{ t('products.sort_name', 'Name') }}</option>
                        </select>
                     </form>
                  </div>

                  <!-- products grid -->
                  @if($products->isEmpty())
                     <div class="alert alert-info">{{ t('products.no_results', 'No products found.') }}</div>
                  @else
                     <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1">
                        @foreach($products as $product)
                           <div class="col">
                              @include('partials.product-card', ['product' => $product])
                           </div>
                        @endforeach
                     </div>

                     <!-- pagination -->
                     <div class="aqf-shop-pagination mt-30 d-flex justify-content-center">
                        {{ $products->links() }}
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
      <!-- shop area end -->

@endsection
