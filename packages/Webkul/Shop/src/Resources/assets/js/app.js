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