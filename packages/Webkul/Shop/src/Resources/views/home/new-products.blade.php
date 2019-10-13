@if (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts()->count())
<section class="gallery-container p-0 line-effect bg-white">
    <div class="container">
        <!-- gallery filter -->
        <ul class="gallery-filter list-inline text-center">
            <li>
                <a href="#" data-group="all" class="active ml-2">
                    <h1 class="section-title"  style="font-family:'Amiri' !important; text-transform: uppercase;">{{  __('shop::app.home.new-products') }}</h1>
                    <img src="{{ bagisto_asset('images/border.png') }}" alt="" style="width: 160px">
                </a>
            </li>
        </ul>
        <!-- / gallery filter -->
    </div><!-- / container -->
    <div class="container full-width">
        <h3 class="section-title hidden">GALLERY</h3>
        <ul class="row gallery line-effect list-unstyled mb-0" id="grid2">
            <!-- gallery -->
            @foreach (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts() as $productFlat)
                @include ('shop::products.list.card', ['product' => $productFlat])
            @endforeach
        </ul><!-- / gallery -->
    </div><!-- / container -->
</section>
@endif
