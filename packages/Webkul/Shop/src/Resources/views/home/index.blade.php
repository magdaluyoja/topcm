@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.home.page-title') }}
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

@endsection

@push('scripts')
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