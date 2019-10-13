@foreach ($cart->items as $item)
    <?php
        $product = $item->product;

        if ($product->cross_sells()->count()) {
            $products[] = $product;
            $products = array_unique($products);
        }
    ?>
@endforeach

@if (isset($products))

    <div class="attached-products-wrapper mt-50">

        <div class="title">
            {{ __('shop::app.products.cross-sell-title') }}
             <span class="border-bottom"></span>
        </div>

        <section class="gallery-container p-0 line-effect">
            <div class="container full-width">
                <ul class="row gallery line-effect list-unstyled mb-0" id="grid">
                    <!-- gallery -->
                    @foreach($products as $product)

                        @foreach ($product->cross_sells()->paginate(2) as $cross_sell_product)

                            @include ('shop::products.list.card', ['product' => $cross_sell_product])

                        @endforeach

                    @endforeach
                </ul><!-- / gallery -->
            </div><!-- / container -->
        </section>

        {{-- <div class="product-grid-4">
            @foreach($products as $product)

                @foreach ($product->cross_sells()->paginate(2) as $cross_sell_product)

                    @include ('shop::products.list.card', ['product' => $cross_sell_product])

                @endforeach

            @endforeach

        </div> --}}

    </div>

@endif