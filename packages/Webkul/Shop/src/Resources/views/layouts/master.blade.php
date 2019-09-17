<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

    <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">

    <!-- Bootstrap 4 core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/owl.carousel.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/assets/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">

    <link rel="stylesheet" href="/css/custom.css">
    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
    @else
        <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}" />
    @endif

    @yield('head')

    @section('seo')
        @if (! request()->is('/'))
            <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
        @endif
    @show

    @stack('css')

    {!! view_render_event('bagisto.shop.layout.head') !!}

</head>


<body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif style="scroll-behavior: smooth;">

    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>

    {!! view_render_event('bagisto.shop.layout.body.before') !!}

    <div id="app">
        <flash-wrapper ref='flashes'></flash-wrapper>

        <div class="main-container-wrapper">

            {!! view_render_event('bagisto.shop.layout.header.before') !!}

            @include('shop::layouts.header.index')

            {!! view_render_event('bagisto.shop.layout.header.after') !!}

            @yield('slider')

            <div class="content-container">

                {!! view_render_event('bagisto.shop.layout.content.before') !!}

                @yield('content-wrapper')

                {!! view_render_event('bagisto.shop.layout.content.after') !!}

            </div>

        </div>

        {!! view_render_event('bagisto.shop.layout.footer.before') !!}

        @include('shop::layouts.footer.footer')

        {!! view_render_event('bagisto.shop.layout.footer.after') !!}

        <div class="footer-bottom">
            <p>
                @if (core()->getConfigData('general.content.footer.footer_content'))
                    {{ core()->getConfigData('general.content.footer.footer_content') }}
                @else
                    {{ trans('admin::app.footer.copy-right') }}
                @endif
            </p>
        </div>

    </div>

    <script type="text/javascript">
        window.flashMessages = [];

        @if ($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
        @elseif ($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif ($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }
            ];
        @elseif ($info = session('info'))
            window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }
            ];
        @endif

        window.serverErrors = [];
        @if(isset($errors))
            @if (count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        @endif
    </script>

    <script type="text/javascript" src="{{ bagisto_asset('js/shop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- / Core JavaScript -->

    <!-- preloader -->
    <script src="/assets/js/preloader.js"></script>
    <!-- / preloader -->

    <!-- gallery Script -->
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
    <!-- / gallery Script -->

    <!-- Owl Carousel -->
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script>
    $('#product-slider').owlCarousel({
        loop:false,
        margin:10,
        smartSpeed: 1000,
        nav:true,
        dots:true,
        navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"],
        items:1,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    })
    </script>

    <script>
    $('#product-slider-2').owlCarousel({
        loop:false,
        margin:10,
        smartSpeed: 1000,
        nav:true,
        dots:true,
        navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"],
        items:1,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    })
    </script>

    <script>
    $('#product-slider-3').owlCarousel({
        loop:false,
        margin:10,
        smartSpeed: 1000,
        nav:true,
        dots:true,
        navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"],
        items:1,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    })
    </script>

    <script>
    $('#clients-carousel').owlCarousel({
        loop:true,
        margin:100,
        dots: false,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
    </script>
    @stack('scripts')

    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    <div class="modal-overlay"></div>

    <script type="text/javascript">
            $(document).scroll(function(){
                var mainHeaderTop = $("#main-header-top").offset();
                var w = $(window);
                $("#bg-holder").css("top",mainHeaderTop.top-w.scrollTop());

                var headerBottom = $("#header-bottom").offset();
                var w = $(window);
                $("#hdrbtn-bgholder").css("top",headerBottom.top-w.scrollTop());
            });
    </script>
</body>

</html>