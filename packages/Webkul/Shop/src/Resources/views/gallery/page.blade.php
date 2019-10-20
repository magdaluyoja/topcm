@extends('shop::layouts.master')

@section('page_title')
    @php
        if(@page != ""){
            $title = $page->post_title;
            $post_excerpt = $page->post_excerpt;
        }else{
            $title = "";
            $post_excerpt = "";
        }
    @endphp
    {{ $title }} TO Persian Carpet Manila
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
            <meta name="title" content="{{ $metaTitle }} {{ $title }}" />
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }} {{ $title }}" />
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }} {{ $title }}" />
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
            <h1 class="header-title mb-0" id="parallaxTitle">{{ $title }}</h1>
            <p class="inner-space mb-0" id="parallaxDesc">{{ $post_excerpt }}</p>
        </div><!-- / header-content -->
    </header>

    
    <div id="mainGalTempOne">
        @php
            if(@page != ""){
                @endphp
                    {!!$page->post_content!!}        
                @php
            }
        @endphp
        
    </div>

    <section id="gallery-one" class="p-0 line-effect">
        <div class="container">
            <ul class="gallery-filter list-inline text-center" id="gallery-menu-one">
                
            </ul>
        </div>
        <div class="container full-width">
            <h3 class="section-title hidden">GALLERY</h3>
            <ul class="row gallery line-effect list-unstyled mb-0" id="grid-gallery-one">

            </ul>
        </div>
    </section>

    <div class="modal fade product-modal digital-product" tabindex="-1" role="dialog" id="mdlViewItem">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- / modal-header -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row" style="align-items: normal;">
                            <div class="col-md-6">
                                <img src="" id="itemImage" class="img-fluid">
                            </div><!-- / column -->
                            <div class="col-md-6">
                                <h4 class="single-product-title" id="itemTitle"></h4>
                                <p id="itemDesc"></p>
                            </div><!-- / column -->
                        </div><!-- / row -->
                    </div><!-- / container-fluid -->
                </div><!-- / modal-body -->
            </div><!-- / modal-content -->
        </div><!-- / modal-dialog -->
    </div><!-- / modal -->
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
            $("#gallery-menu-one").hide();
            $("#grid-gallery-one").on("click",".gallery-button", function(){
                var src = $(this).data("imgsrc");
                var title = $(this).data("title");
                var desc = $(this).data("desc");
                $("#itemImage").attr("src",src);
                $("#itemTitle").text(title);
                $("#itemDesc").text(desc);
                $("#mdlViewItem").modal("show");
            });
        });
    </script>
@endpush