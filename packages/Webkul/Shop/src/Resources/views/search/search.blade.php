@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.search.page-title') }}
@endsection

@section('content-wrapper')
    @if (! $results)
        {{  __('shop::app.search.no-results') }}
    @endif

    @if ($results)
        <div class="main mb-30" style="min-height: 27vh;">
            @if ($results->isEmpty())
                <div class="search-result-status">
                    <h2>{{ __('shop::app.products.whoops') }}</h2>
                    <span>{{ __('shop::app.search.no-results') }}</span>
                </div>
            @else
                @if ($results->total() == 1)
                    <div class="search-result-status mb-20">
                        <span><b>{{ $results->total() }} </b>{{ __('shop::app.search.found-result') }}</span>
                    </div>
                @else
                    <div class="search-result-status mb-20">
                        <span><b>{{ $results->total() }} </b>{{ __('shop::app.search.found-results') }}</span>
                    </div>
                @endif

                <div class="product-grid-4">
                    @foreach ($results as $productFlat)

                        @include('shop::products.list.card', ['product' => $productFlat->product])

                    @endforeach
                </div>

                @include('ui::datagrid.pagination')
            @endif
        </div>
    @endif
@endsection

@push('scripts')
    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/assets/js/bootstrap.min.js"></script>


    <!-- / Core JavaScript -->

    <!-- preloader -->
    
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
    <script type="text/javascript">
        $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush