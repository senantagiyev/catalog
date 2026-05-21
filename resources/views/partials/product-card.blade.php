@php
    /** @var \App\Models\Product $product */
    $primary = $product->images->firstWhere('is_primary', true) ?? $product->images->first();
    $hover = $product->images->firstWhere('is_hover', true) ?? $product->images->skip(1)->first();
@endphp
<div class="aq-product-item aq-product-main mb-40" data-lazy="true">
    <div class="aq-product-thumb aq-img-hover-wrap p-relative mb-10">
        @if($product->badge_label)
            <div class="aq-product-badge">
                <span class="clr-{{ $product->badge_color ?? 'new' }}">{{ $product->badge_label }}</span>
            </div>
        @elseif($product->has_discount)
            <div class="aq-product-badge">
                <span class="clr-sale">-{{ $product->discount_percent }}%</span>
            </div>
        @elseif($product->is_new)
            <div class="aq-product-badge">
                <span class="clr-new">{{ __('Yeni') }}</span>
            </div>
        @endif
        <a href="{{ route('product.details', $product->slug) }}">
            @if($primary)
                <img class="lazyload aq-product-img" src="{{ asset($primary->path) }}" alt="{{ $product->name }}">
            @endif
            @if($hover)
                <img class="aq-img-hover lazyload" src="{{ asset($hover->path) }}" alt="">
            @endif
        </a>
    </div>
    <div class="aq-product-content">
        @if($product->category)
            <span class="aqf-product-3-category">{{ $product->category->name }}</span>
        @endif
        <h4 class="aq-product-title mb-5">
            <a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
        </h4>
        <div class="aq-product-price">
            @if($product->has_discount)
                <del><span class="aq-product-old-price">${{ number_format($product->price, 2) }}</span></del>
                <ins><span class="aq-product-new-price">${{ number_format($product->sale_price, 2) }}</span></ins>
            @else
                <ins><span class="aq-product-new-price">${{ number_format($product->price, 2) }}</span></ins>
            @endif
        </div>
        @if($product->colors->isNotEmpty())
            <div class="aq-product-color">
                <ul>
                    @foreach($product->colors as $i => $color)
                        <li class="aq-product-color-item aq-tooltip-top aq-color-swatch {{ $i === 0 ? 'active' : '' }}">
                            <span class="aq-tooltip-item">{{ $color->name }}</span>
                            <span class="aq-product-color-value" data-bg-color="{{ $color->hex_code }}" style="background-color: {{ $color->hex_code }}"></span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
