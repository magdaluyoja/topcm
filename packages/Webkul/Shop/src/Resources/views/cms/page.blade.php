@extends('shop::layouts.master')

@section('page_title')
    {{ $page->page_title }}
@endsection

@section('head')
    @isset($page->meta_title)
        <meta name="title" content="{{ $page->meta_title }}" />
    @endisset

    @isset($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}" />
    @endisset

    @isset($page->meta_keywords)
        <meta name="keywords" content="{{ $page->meta_keywords }}" />
    @endisset

    <!-- <link href="/themes/default/assets/css/shop.css" rel="stylesheet" /> -->
@endsection


@section('content-wrapper')
    
    @php 
        if(strpos(url()->current(), '/contact-us')){  
    @endphp
    @push('css')
        <style>
                .ck.ck-toolbar{
                    border:2px solid #c8c9c9 !important;
                    border-bottom: 0 !important;
                }
                .ck.ck-editor__editable_inline{
                    border:2px solid #c8c9c9 !important;
                }
        </style>
    @endpush
    <div class="container">
        <header class="contact-header parallax">
            <div class="header-content dark text-center">
                <h1 class="header-title mb-0">CONTACT</h1>
                <p class="inner-space mb-0">Get in touch with Us!</p>
            </div><!-- / header-content -->
        </header>
    </div><!-- / container -->

    <div class="spacer-2x">&nbsp;</div>

    <section id="contact-info">
        <div class="row">
            {!! DbView::make($page)->field('html_content')->render() !!}
        </div><!-- / row --> 
    </section><!-- / contact-info -->

    <div class="spacer-2x">&nbsp;</div>

    <section id="contact" class="bg-white">
        <div class="container w50">
            <h2 class="section-title text-center mb-0">GET IN TOUCH</h2>
            <div class="spacer">&nbsp;</div>
            {{--  <p class="text-center">Quisque et bibendum purus. In non neque nec nisi laoreet rutrum. Vivamus maximus massa sed tellus convallis porta.</p>  --}}
            <div class="spacer">&nbsp;</div>
            <form id="contactForm" method="post" action="{{ route('pages.contactus.send') }}" >
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 sub-col-left">
                        <div class="form-group">
                            <input type="text" class="control form-control" name="full_name"  value="{{ old('full_name') }}" required placeholder="*Fullname">
                            <div class="help-block with-errors">{{ $errors->first('full_name') }}</div>
                        </div>
                    </div><!-- / sub-column -->
                    <div class="col-md-6 sub-col-right">
                        <div class="form-group">
                            <input type="email" class="control form-control" name="email" value="{{ old('email') }}" required placeholder="*Email">
                            <div class="help-block with-errors">{{ $errors->first('email') }}</div>
                        </div>
                    </div><!-- / sub-column -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="control form-control" name="subject"  value="{{ old('subject') }}" required placeholder="*Subject">
                            <div class="help-block with-errors">{{ $errors->first('subject') }}</div>
                        </div>
                    </div><!-- / sub-column -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea id="message" name="message"  value="{{ old('message') }}" rows="10" placeholder="*Message"></textarea>
                            <div class="help-block with-errors text-area">{{ $errors->first('message') }}</div>
                        </div>
                    </div><!-- / sub-column -->
                </div><!-- / row -->

                <div class="text-center">
                    <button type="submit" id="form-submit" class="btn btn-submit btn-primary rectangle"><span>SEND MESSAGE</span></button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div> 
                </div><!-- / text-center -->
            </form><!-- / contactform -->
        </div><!-- / container -->
    </section><!-- / contact -->

    @php 
        }
        elseif(strpos(url()->current(), '/about-us')){  
    @endphp

        @include("shop::cms.aboutus");

    @php 
        }
    @endphp
@endsection

@push('scripts')
    <!-- <script src="/themes/default/assets/js/shop.js" type="text/javascript"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>

    <script>
        if($("#message").length){
            var myeditor; 
            ClassicEditor
            .create( document.querySelector( '#message' ) )
            .then( function(editor) {
                myeditor = editor;
                console.log( editor );
            } )
            .catch( function(error){
                console.error( error );
            } );
        }
        $(document).ready(function(){
            $("#contactForm").submit(function(e){
                const message = $("div.ck.ck-reset.ck-editor.ck-rounded-corners > div.ck.ck-editor__main > div").html();
                var count = $("div.ck.ck-reset.ck-editor.ck-rounded-corners > div.ck.ck-editor__main > div").children().length;
                if($(".ck-placeholder").length || count<2){
                    alert("Please type your message.");
                    e.preventDefault();
                    return;
                }else{
                    $("#message").val(message);
                    $("#contactForm").submit();
                }
            })
            $("body").on("click","div.ck.ck-reset.ck-editor.ck-rounded-corners > div.ck.ck-editor__main > div", function(){
                if($(".ck-placeholder").length){
                    $(".ck-placeholder").remove();
                    $("div.ck.ck-reset.ck-editor.ck-rounded-corners > div.ck.ck-editor__main > div").html("<div class='tmp'><br></div>");
                }
            });
        })
    </script>
@endpush