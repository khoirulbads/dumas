<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">

    <title>Dumas | Pengaduan Masyarakat </title>


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
            	<li class="menu-item"><a href="{{ url('/'}}">Beranda</a></li>
                <li class="menu-item"><a href="{{ url('/tentang'}}">Apa itu Dumas??</a></li>
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

                <div id="mobile_nav_icon">
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
                    
                </div>

                <div id="menu_wrapper">

                    <!-- Begin logo -->

                    <a id="custom_logo" class="logo_wrapper hidden" href="/">
                        <img src="assets/website/images/newlogo1.png" alt="" width="69" height="33">
                    </a>
                    <a id="custom_logo_transparent" class="logo_wrapper default" href="/">
                        <img src="assets/website/images/newlogo1.png" alt="" width="50" height="50">
                    </a>
                    <!-- End logo -->
                    <a href="{{ url('/auth')}}">
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
            							<li class="menu-item"><a href="{{ url('/')}}">Beranda</a></li>
                                        <li class="menu-item"><a href="{{ url('/tentang')}}">Apa itu Dumas??</a></li>
            							<li class="menu-item"><a href="{{ url('/kontak')}}">Hubungi Kami</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End main nav -->

                </div>
            </div>
        </div>

        <div class="page_slider menu_transparent">
            <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-source="gallery" style="background:#000000;padding:0px;">
                <!-- START REVOLUTION SLIDER 5.4.8.3 fullscreen mode -->
                <div id="rev_slider_1_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.3">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-index="rs-1" data-transition="zoomout" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="upload/1600x1200-1-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Pengaduan Masyarakan" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="assets/website/upload/biru2.jpg" alt="" title="1600&#215;1200-1" width="1600" height="1200" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption pp_subheader   tp-resizeme" id="slide-1-layer-1" data-x="center" data-hoffset="" data-y="bottom" data-voffset="300" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":600,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"x:-50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; color: #ffffff; font-family:Open Sans;font-style:italic;border-color:rgb(255,255,255);border-width:0px 0px 2px 0px;"></div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption pp_header   tp-resizeme" id="slide-1-layer-2" data-x="center" data-hoffset="" data-y="bottom" data-voffset="180" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1300,"speed":600,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"x:50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; ">DUMAS </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption pp_content   tp-resizeme" id="slide-1-layer-3" data-x="center" data-hoffset="" data-y="bottom" data-voffset="100" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1600,"speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"y:50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; ">Pengaduan Masyarakat</div>
                        </li>
                    </ul>

                    
                </div>


            </div>
            <!-- END REVOLUTION SLIDER -->
        </div>



        <div class="ppb_wrapper  ">
            <div class="one withsmallpadding ">
                <div class="page_content_wrapper pt20" style="text-align:center">
                    <h2 class="ppb_title">Komentar Pelapor</h2>
                    <br>
                    <div class="testimonial_slider_wrapper">
                        <div class="flexslider" data-height="750">
                            <ul class="slides">
                            @foreach ($komentar as $kom )
                                <li>
                                    <div class="testimonial_slider_wrapper">{{$kom->KOMENTAR}}
                                        <div class="testimonial_slider_meta">
                                            <h6>{{$kom->KOMENTATOR}}</h6>
                                            </div>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="one withsmallpadding withbg fullwidth parallax" style="height:200px;" data-image="assets/website/upload/1600x1200-13.jpg" data-width="1600" data-height="1200">
                <div class="page_content_wrapper"><h1><center>PENGADUAN MASYARAKAT</h1></center></div>
            </div>
            <div class="one withsmallpadding " style="background:#f3f3f3;">
                <div class="page_content_wrapper pt20">
                    <div class="one_fourth">
                        <div class="animate_counter_wrapper"><i class="fa fa-eye"></i>
                            <br>
                            <div id="1584612796597484876" class="odometer" style="font-size:44px;line-height:44px;">12</div>
                            <div class="count_separator"><span></span></div>
                            <div class="counter_subject">Pengunjung</div>
                        </div>
                    </div>
                    <div class="one_fourth">
                        <div class="animate_counter_wrapper"><i class="fa fa-user"></i>
                            <br>
                            <div id="1584612796254376806" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                            <div class="count_separator"><span></span></div>
                            <div class="counter_subject">Pelapor</div>
                        </div>
                    </div>
                    <div class="one_fourth">
                        <div class="animate_counter_wrapper"><i class="fa fa-th-list"></i>
                            <br>
                            <div id="1584612796413307740" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                            <div class="count_separator"><span></span></div>
                            <div class="counter_subject">Laporan Masuk</div>
                        </div>
                    </div>
                    <div class="one_fourth last">
                        <div class="animate_counter_wrapper"><i class="fa fa-check-square-o"></i>
                            <br>
                            <div id="1584612796678726464" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                            <div class="count_separator"><span></span></div>
                            <div class="counter_subject">Laporan direspon</div>
                        </div>
                    </div>
                    <p>
                    </p>
                </div>
            </div>
            
        </div>

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
