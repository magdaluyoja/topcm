{!! view_render_event('bagisto.shop.products.view.up-sells.after', ['product' => $product]) !!}

<?php
    $productUpSells = $product->up_sells()->get();
?>

@if ($productUpSells->count())
    <div class="attached-products-wrapper">

        <div class="title">
            {{ __('shop::app.products.up-sell-title') }}
            <span class="border-bottom"></span>
        </div>


        <section class="gallery-container p-0 line-effect">
            <div class="container full-width">
                <ul class="row gallery line-effect list-unstyled mb-0" id="grid3">
                    <!-- gallery -->
                    @foreach ($productUpSells as $up_sell_product)

                        @include ('shop::products.list.card', ['product' => $up_sell_product])

                    @endforeach
                </ul><!-- / gallery -->
            </div><!-- / container -->
        </section>


       {{--  <div class="product-grid-4">

            @foreach ($productUpSells as $up_sell_product)

                @include ('shop::products.list.card', ['product' => $up_sell_product])

            @endforeach

        </div> --}}

    </div>
@endif

{!! view_render_event('bagisto.shop.products.view.up-sells.after', ['product' => $product]) !!}