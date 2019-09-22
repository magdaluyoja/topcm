{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}
<?php $count = 1 ?>
<li class="col-md-6 col-lg-4 gallery" id="gallery_{{$count}}" data-groups='["framed"]'>

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>
    
    <figure class="gallery-item effect-bubba">
        <img src="{{ $productBaseImage['original_image_url'] }}" onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"/>
        <figcaption>
            <div class="hover-content">
                <h2 class="hover-title text-center text-white">{{ $product->name }}</h2><!-- / hover-title -->
                <div class="gallery-info text-center text-white price">

                    @include ('shop::products.price', ['product' => $product])

                    <div class="gallery-icons">
                        <a href="{{ route('shop.products.index', $product->url_key) }}" data-toggle="tooltip" title="View Product" class="gallery-button btn-view-item"><i class="fas fa-eye"></i></a>
                        @include('shop::products.add-buttons', ['product' => $product])
                    </div><!--/ gallery-icons -->
                </div><!-- / gallery-info -->
            </div><!-- / hover-content -->
        </figcaption>
    </figure><!-- / gallery-item -->
</li><!-- / gallery -->
<?php $count++; ?>






{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}

@push('scripts')

    <script>
        $(document).ready(function(){
            var count = 1;
            $(".gallery-item img").each(function(){
                var screenImage = $(this);

                // Create new offscreen image to test
                var theImage = new Image();
                theImage.src = screenImage.attr("src");

                // Get accurate measurements from that.
                var imageWidth = theImage.width;
                var imageHeight = theImage.height;
                console.log(imageHeight);
                if(imageHeight > 800){
                    $("#gallery_"+count).addClass("tall-gallery");
                }
                count++;
            });
        });
    </script>

@endpush