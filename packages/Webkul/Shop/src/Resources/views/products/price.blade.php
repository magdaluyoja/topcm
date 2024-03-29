{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

{{-- <div class="product-price"> --}}
    @inject ('priceHelper', 'Webkul\Product\Helpers\Price')

    @if ($product->type == 'configurable')
        {{-- <span class="price-label">{{ __('shop::app.products.price-label') }}</span> --}}
        {{ __('shop::app.products.price-label') }}
        {{-- <span class="final-price">{{ core()->currency($priceHelper->getMinimalPrice($product)) }}</span> --}}
        {{ core()->currency($priceHelper->getMinimalPrice($product)) }}
    @else
        @if ($priceHelper->haveSpecialPrice($product))
            <span class="sticker sale">
                {{ __('shop::app.products.sale') }}
            </span>

            {{-- <span class="regular-price">{{ core()->currency($product->price) }}</span> --}}
            {{ core()->currency($product->price) }}
            {{-- <span class="special-price">{{ core()->currency($priceHelper->getSpecialPrice($product)) }}</span> --}}
            {{ core()->currency($priceHelper->getSpecialPrice($product)) }}
        @else
            {{-- <span>{{ core()->currency($product->price) }}</span> --}}
            {{ core()->currency($product->price) }}
        @endif
    @endif
{{-- </div> --}}

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}