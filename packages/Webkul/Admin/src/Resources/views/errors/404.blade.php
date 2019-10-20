@extends(auth()->guard('admin')->check() ? 'admin::layouts.master' : 'shop::layouts.master')

@section('page_title')
    {{ __('admin::app.error.404.page-title') }}
@stop

@section('content-wrapper')
    <div class="error-container" style="padding: 40px; width: 100%; display: flex; justify-content: center;">

        <div class="wrapper" style="display: flex; height: 60vh; width: 100%;
            justify-content: start; align-items: center;">

            <div class="error-box"  style="width: 50%">

                <div class="error-title" style="font-size: 100px;color: #5E5E5E">
                    {{ __('admin::app.error.404.name') }}
                </div>

                <div class="error-messgae" style="font-size: 24px;color: #5E5E5E; margin-top: 40px;">
                    {{ __('admin::app.error.404.title') }}
                </div>

                <div class="error-description" style="margin-top: 20px;margin-bottom: 20px;color: #242424">
                    {{ __('admin::app.error.404.message') }}
                </div>

                <a href="{{ route('admin.dashboard.index') }}">
                    {{ __('admin::app.error.go-to-home') }}
                </a>

            </div>

            <div class="error-graphic icon-404" style="margin-left: 10% ;"></div>

        </div>

    </div>
@stop
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