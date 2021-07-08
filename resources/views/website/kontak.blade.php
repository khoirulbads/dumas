<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">

    <title>Dumas | Hubungi Kami </title>

  <link rel="apple-touch-icon" href="assets/back/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/login.png">
  

    <link rel='stylesheet' href='assets/website/revslider/public/assets/css/settings.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/animation.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/jquery-ui-1.8.24.custom.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/magnific-popup.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/js/plugins/flexslider/flexslider.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/tooltipster.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/parallax.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/supersized.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/odometer-theme-minimal.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/style.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/font-awesome.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/custom-css.css' type='text/css' media='all'>
    <link rel='stylesheet' href='assets/website/css/grid.css' type='text/css' media='all'>


    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway%3A200%2C300%2C400%2C500%2C600%2C700%2C400italic&subset=latin%2Ccyrillic-ext%2Cgreek-ext%2Ccyrillic&ver=5.2.5' type='text/css' media='all'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRaleway:300,400,500,600,700" rel="stylesheet">



</head>

<body data-rsssl="1" class="home page-template page-template-page_f page-template-page_f-php page page-id-3093 woocommerce-no-js">

@php
$setting = DB::select("select * from setting");
$komentar = DB::select("select * from komentar");
$sosmed = DB::select("select * from sosmed");
@endphp

    <input type="hidden" id="pp_enable_reflection" name="pp_enable_reflection" value="">
    <input type="hidden" id="pp_enable_right_click" name="pp_enable_right_click" value="">
    <input type="hidden" id="pp_enable_dragging" name="pp_enable_dragging" value="">
    <input type="hidden" id="pp_gallery_auto_info" name="pp_gallery_auto_info" value="">
    <input type="hidden" id="pp_image_path" name="pp_image_path" value="images/">
    <input type="hidden" id="pp_homepage_url" name="pp_homepage_url" value="index.html">
    <input type="hidden" id="pp_blog_ajax_search" name="pp_blog_ajax_search" value="">
    <input type="hidden" id="pp_fixed_menu" name="pp_fixed_menu" value="">
    <input type="hidden" id="pp_topbar" name="pp_topbar" value="">

    <input type="hidden" id="pp_footer_style" name="pp_footer_style" value="4">

    <!-- Begin mobile menu -->
    <div class="mobile_menu_wrapper">
        <a id="close_mobile_menu" href="#"><i class="fa fa-times-circle"></i></a>
        <div class="menu-main-menu-container">
            <ul id="mobile_main_menu" class="mobile_main_nav">
            	<li class="menu-item"><a href="{{ url('/')}}">Beranda</a></li>
                <li class="menu-item"><a href="{{ url('/tentang')}}">Apa itu Dumas??</a></li>
                <li class="menu-item"><a href="{{ url('/kontak')}}">Hubungi Kami</a></li>
                <li class="menu-item"><a href="{{ url('/auth')}}">MASUK</li>
                <li>
                    @foreach ($setting as $data)
                    <a href="https://api.whatsapp.com/send?phone=62{{$data->NO_PONSEL}}">
                        <div class="header_action">
                                <i class="fa fa-whatsapp"></i>
                            0{{$data->NO_PONSEL}}
                        </div>
                    </a>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
    <!-- End mobile menu -->

    <!-- Begin template wrapper -->
    <div id="wrapper">

        <div class="header_style_wrapper">

            <div class="top_bar  hasbg ">

                <div id="mobile_nav_icon"></div>

                <div id="menu_wrapper">

                    <!-- Begin logo -->

                    <a id="custom_logo" class="logo_wrapper hidden" href="/">
                        <img src="assets/website/images/newlogo1.png" alt="" width="69" height="33">
                    </a>
                    <a id="custom_logo_transparent" class="logo_wrapper default" href="/">
                        <img src="assets/website/images/newlogo1.png" alt="" width="50" height="50">
                    </a>
                    <!-- End logo -->
                    <a href="/auth">
                        <div class="header_action">
                            MASUK 
                        </div>
                    </a>
                    @foreach ($setting as $data)
                    <a href="https://api.whatsapp.com/send?phone=62{{$data->NO_PONSEL}}">
                        <div class="header_action">
                                <i class="fa fa-whatsapp"></i>
                            0{{$data->NO_PONSEL}}
                        </div>
                    </a>
                    @endforeach
                    

                    <!-- Begin main nav -->
                    <div id="nav_wrapper">
                        <div class="nav_wrapper_inner">
                            <div id="menu_border_wrapper">
                                <div class="menu-main-menu-container">
                                    <ul id="main_menu" class="nav">
            							<li class="menu-item"><a href="/">Beranda</a></li>
                                        <li class="menu-item"><a href="/tentang">Apa itu Dumas??</a></li>
            							<li class="menu-item"><a href="/kontak">Hubungi Kami</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End main nav -->

                </div>
            </div>
        </div>



        <div id="page_caption" class="hasbg parallax  " data-image="assets/website/upload/biru2.jpg" data-width="1600" data-height="1200">
            <div class="page_title_wrapper">
                <h1>Hubungi Kami</h1>
                <div id="crumbs"><a href="index.html"></a>  <span class="current"></span></div>
            </div>
            <div class="parallax_overlay_header"></div>
        </div>

        <!-- Begin content -->
        <div id="page_content_wrapper" class="hasbg ">
            <div class="inner">
                @foreach ($setting as $set)
                <div class="inner_wrapper">

                    <div class="sidebar_content full_width">

                        <div class="one_third">

                            <h4>Hubungi Kami</h4>
                            {{$set->HUBUNGI}}
                        </div>

                        <div class="one_third center">

                            <h4>Alamat</h4>
                            <p>+62{{$set->NO_PONSEL}}</p>
                            <p>{{$set->EMAIL}}</p>
                            <p>{{$set->ALAMAT}}</p>

                            <br>
                            <br>
                            <div class="contact_social">
                                <div class="social_wrapper shortcode dark ">
                                   
                                </div>
                            </div>

                        </div>

                        <div class="one_third last">
                            <h4>Kritik & Saran</h4>


                            <form class="quform" action="{{ url('/add-saran')}}" method="post" enctype="multipart/form-data" onclick="">
                                {{ csrf_field() }}
                                <div class="quform-elements">
                                    <div class="quform-element">
                                        <p>

                                            <span class="wpcf7-form-control-wrap your-name">
                                                <input id="name" type="text" name="nama" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Susanto San">
                                            </span> 
                                        </p>
                                    </div>
                                    <div class="quform-element">
                                        <p>

                                            <span class="wpcf7-form-control-wrap your-email">
                                                <input id="email" type="text" name="email" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="example@example.com">
                                            </span> 
                                        </p>
                                    </div>
                                    <div class="quform-element">
                                        <p>

                                            <span class="wpcf7-form-control-wrap your-message">
                                                <textarea  id="message" name="isi" cols="40" rows="10" class="input1" aria-invalid="false" placeholder="Kritik & Saran Anda"></textarea>
                                            </span>
                                        </p>
                                    </div>
                                    <p>
                                        <!-- Begin Submit button -->
                                        <div class="quform-submit">
                                            <div class="quform-submit-inner">
                                                <button type="submit" class="submit-button"><span>Kirim</span></button>
                                            </div>
                                            <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                        </div>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <br class="clear">
        <br>


    </div>

    <div class="footer_bar ">
        <div id="footer" style="background-image: url('assets/img/bgweb.jpg');">
        @foreach ($setting as $data)
            <ul class="sidebar_widget four">
                <li id="text-2" class="widget widget_text">
                    <h2 class="widgettitle"></h2>
                    <div class="textwidget">
                        <div style="text-align:left;margin-top:10px; color:white"><br><br>
                            <img src="https://latbang-bkkbnjatim.com/wp-content/uploads/2020/06/logo-bkkbn-new-normal.png" alt="" width="200" height="200">
                        </div>
                    </div>
                </li>
                
                <li id="text-2" class="widget widget_text">
                    <h2 class="widgettitle">TENTANG KAMI</h2>
                    <div class="textwidget">
                        <div style="text-align:left;margin-top:10px; color:white; text-align:justify;">
                            <div style="margin-top:10px;">{{$data->FOOTER}}
                            </div>
                        </div>
                    </div>
                </li>
                <li id="text-3" class="widget widget_text">
                    <h2 class="widgettitle">Kontak</h2>
                    <div class="textwidget">
                        <ul class="address" style="color:white;">
                            <li><i class="fa fa-map-marker"></i>{{$data->ALAMAT}}</li>
                            <li><i class="fa fa-whatsapp"></i>0{{$data->NO_PONSEL}}</li>
                            <li><i class="fa fa-envelope"></i>{{$data->EMAIL}}</li>
                        </ul>
                    </div>
                </li>
                <li id="text-3" class="widget widget_text">
                    <h2 class="widgettitle">Ikuti Kami </h2>
                    <div class="textwidget">
                    @foreach ($sosmed as $sos)
                        <a href="{{$sos->LINK}}" style="padding-right: 17px;"><i class="{{$sos->LOGO}} fa-2x" style="color:white;"></i></a>
                    @endforeach
                    </div>
                </li>
            </ul>
            @endforeach
            <br class="clear">
        </div>
    </div>

    <script src='assets/website/js/jquery.js'></script>
    <script src='assets/website/js/jquery-migrate.min.js'></script>
    <script src='assets/website/revslider/public/assets/js/jquery.themepunch.tools.min.js'></script>
    <script src='assets/website/revslider/public/assets/js/jquery.themepunch.revolution.min.js'></script>

    <script src="assets/website/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/website/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/website/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/website/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/website/revslider/public/assets/js/extensions/revolution.extension.parallax.min.js"></script>  
    <script src="assets/website/revslider/public/assets/js/extensions/revolution.extension.actions.min.js"></script> 
    <script src="assets/website/revslider/public/assets/js/extensions/revolution.extension.video.min.js"></script>
    <script>
        function setREVStartSize(e) {
            try {
                e.c = jQuery(e.c);
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c) jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                        }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        };
    </script>

    <script>
        function revslider_showDoubleJqueryError(sliderID) {
            var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
            errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
            errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
            errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
            errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
            jQuery(sliderID).show().html(errorMessage);
        }
    </script>

    <script src='assets/website/js/plugins/parallax.min.js'></script>
    <script src='assets/website/js/plugins/jquery.easing.js'></script>
    <script src='assets/website/js/plugins/jquery.magnific-popup.js'></script>
    <script src='assets/website/js/plugins/waypoints.min.js'></script>
    <script src='assets/website/js/plugins/jquery.isotope.js'></script>
    <script src='assets/website/js/plugins/jquery.masory.js'></script>
    <script src='assets/website/js/plugins/jquery.tooltipster.min.js'></script>
	<script src='assets/website/js/plugins/custom_plugins.js'></script>
	<script src='assets/website/js/plugins/custom.js'></script>
	<script src='assets/website/js/ui/core.min.js'></script>
	<script src='assets/website/js/ui/datepicker.min.js'></script>
	<script src='assets/website/js/plugins/custom-date.js'></script>
    <script src='assets/website/js/plugins/flexslider/jquery.flexslider-min.js'></script>
    <script src='assets/website/js/plugins/script-plugins.js'></script>
    <script src='assets/website/js/plugins/odometer.min.js'></script>
    <script src='assets/website/js/plugins/script-plugins.js'></script>

    <script>
        var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
        var htmlDivCss = "";
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement("div");
            htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
            document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>                
    <script>
        var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
        var htmlDivCss = ".tp-caption.pp_subheader,.pp_subheader{font-size:16px;line-height:30px;font-weight:600;color:rgb(255,255,255);font-style:italic;text-decoration:none;background-color:transparent;border-width:0px 0px 2px 0px;border-color:rgb(255,255,255);border-style:solid;text-transform:uppercase;text-shadow:none}.tp-caption.pp_header,.pp_header{color:#ffffff;background-color:transparent;text-decoration:none;font-size:80px;line-height:114px;font-weight:700;font-family:Raleway;border-width:0px;border-color:rgb(0,0,0);border-style:none;text-shadow:none;text-transform:uppercase}.tp-caption.pp_content,.pp_content{color:#ffffff;background-color:transparent;text-decoration:none;font-size:16px;line-height:26px;font-weight:500;font-family:Raleway;border-width:0px;border-color:rgb(0,0,0);border-style:none;text-shadow:none}";
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement("div");
            htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
            document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>
    <script>
        if (setREVStartSize !== undefined) setREVStartSize({
            c: '#rev_slider_1_1',
            gridwidth: [960],
            gridheight: [868],
            sliderLayout: 'fullscreen',
            fullScreenAutoWidth: 'off',
            fullScreenAlignForce: 'off',
            fullScreenOffsetContainer: '',
            fullScreenOffset: ''
        });

        var revapi1,
            tpj;
        (function() {
            if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
            else onLoad();

            function onLoad() {
                if (tpj === undefined) {
                    tpj = jQuery;
                    if ("on" == "on") tpj.noConflict();
                }
                if (tpj("#rev_slider_1_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_1_1");
                } else {
                    revapi1 = tpj("#rev_slider_1_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "assets/website/revslider/public/assets/js/",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "on",
                            touch: {
                                touchenabled: "on",
                                touchOnDesktop: "off",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "gyges",
                                enable: true,
                                hide_onmobile: false,
                                hide_onleave: false,
                                tmp: '',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 20,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 20,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: false,
                                style: "uranus",
                                hide_onleave: false,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 20,
                                space: 5,
                                tmp: '<span class="tp-bullet-inner"></span>'
                            }
                        },
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: 960,
                        gridheight: 868,
                        lazyType: "none",
                        shadow: 0,
                        spinner: "spinner2",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenAutoWidth: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "",
                        fullScreenOffset: "",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }; /* END OF revapi call */

            }; /* END OF ON LOAD FUNCTION */
        }()); /* END OF WRAPPING FUNCTION */
    </script>
    <script>
        var htmlDivCss = ' #rev_slider_1_1_wrapper .tp-loader.spinner2{ background-color: #ffffff !important; } ';
        var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement('div');
            htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
            document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>
    <script>
        var htmlDivCss = unescape("%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%7B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C%200%29%3B%0A%20%20-webkit-transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20background%3Atransparent%3B%0A%20%20width%3A15px%3B%0A%20%20height%3A15px%3B%0A%7D%0A%23rev_slider_1_1%20.uranus%20.tp-bullet.selected%2C%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%3Ahover%20%7B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C1%29%3B%0A%20%20border%3Anone%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background%3Atransparent%3B%0A%7D%0A%0A%23rev_slider_1_1%20.uranus%20.tp-bullet-inner%20%7B%0A%20%20-webkit-transition%3A%20background-color%200.3s%20ease%2C%20-webkit-transform%200.3s%20ease%3B%0A%20%20transition%3A%20background-color%200.3s%20ease%2C%20transform%200.3s%20ease%3B%0A%20%20top%3A%200%3B%0A%20%20left%3A%200%3B%0A%20%20width%3A%20100%25%3B%0A%20%20height%3A%20100%25%3B%0A%20%20outline%3A%20none%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background-color%3A%20rgb%28255%2C%20255%2C%20255%29%3B%0A%20%20background-color%3A%20rgba%28255%2C%20255%2C%20255%2C%200.3%29%3B%0A%20%20text-indent%3A%20-999em%3B%0A%20%20cursor%3A%20pointer%3B%0A%20%20position%3A%20absolute%3B%0A%7D%0A%0A%23rev_slider_1_1%20.uranus%20.tp-bullet.selected%20.tp-bullet-inner%2C%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%3Ahover%20.tp-bullet-inner%7B%0A%20transform%3A%20scale%280.4%29%3B%0A%20-webkit-transform%3A%20scale%280.4%29%3B%0A%20background-color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%7D%0A");
        var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement('div');
            htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
            document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>



</body>

</html>
