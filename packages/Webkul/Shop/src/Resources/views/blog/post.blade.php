@extends('shop::layouts.master')

@section('page_title')
    {{$post->title}}
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
@push('css')
    <style type="text/css">
        .row{
            align-items: unset !important;
        }
        .post-title a{
            font-weight: bold !important;
        }
        .post-content i,.post-meta i{
            margin-left: 0 !important;
        }
    </style>
@endpush
@section('head')

    @if (isset($homeSEO))
        @isset($metaTitle)
            <meta name="title" content="{{ $metaTitle }} {{$post->title}}" />
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}  {{$post->title}}" />
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}  {{$post->title}}" />
        @endisset
    @endif
@endsection

@section('content-wrapper')
    <header class="post-header parallax" style="background-image: url({{$thumbnail}});">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0">{{$post->title}}</h1>
            <div class="post-meta inner-space">
                <p class="text-sm"><i class="far fa-clock text-primary ml-3 mr-1"></i> {{ date_format($post->post_date,"F d, Y")}}</p>
            </div><!-- / post-meta -->
        </div><!-- / header-content -->
    </header>

    <section id="posts">
            <div class="row">
                <div class="col-md-8 blog-content">
                    <div class="post-content">
                        <h4>{{$post->title}}</h4>
                        <p class="text-sm"><i class="far fa-clock text-primary ml-3 mr-1"></i> {{ date_format($post->post_date,"F d, Y")}}</p>
                        {!!$post->post_content!!}
                    </div>
                </div><!-- / blog-content -->

                <div class="col-md-4 blog-sidebar">

                    <div class="sidebar-widget">
                        <h4 class="widget-title text-center">RECENT POSTS</h4>
                        <div class="spacer">&nbsp;</div>
                        <div class="post-widget">
                            <ul class="list-unstyled">
                                @php
                                    use Corcel\Model\Post;
                                    use Corcel\Model\Page;
                                    $count = 0;
                                    foreach ($posts as $lipost) {
                                        $post_page = Post::find($lipost->ID);
                                        echo "<li>
                                                <div class='recent-posts first'>
                                                    <div class='recent-post-image'>
                                                        <a href='/posts/".$lipost->ID."'><img src='".$post_page->thumbnail."'></a>
                                                    </div><!-- / recent-post-image -->
                                                    <div class='recent-post-content'>
                                                        <a href='/posts/".$lipost->ID."' class='recent-post-title'>".$lipost->title."</a>
                                                        <p class='text-sm opc-75'><i class='far fa-clock'></i>".date_format($lipost->post_date,"F d, Y")."</p>
                                                    </div><!-- / recent-post-content -->
                                                </div><!-- / recent-posts -->
                                            </li>";
                                        $count++;
                                        if($count >= 5){
                                            break;
                                        }
                                    }
                                @endphp
                            </ul>
                        </div><!-- / post-widget -->
                    </div><!-- / sidebar-widget -->
                </div><!-- / blog-sidebar -->
            </div><!-- / row -->
    </section>
@endsection

@push('scripts')

@endpush