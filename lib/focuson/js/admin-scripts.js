( function($) {

    $('.ninzio-upload').each(function(){

            "use strict";

            var custom_uploader;
            var $this   = $(this);
            var upload  = $this.find('.ninzio-button-upload');
            var path    = $this.find('.ninzio-upload-path');
            var preview = $this.find('.ninzio-preview-upload');
            var pattern = $this.find('.ninzio-pattern-preview');
            var remove  = $this.find('.ninzio-button-remove');

            upload.click(function(e) {
                e.preventDefault();

                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }

                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Upload background image',
                    button: {
                        text: 'Upload background image'
                    },
                    multiple: false
                });

                custom_uploader.on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    path.val(attachment.url);
                    preview.attr('src',attachment.url).show(0);
                    pattern.css({
                        'background-image':'url('+attachment.url+')',
                        'height':'200px',
                        'margin':'15px 0'
                    });
                });

                custom_uploader.open();
            });

            remove.click(function(e){
                e.preventDefault();
                path.val("");
                preview.attr('src',"").hide(0);
                pattern.attr('style',"");
            });

            if (path.val()) {
                pattern.css({
                    'background-image':'url('+path.val()+')',
                    'height':'200px',
                    'margin':'15px 0'
                });
                preview.show(0);
            }
    })

})(jQuery);

(function($){

    "use strict";

    // Accordion
    var accordionTitle = $('.ninzio-accordion-container > .ninzio-accordion-title');

        accordionTitle.on('click', function(){
            var $this      = $(this),
                index      = $('.ninzio-ui').index(this),
                layerIndex = $('.ninzio-hidden').eq(index);

            if(!$this.hasClass('active')){
                $this.addClass('active');
                $this.next('.ninzio-accordion-content').slideUp(0, function(){
                    if($this.hasClass('ninzio-ui')){
                        layerIndex.val('active');
                    }
                });
            } else if ($this.hasClass('active')){
                $this.removeClass('active');
                $this.next('.ninzio-accordion-content').slideDown(0, function(){
                    if($this.hasClass('ninzio-ui')){
                        layerIndex.val('');
                    }
                }); 
            }
        });

})(jQuery);

(function($){

    "use strict";
    
    $('.ninzio-color-picker').wpColorPicker();

    $('.delay').spinner({
        min:0,
        step: 50
    });

    $('.duration').spinner({
        min:0,
        step: 50
    });

    $('.zindex').spinner({
        min:1,
        max:98
    });

    $('.speed').spinner({
        min:0,
        step: 5,
        max:100
    });

})(jQuery);

( function($) {

    "use strict";

    $('.ninzio-slider-excrepts')
    .sortable({
        axis: 'y',
        placeholder: 'ui-state-highlight',
        forcePlaceholderSize: true,
        update: function(event, ui) {
            var theOrder = $(this).sortable('toArray');
            var data = {
                action: 'focuson_ninzio_update_post_order',
                postType: $(this).attr('data-post-type'),
                order: theOrder
            };
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: data,
                success: function(){
                    $(".ninzio-success").show();
                },
                error: function(){
                    $(".ninzio-error").show();
                }
            })
        }
    })
    .disableSelection();

})(jQuery);

( function($) {

    "use strict";

    var ninzioPostFormatOptions = $('#ninzio-post-format-options');
    var postFormatInput         = $("#post-formats-select input.post-format");
    var featuredImages          = $('#post-feature-image-2, #post-feature-image-3, #post-feature-image-4, #post-feature-image-5');
    var defaultFeaturedImage    = $('#postimagediv');
    var editor                  = $('#postdivrich');
    var postFeatureMedia        = $('#ninzio-post-featured-media');

    function switchPostFormatOptions(target){

        ninzioPostFormatOptions.show();
        var ninzioPostOption = ninzioPostFormatOptions.find('#ninzio-'+target.attr("id")).show();

        if(target.val() == 'gallery'){
            featuredImages.show();
        } else {
            featuredImages.hide();
        }

        ninzioPostFormatOptions.find('.ninzio-post-option').not(ninzioPostOption).hide();

    }

    postFormatInput.each(function(){

        var $this = $(this);

        $this.on('click', function(){
            if ($this.val() == "video" || $this.val() == "audio") {
                postFeatureMedia.hide();
            } else {
                postFeatureMedia.show();
            }
            switchPostFormatOptions($this);
        });

        if($this.is(":checked")){
            switchPostFormatOptions($this);
            if ($this.val() == "video" || $this.val() == "audio") {
                postFeatureMedia.hide();
            } else {
                postFeatureMedia.show();
            }
        }

    });

})(jQuery);

( function($) {

    "use strict";

    var sidebarPos  = $('#ninzio-page-options .sidebar-pos'),
        sidebar     = $('#ninzio-page-options select[name="sidebar"]'),
        blank       = $('input[name="blank"]'),
        headerstuck = $('.header-stuck');

    if (blank.attr("value") == "true" && blank.is(":checked")) {
        headerstuck.hide();
    } else {
        headerstuck.show();
    }

    blank.on("click",function(){
       if (blank.attr("value") == "true" && blank.is(":checked")) {
            headerstuck.hide();
        } else {
            headerstuck.show();
        }
    });

    if ( sidebar.val() == "none") {sidebarPos.hide();};

    sidebar.on("change",function(){
        if ($(this).val() == "none") {
            sidebarPos.hide();
        } else {
            sidebarPos.show();
        }
    });

})(jQuery);

( function($) {

    "use strict";

    var mmo = $('.megamenu-options');

    mmo.each(function(){

        var $this = $(this),
            mms   = $this.find('.mms select'),
            mmc   = $this.find('.mmc'),
            mmb   = $this.find('.mmb');
           
        if ( mms.val() == "true") {
            mmc.show();mmb.show();
        }

        mms.on("change",function(){
            if ($(this).val() == "false") {
                mmc.hide();mmb.hide();
            } else {
                mmc.show();mmb.show();
            }
        });

    });

})(jQuery);
