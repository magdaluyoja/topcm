<?php
    $relatedProducts = $product->related_products()->get();
?>

@if ($relatedProducts->count())
    <div class="attached-products-wrapper">

        <div class="title">
            {{ __('shop::app.products.related-product-title') }}
            <span class="border-bottom"></span>
        </div>

        <section class="gallery-container p-0 line-effect">
            <div class="container full-width">
                <ul class="row gallery line-effect list-unstyled mb-0" id="grid2">
                    <!-- gallery -->
                    @foreach ($relatedProducts as $related_product)

                        @include ('shop::products.list.card', ['product' => $related_product])

                    @endforeach
                </ul><!-- / gallery -->
            </div><!-- / container -->
        </section>

       {{--  <div class="product-grid-4">

            @foreach ($relatedProducts as $related_product)

                @include ('shop::products.list.card', ['product' => $related_product])

            @endforeach

        </div> --}}

    </div>
@endif