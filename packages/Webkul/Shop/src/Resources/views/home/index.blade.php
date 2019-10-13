@extends('shop::layouts.master')

@section('page_title')
    {{-- {{ __('shop::app.home.page-title') }} --}}
    Home
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
            <meta name="title" content="{{ $metaTitle }}" />
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}" />
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}" />
        @endisset
    @endif
@endsection

@section('content-wrapper')
    {!! view_render_event('bagisto.shop.home.content.before') !!}

    <header class="home-header parallax" style="display: none;">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0" id="parallaxTitle">TO Persian Carpets - Manila</h1>
            <p class="inner-space mb-0" id="parallaxDesc">Original &amp; Elegant Persian Carpets</p>
        </div><!-- / header-content -->
    </header>

    {!! DbView::make($channel)->field('home_page_content')->with(['sliderData' => $sliderData])->render() !!}
    
    {{ view_render_event('bagisto.shop.home.content.after') }}

    <div class="card" style="margin-top: 20px;">
        <div class="card-body">
            <div class=" text-center">
                <h1 class="section-title"  style="font-family:'Amiri' !important; text-transform: uppercase;">Latest Posts</h1>
                <img src="{{ bagisto_asset('images/border.png') }}" alt="" style="width: 160px">
            </div>
            <div class="row">
                @php
                    use Corcel\Model\Post;
                    use Corcel\Model\Page;

                    $posts = Post::published()->where('post_type','post')->orderBy("ID","desc")->paginate(4);
                    foreach ($posts as $post) {
                        // echo "<pre>";
                        // print_r($post);

                        // echo "</pre>";
                        $post_page = Post::find($post->ID);

                        // echo $post_page->thumbnail;
                        echo "<div class='col-sm-12 col-md-3'>
                                    <div class='card'>
                                        <a href='".$post->guid."' target='_blank'><img class='card-img-top' src='".$post_page->thumbnail."' alt='card-image-cap'></a>
                                        <div class='card-body'>
                                            <h4 class='card-title'><a href='".$post->guid."' target='_blank'>".$post->title."</a></h4>
                                            
                                            <span style='font-size:12px;'><i class='fa fa-clock'></i> ".date_format($post->post_date,"F d, Y")."</span>
                                            <p class='card-text' style='margin-top:10px;'>".$post->post_excerpt."</p>
                                        </div>
                                    </div>
                                </div>";
                                //<span style='font-size:12px;'><i class='fa fa-user'></i> " .$post->post_author."</span> &nbsp; 
                    }
                @endphp

            </div>
            <div class="row">
                <div class="col-sm-12 text-right"><a href="/blog" target="_blank">View more...</a></div>
            </div>
        </div><!-- / card-body -->
    </div>
    @php 
        $page = Page::slug('happy-clients')->first(); 
        if(count($page)){
    @endphp
    <section id="clients" class="bg-white" style="padding-top: 0;">
        <div class="container">
            <!-- gallery filter -->
            <ul class="gallery-filter list-inline text-center">
                <li>
                    <a href="#" data-group="all" class="active ml-2">
                        <h1 class="section-title"  style="font-family:'Amiri' !important; text-transform: uppercase;">Happy Clients</h1>
                        <img src="{{ bagisto_asset('images/border.png') }}" alt="" style="width: 160px">
                    </a>
                </li>
            </ul>
        </div>
        
        <div id="tmp-clients" >{!! $page->post_content !!}</div>
        <div class="container">
            <div id="clients-carousel" class="owl-carousel owl-theme">
                
            </div><!-- / owl-carousel -->
            <!-- / clients carousel -->

        </div><!-- / container -->
    </section>  
    @php 
        }
    @endphp

@endsection

@push('scripts')
    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.shuffle.min.js"></script>
    <script src="/assets/js/gallery.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
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
              var div_imgs =""; 
              $("#tmp-clients img").each(function(){
                    var src = $(this).attr("src");
                    div_imgs += "<img src='"+src+"' alt=''/>";
              });
              if(div_imgs){
                  $("#clients-carousel").html(div_imgs);
                  $('#clients-carousel').owlCarousel({
                        loop:true,
                        autoplay:true,
                        // responsive:{
                        //     0:{
                        //         items:1
                        //     },
                        //     600:{
                        //         items:3
                        //     },
                        //     1000:{
                        //         items:4
                        //     }
                        // }
                    });
              }else{
                $("#tmp-clients+.container").remove();
              }
              $("#tmp-clients").remove();
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