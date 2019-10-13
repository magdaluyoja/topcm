@extends('shop::layouts.master')

@section('page_title')
    Posts
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
        .post-meta i{
            margin-left: 0 !important;
        }
    </style>
@endpush
@section('head')

    @if (isset($homeSEO))
        @isset($metaTitle)
            <meta name="title" content="{{ $metaTitle }} Posts and Blogs" />
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}  Posts and Blogs" />
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}  Posts, Blogs" />
        @endisset
    @endif
@endsection

@section('content-wrapper')
    <header class="home-header parallax">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0" id="parallaxTitle">Blogs</h1>
            <p class="inner-space mb-0" id="parallaxDesc">Latest News and Updates</p>
        </div><!-- / header-content -->
    </header>

    <section id="posts">
            <div class="row">
                <div class="col-md-8 blog-content">
                    @php
                        use Corcel\Model\Post;
                        use Corcel\Model\Page;
                        foreach ($posts as $post) {
                            $post_page = Post::find($post->ID);
                            echo "<div class='blog block'>
                                    <a href='/posts/".$post->ID."'><img src='".$post_page->thumbnail."'></a>
                                    <div class='post-content'>
                                        <div class='post-meta'>
                                            <p class='text-sm'><i class='far fa-clock text-primary ml-3 mr-1'></i> ".date_format($post->post_date,"F d, Y")."</p>
                                        </div>
                                        <h4 class='post-title'><a href='/posts/".$post->ID."'>".$post->title."</a></h4>
                                        <p class='mb-3'>".$post->post_excerpt."...</p>
                                    </div>
                                </div>
                                <div class='spacer'>&nbsp;</div>";
                        }
                    @endphp
                    {{ $posts->links() }}
                </div><!-- / blog-content -->

                <div class="col-md-4 blog-sidebar">

                    <div class="sidebar-widget">
                        <h4 class="widget-title text-center">RECENT POSTS</h4>
                        <div class="spacer">&nbsp;</div>
                        <div class="post-widget">
                            <ul class="list-unstyled">
                                @php
                                    $count = 0;
                                    foreach ($posts as $post) {
                                        $post_page = Post::find($post->ID);
                                        echo "<li>
                                                <div class='recent-posts first'>
                                                    <div class='recent-post-image'>
                                                        <a href='/posts/".$post->ID."'><img src='".$post_page->thumbnail."'></a>
                                                    </div><!-- / recent-post-image -->
                                                    <div class='recent-post-content'>
                                                        <a href='/posts/".$post->ID."' class='recent-post-title'>".$post->title."</a>
                                                        <p class='text-sm opc-75'><i class='far fa-clock'></i>".date_format($post->post_date,"F d, Y")."</p>
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

{{--                     <div class="sidebar-widget">
                        <h4 class="widget-title text-center pb-2">TAGS</h4>
                        <div class="tag-cloud">
                            <a href="#x" class="btn btn-sm btn-black rectangle mt-1">#design</a>
                            <a href="#x" class="btn btn-sm btn-black rectangle mt-1">#photography</a>
                            <a href="#x" class="btn btn-sm btn-black rectangle mt-1">#videography</a>
                            <a href="#x" class="btn btn-sm btn-black rectangle mt-1">#paintings</a>
                            <a href="#x" class="btn btn-sm btn-black rectangle mt-1">#photo</a>
                            <a href="#x" class="btn btn-sm btn-black rectangle mt-1">#art</a>
                            <a href="#x" class="btn btn-sm btn-black rectangle mt-1">#travel</a>
                        </div><!-- / tag-cloud -->
                        <!-- / tags-widget --> --}}
                    </div><!-- / sidebar-widget -->
                </div><!-- / blog-sidebar -->
            </div><!-- / row -->
    </section>
@endsection

@push('scripts')

@endpush