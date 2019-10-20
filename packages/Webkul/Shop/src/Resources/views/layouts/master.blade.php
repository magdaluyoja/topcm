<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title') | TO Persian Carpet Manila</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

    <link href="/themes/default/assets/css/shop.css" rel="stylesheet" />
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
        <link rel="icon" sizes="16x16" href="/favicon.ico" />
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
                {{-- @if (core()->getConfigData('general.content.footer.footer_content'))
                    {{ core()->getConfigData('general.content.footer.footer_content') }}
                @else
                    {{ trans('admin::app.footer.copy-right') }}
                @endif --}}
                © Copyright 2019 TO Persian Carpet Manila, All rights reserved.
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

    <script src="/themes/default/assets/js/shop.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>

    <script src="/assets/js/preloader.js"></script>
    
    <!-- / gallery Script -->

    <!-- Owl Carousel -->
    @stack('scripts')

    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    <div class="modal-overlay"></div>
    <style>
        .div-trustlogo img{
            width:200px;
        }
    </style>
    <div class="div-trustlogo text-center">
        <script type="text/javascript"> 
            //<![CDATA[
                var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
                document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
            //]]>
        </script>
        <script language="JavaScript" type="text/javascript">
            TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_lg_222x54.png", "POSDV", "none");
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
    </div>
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