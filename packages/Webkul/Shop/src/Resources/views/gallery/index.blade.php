@extends('shop::layouts.master')

@section('page_title')
    Gallery | TO Persian Carpet Manila
@endsection

@php
    $channel = core()->getCurrentChannel();

    $homeSEO = $channel->home_seo;

    if (isset($homeSEO)) {
        $homeSEO = json_decode($channel->home_seo);

        $metaTitle = $homeSEO->meta_title;

        $metaDescription = $homeSEO->meta_description;

        $metaKeywords = $homeSEO->meta_keywords;
    }
@endphp

@section('head')

    @if (isset($homeSEO))
        @isset($metaTitle)
            <meta name="title" content="{{ $metaTitle }} Gallery" />
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }} Gallery" />
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }} Gallery" />
        @endisset
    @endif
@endsection
@push("css")
    <style>
        .effect-bubba figcaption::before, .effect-bubba figcaption::after {
            right: 45px !important;
            left: 45px !important;
        }
    </style>
@endpush
@section('content-wrapper')
    {!! view_render_event('bagisto.shop.home.content.before') !!}

    <header class="home-header parallax">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0" id="parallaxTitle">Gallery</h1>
            <p class="inner-space mb-0" id="">Original &amp; Elegant Persian Carpets</p>
        </div><!-- / header-content -->
    </header>

    @php
        use Corcel\Model\Page;    
        use Corcel\Model\Post;    
        

        $pages = Post::type('page')->where("post_title","=","Main Gallery")->get();

        $mainGallery = $pages[0];
        // $galleries = Post::type('page')
        //                 ->where("post_title","like","%Gallery%")
        //                 ->where("post_status","!=","trash")
        //                 //->where("ID",">",$mainGallery->ID)
        //                 ->get();
       // dd($galleries);
    @endphp
    <div id="mainGalTemp">
        {!!$mainGallery->post_content!!}
    </div>

    <section id="gallery" class="p-0 line-effect">
        <div class="container">
            <ul class="gallery-filter list-inline text-center" id="gallery-menu">
                
            </ul>
        </div>
        <div class="container full-width">
            <h3 class="section-title hidden">GALLERY</h3>
            <ul class="row gallery line-effect list-unstyled mb-0" id="grid-gallery">

            </ul>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.shuffle.min.js"></script>
    <script src="/assets/js/gallery.js"></script>
    <script>
    $(document).ready(function(){
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").click(function(e){
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){
                $(this).removeClass("hover");
            });
        }
    });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
              $("#gallery-menu").hide();
        });
    </script>
    <script>
        $(document).ready(function(){
            var sliderLength = $("ul.slider-images>li").length;
            if(sliderLength  > 1){
                $("section.slider-block").show();
                $("header.home-header").hide();
            }else{
                $("section.slider-block").hide();
                $("header.home-header").show();
                var imgsrc = $("#app > div.main-container-wrapper > div.content-container > section > div > ul > li > img").attr("src");
                var parallaxTitle = $("#app > div.main-container-wrapper > div.content-container.container > section.slider-block > div > ul > li.show > img").attr("alt");
                var parallaxDesc = $("#app > div.main-container-wrapper > div.content-container.container > section.slider-block > div > ul > li.show > div > p").text();

                $("#parallaxTitle").text(parallaxTitle);
                $("#parallaxDesc").text(parallaxDesc);
                $("header.home-header").css("background-image","url('"+imgsrc+"')");
            }
        });
    </script>

@endpush