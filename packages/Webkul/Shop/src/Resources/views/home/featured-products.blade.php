@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())
    <section class="gallery-container p-0 line-effect">
        <div class="container">
            <!-- gallery filter -->
            <ul class="gallery-filter list-inline text-center">
                <li>
                    <a href="#" data-group="all" class="active ml-2">
                        <h1 class="section-title"  style="font-family:'Amiri' !important; text-transform: uppercase;">{{ __('shop::app.home.featured-products') }}</h1>
                        <img src="{{ bagisto_asset('images/border.jpg') }}" alt="" style="width: 400px">
                    </a>
                </li>
            </ul>
            <!-- / gallery filter -->
        </div><!-- / container -->
        <div class="container full-width">
            <h3 class="section-title hidden">GALLERY</h3>
            <ul class="row gallery line-effect list-unstyled mb-0" id="grid">
                <!-- gallery -->
                @foreach (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts() as $productFlat)
                    @include ('shop::products.list.card', ['product' => $productFlat])
                @endforeach
            </ul><!-- / gallery -->
        </div><!-- / container -->
    </section>

@endif