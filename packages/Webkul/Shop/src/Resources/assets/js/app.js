window.jQuery = window.$ = $ = require("jquery");
window.Vue = require("vue");
window.VeeValidate = require("vee-validate");
window.axios = require("axios");
require("./bootstrap");
require("ez-plus/src/jquery.ez-plus.js");

Vue.use(VeeValidate);
Vue.prototype.$http = axios

window.eventBus = new Vue();

Vue.component("image-slider", require("./components/image-slider.vue"));
Vue.component("vue-slider", require("vue-slider-component"));

$(document).ready(function() {
    const app = new Vue({
        el: "#app",

        data: {
            modalIds: {}
        },

        mounted: function() {
            this.addServerErrors();
            this.addFlashMessages();
            if($("#grid").length){
                var $grid = $('#grid'), //locate what we want to sort 
                    $filterOptions = $('.gallery-filter li'), //locate the filter categories
                    $sizer = $grid.find('.shuffle_sizer'), //sizer stores the size of the items

                    init = function() {

                        // None of these need to be executed synchronously
                        setTimeout(function() {
                            listen();
                            setupFilters();
                        }, 100);

                        // instantiate the plugin
                        $grid.shuffle({
                            itemSelector: '[class*="col-"]',
                            sizer: $sizer
                        });
                    },



                    // Set up button clicks
                    setupFilters = function() {
                        var $btns = $filterOptions.children();
                        $btns.on('click', function(e) {
                            e.preventDefault();
                            var $this = $(this),
                                isActive = $this.hasClass('active'),
                                group = isActive ? 'all' : $this.data('group');

                            // Hide current label, show current label in title
                            if (!isActive) {
                                $('.gallery-filter li a').removeClass('active');
                            }

                            $this.toggleClass('active');

                            // Filter elements
                            $grid.shuffle('shuffle', group);
                        });

                        $btns = null;
                    },

                    // Re layout shuffle when images load. This is only needed
                    // below 768 pixels because the .picture-item height is auto and therefore
                    // the height of the picture-item is dependent on the image
                    // I recommend using imagesloaded to determine when an image is loaded
                    // but that doesn't support IE7
                    listen = function() {
                        var debouncedLayout = $.throttle(300, function() {
                            $grid.shuffle('update');
                        });

                        // Get all images inside shuffle
                        $grid.find('img').each(function() {
                            var proxyImage;

                            // Image already loaded
                            if (this.complete && this.naturalWidth !== undefined) {
                                return;
                            }

                            // If none of the checks above matched, simulate loading on detached element.
                            proxyImage = new Image();
                            $(proxyImage).on('load', function() {
                                $(this).off('load');
                                debouncedLayout();
                            });

                            proxyImage.src = this.src;
                        });

                        // Because this method doesn't seem to be perfect.
                        setTimeout(function() {
                            debouncedLayout();
                        }, 500);
                    };

                init();
			}
            if($("#grid2").length){
                var $grid2 = $('#grid2'), //locate what we want to sort 
                    $filterOptions2 = $('.gallery-filter li'), //locate the filter categories
                    $sizer2 = $grid2.find('.shuffle_sizer'), //sizer stores the size of the items

                    init2 = function() {

                        // None of these need to be executed synchronously
                        setTimeout(function() {
                            listen2();
                            setupFilters2();
                        }, 100);

                        // instantiate the plugin
                        $grid2.shuffle({
                            itemSelector: '[class*="col-"]',
                            sizer: $sizer2
                        });
                    },



                    // Set up button clicks
                    setupFilters2 = function() {
                        var $btns2 = $filterOptions2.children();
                        $btns2.on('click', function(e) {
                            e.preventDefault();
                            var $this = $(this),
                                isActive = $this.hasClass('active'),
                                group = isActive ? 'all' : $this.data('group');

                            // Hide current label, show current label in title
                            if (!isActive) {
                                $('.gallery-filter li a').removeClass('active');
                            }

                            $this.toggleClass('active');

                            // Filter elements
                            $grid2.shuffle('shuffle', group);
                        });

                        $btns2 = null;
                    },

                    // Re layout shuffle when images load. This is only needed
                    // below 768 pixels because the .picture-item height is auto and therefore
                    // the height of the picture-item is dependent on the image
                    // I recommend using imagesloaded to determine when an image is loaded
                    // but that doesn't support IE7
                    listen2 = function() {
                        var debouncedLayout = $.throttle(300, function() {
                            $grid2.shuffle('update');
                        });

                        // Get all images inside shuffle
                        $grid2.find('img').each(function() {
                            var proxyImage;

                            // Image already loaded
                            if (this.complete && this.naturalWidth !== undefined) {
                                return;
                            }

                            // If none of the checks above matched, simulate loading on detached element.
                            proxyImage = new Image();
                            $(proxyImage).on('load', function() {
                                $(this).off('load');
                                debouncedLayout();
                            });

                            proxyImage.src = this.src;
                        });

                        // Because this method doesn't seem to be perfect.
                        setTimeout(function() {
                            debouncedLayout();
                        }, 500);
                    };

                init2();
            }
            if($("#grid3").length){
                var $grid3 = $('#grid3'), //locate what we want to sort 
                    $filterOptions3 = $('.gallery-filter li'), //locate the filter categories
                    $sizer3 = $grid3.find('.shuffle_sizer'), //sizer stores the size of the items

                    init3 = function() {

                        // None of these need to be executed synchronously
                        setTimeout(function() {
                            listen3();
                            setupFilters3();
                        }, 100);

                        // instantiate the plugin
                        $grid3.shuffle({
                            itemSelector: '[class*="col-"]',
                            sizer: $sizer3
                        });
                    },



                    // Set up button clicks
                    setupFilters3 = function() {
                        var $btns3 = $filterOptions3.children();
                        $btns3.on('click', function(e) {
                            e.preventDefault();
                            var $this = $(this),
                                isActive = $this.hasClass('active'),
                                group = isActive ? 'all' : $this.data('group');

                            // Hide current label, show current label in title
                            if (!isActive) {
                                $('.gallery-filter li a').removeClass('active');
                            }

                            $this.toggleClass('active');

                            // Filter elements
                            $grid3.shuffle('shuffle', group);
                        });

                        $btns3 = null;
                    },

                    // Re layout shuffle when images load. This is only needed
                    // below 768 pixels because the .picture-item height is auto and therefore
                    // the height of the picture-item is dependent on the image
                    // I recommend using imagesloaded to determine when an image is loaded
                    // but that doesn't support IE7
                    listen3 = function() {
                        var debouncedLayout = $.throttle(300, function() {
                            $grid3.shuffle('update');
                        });

                        // Get all images inside shuffle
                        $grid3.find('img').each(function() {
                            var proxyImage;

                            // Image already loaded
                            if (this.complete && this.naturalWidth !== undefined) {
                                return;
                            }

                            // If none of the checks above matched, simulate loading on detached element.
                            proxyImage = new Image();
                            $(proxyImage).on('load', function() {
                                $(this).off('load');
                                debouncedLayout();
                            });

                            proxyImage.src = this.src;
                        });

                        // Because this method doesn't seem to be perfect.
                        setTimeout(function() {
                            debouncedLayout();
                        }, 500);
                    };

                init3();
            }
            if($("#grid-gallery").length){
                var galleryMenu = "<li><a href='#' data-group='all' class='active ml-2'>SEE ALL</a></li>";
                var gallery = "";
                $(".blocks-gallery-item figure figcaption a").each(function(){
                    var label = $(this).text().toUpperCase();
                    var group = label.replace(" ","");
                    galleryMenu += "<li><a href='#' data-group='"+group+"'>"+label+"</a></li>";
                });
                $("#gallery-menu").html(galleryMenu);

                $(".blocks-gallery-item").each(function(i,val){
                    //console.log(i);
                    console.log($(this));
                    //console.log($(this));
                    var img = $(this)[0].childNodes[0].childNodes[0];
                    var imgSrc = $(img).attr("src");
                    var title = $(this)[0].childNodes[0].childNodes[1];
                    var label = $(title).text().toUpperCase();
                    var group = label.replace(" ","");
                    var link = title.childNodes[0].href.split("?")[1].split("=")[1];
                    gallery += "<li class='col-md-6 col-lg-4 gallery' data-groups='[\""+group+"\"]'>\
                                    <figure class='gallery-item effect-bubba'>\
                                        <img src='"+imgSrc+"' alt='"+label+"'>\
                                        <figcaption>\
                                            <div class='hover-content'>\
                                                <h2 class='hover-title text-center text-white'>"+label+"</h2>\
                                                <p class='gallery-info text-center text-white'>\
                                                    <span class='gallery-icons'>\
                                                        <a href='/gallery/"+link+"' class='gallery-button'><i class='fas fa-link'></i></a>\
                                                    </span>\
                                                </p>\
                                            </div>\
                                        </figcaption>\
                                    </figure>\
                                </li>";    
                })

                $("#grid-gallery").html(gallery);
                $("#mainGalTemp").hide();

                var $gridGallery = $('#grid-gallery'), //locate what we want to sort 
                    $filterOptions = $('.gallery-filter li'), //locate the filter categories
                    $sizer = $gridGallery.find('.shuffle_sizer'), //sizer stores the size of the items

                    initGallery = function() {

                        // None of these need to be executed synchronously
                        setTimeout(function() {
                            listenGallery();
                            setupFiltersGallery();
                        }, 100);

                        // instantiate the plugin
                        $gridGallery.shuffle({
                            itemSelector: '[class*="col-"]',
                            sizer: $sizer
                        });
                    },



                    // Set up button clicks
                    setupFiltersGallery = function() {
                        var $btns = $filterOptions.children();
                        $btns.on('click', function(e) {
                            e.preventDefault();
                            var $this = $(this),
                                isActive = $this.hasClass('active'),
                                group = isActive ? 'all' : $this.data('group');

                            // Hide current label, show current label in title
                            if (!isActive) {
                                $('.gallery-filter li a').removeClass('active');
                            }

                            $this.toggleClass('active');

                            // Filter elements
                            $gridGallery.shuffle('shuffle', group);
                        });

                        $btns = null;
                    },

                    // Re layout shuffle when images load. This is only needed
                    // below 768 pixels because the .picture-item height is auto and therefore
                    // the height of the picture-item is dependent on the image
                    // I recommend using imagesloaded to determine when an image is loaded
                    // but that doesn't support IE7
                    listenGallery = function() {
                        var debouncedLayout = $.throttle(300, function() {
                            $gridGallery.shuffle('update');
                        });

                        // Get all images inside shuffle
                        $gridGallery.find('img').each(function() {
                            var proxyImage;

                            // Image already loaded
                            if (this.complete && this.naturalWidth !== undefined) {
                                return;
                            }

                            // If none of the checks above matched, simulate loading on detached element.
                            proxyImage = new Image();
                            $(proxyImage).on('load', function() {
                                $(this).off('load');
                                debouncedLayout();
                            });

                            proxyImage.src = this.src;
                        });

                        // Because this method doesn't seem to be perfect.
                        setTimeout(function() {
                            debouncedLayout();
                        }, 500);
                    };

                initGallery();
            }
            if($("#grid-gallery-one").length){
                var galleryMenuOne = "<li><a href='#' data-group='all' class='active ml-2'>GALLERY</a></li>";
                var galleryOne = "";
                $(".blocks-gallery-item figure figcaption a").each(function(){
                    var label = $(this).text().toUpperCase();
                    var group = label.replace(" ","");
                    galleryMenuOne += "<li><a href='#' data-group='"+group+"'>"+label+"</a></li>";
                });
                $("#gallery-menu-one").html(galleryMenuOne);

                $(".blocks-gallery-item").each(function(i,val){
                    //console.log(i);
                    console.log($(this));
                    //console.log($(this));
                    var img = $(this)[0].childNodes[0].childNodes[0];
                    var imgSrc = $(img).attr("src");
                    var titleDesc = $(this)[0].childNodes[0].childNodes[1].innerHTML;
                    var title = stripHtml(titleDesc.split("<br>")[0]);
                    var group = title.replace(/ /g, "");;
                    var decription  = titleDesc.split("<br>")[1].replace(/'/g, '"');
                   
                    galleryOne += "<li class='col-md-6 col-lg-4 gallery' data-groups='[\""+group+"\"]'>\
                                    <figure class='gallery-item effect-bubba'>\
                                        <img src='"+imgSrc+"' alt='"+title+"' class='"+group+"'>\
                                        <figcaption>\
                                            <div class='hover-content'>\
                                                <h2 class='hover-title text-center text-white'>"+title+"</h2>\
                                                <p class='gallery-info text-center text-white'>\
                                                    <span class='gallery-icons'>\
                                                        <a href='#' class='gallery-button' data-imgsrc='"+imgSrc+"' data-desc='"+decription+"' data-title='"+title+"'><i class='fas fa-image'></i></a>\
                                                    </span>\
                                                </p>\
                                            </div>\
                                        </figcaption>\
                                    </figure>\
                                </li>";    
                })
                function stripHtml(html)
                {
                var tmp = document.createElement("DIV");
                tmp.innerHTML = html;
                return tmp.textContent || tmp.innerText || "";
                }
                $("#grid-gallery-one").html(galleryOne);
                $("#mainGalTempOne").hide();

                var $gridGalleryOne = $('#grid-gallery-one'), //locate what we want to sort 
                    $filterOptionsOne = $('.gallery-filter li'), //locate the filter categories
                    $sizer = $gridGalleryOne.find('.shuffle_sizer'), //sizer stores the size of the items

                    initGalleryOne = function() {

                        // None of these need to be executed synchronously
                        setTimeout(function() {
                            listenGalleryOne();
                            setupFiltersGalleryOne();
                        }, 100);

                        // instantiate the plugin
                        $gridGalleryOne.shuffle({
                            itemSelector: '[class*="col-"]',
                            sizer: $sizer
                        });
                    },



                    // Set up button clicks
                    setupFiltersGalleryOne = function() {
                        var $btnsOne = $filterOptionsOne.children();
                        $btnsOne.on('click', function(e) {
                            e.preventDefault();
                            var $this = $(this),
                                isActive = $this.hasClass('active'),
                                group = isActive ? 'all' : $this.data('group');

                            // Hide current label, show current label in title
                            if (!isActive) {
                                $('.gallery-filter li a').removeClass('active');
                            }

                            $this.toggleClass('active');

                            // Filter elements
                            $gridGalleryOne.shuffle('shuffle', group);
                        });

                        $btnsOne = null;
                    },

                    // Re layout shuffle when images load. This is only needed
                    // below 768 pixels because the .picture-item height is auto and therefore
                    // the height of the picture-item is dependent on the image
                    // I recommend using imagesloaded to determine when an image is loaded
                    // but that doesn't support IE7
                    listenGalleryOne = function() {
                        var debouncedLayout = $.throttle(300, function() {
                            $gridGalleryOne.shuffle('update');
                        });

                        // Get all images inside shuffle
                        $gridGalleryOne.find('img').each(function() {
                            var proxyImage;

                            // Image already loaded
                            if (this.complete && this.naturalWidth !== undefined) {
                                return;
                            }

                            // If none of the checks above matched, simulate loading on detached element.
                            proxyImage = new Image();
                            $(proxyImage).on('load', function() {
                                $(this).off('load');
                                debouncedLayout();
                            });

                            proxyImage.src = this.src;
                        });

                        // Because this method doesn't seem to be perfect.
                        setTimeout(function() {
                            debouncedLayout();
                        }, 500);
                    };

                initGalleryOne();
            }
        },

        methods: {
            onSubmit: function(e) {
                this.toggleButtonDisable(true);

                if (typeof tinyMCE !== 'undefined')
                    tinyMCE.triggerSave();

                this.$validator.validateAll().then(result => {
                    if (result) {
                        e.target.submit();
                    } else {
                        this.toggleButtonDisable(false);
                    }
                });
            },

            toggleButtonDisable(value) {
                var buttons = document.getElementsByTagName("button");

                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].disabled = value;
                }
            },

            addServerErrors: function(scope = null) {
                for (var key in serverErrors) {
                    var inputNames = [];
                    key.split('.').forEach(function(chunk, index) {
                        if (index) {
                            inputNames.push('[' + chunk + ']')
                        } else {
                            inputNames.push(chunk)
                        }
                    })

                    var inputName = inputNames.join('');

                    const field = this.$validator.fields.find({
                        name: inputName,
                        scope: scope
                    });
                    if (field) {
                        this.$validator.errors.add({
                            id: field.id,
                            field: inputName,
                            msg: serverErrors[key][0],
                            scope: scope
                        });
                    }
                }
            },

            addFlashMessages: function() {
                const flashes = this.$refs.flashes;

                flashMessages.forEach(function(flash) {
                    flashes.addFlash(flash);
                }, this);
            },

            responsiveHeader: function() {},

            showModal(id) {
                this.$set(this.modalIds, id, true);
            }
        }
    });
});