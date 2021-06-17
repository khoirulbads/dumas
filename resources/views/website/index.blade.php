<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">

    <title>Dumas | Pengaduan Masyarakat </title>


    <link rel="apple-touch-icon" href="assets/back/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/back/app-assets/images/ico/favicon.ico">
    

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
            	<li class="menu-item"><a href="">Apa itu Dumas??</a></li>
                <li class="menu-item menu-item-has-children menu-item-6"><a href="sample-page.html">Statistik</a></li>
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

                    <a id="custom_logo" class="logo_wrapper hidden" href="index.html">
                        <img src="assets/website/images/newlogo1.png" alt="" width="69" height="33">
                    </a>
                    <a id="custom_logo_transparent" class="logo_wrapper default" href="index.html">
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
            							<li class="menu-item"><a href="index.html">Apa itu Dumas??</a></li>
            							<li class="menu-item"><a href="index.html">Statistik</a></li>
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
                            <img src="assets/website/upload/biru1.jpg" alt="" title="1600&#215;1200-1" width="1600" height="1200" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption pp_subheader   tp-resizeme" id="slide-1-layer-1" data-x="center" data-hoffset="" data-y="bottom" data-voffset="300" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":600,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"x:-50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; color: #ffffff; font-family:Open Sans;font-style:italic;border-color:rgb(255,255,255);border-width:0px 0px 2px 0px;"></div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption pp_header   tp-resizeme" id="slide-1-layer-2" data-x="center" data-hoffset="" data-y="bottom" data-voffset="180" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1300,"speed":600,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"x:50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; ">DUMAS </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption pp_content   tp-resizeme" id="slide-1-layer-3" data-x="center" data-hoffset="" data-y="bottom" data-voffset="100" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1600,"speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"y:50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; ">Pengaduan Masyarakat</div>
                        </li>
                    </ul>

                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div>


            </div>
            <!-- END REVOLUTION SLIDER -->
        </div>



        <div class="ppb_wrapper  ">
         
            <div class="ppb_tour one withpadding " style="border-top:1px solid #e1e1e1;">
                <div class="page_content_wrapper full_width" style="text-align:center">
                    <h2 class="ppb_title">Best Offers</h2>
                    <div class="page_caption_desc pb20">Check out our best promotion tours</div>
                    <div class="portfolio_filter_wrapper three_cols fullwidth shortcode gallery section content clearfix">
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated1">
                                <a href="east-europe.html">
                                    <img src="assets/website/upload/1600x1200-6-560x460.jpg" alt="">
                                </a>
                                <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                                    <div class="thumb_title">
                                        <div class="tour_country">
                                            Turkey
                                        </div>
                                        <h3>Grand Turkey</h3>
                                    </div>
                                    <div class="thumb_meta">
                                        <div class="tour_days">
                                            8 Days
                                        </div>
                                        <div class="tour_price">
                                            $2000
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated2">
                                <a href="east-europe.html">
                                    <img src="assets/website/upload/1600x1200-8-560x460.jpg" alt="">
                                </a>
                                <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                                    <div class="thumb_title">
                                        <div class="tour_country">
                                            Spain
                                        </div>
                                        <h3>Grand Spain Madrid</h3>
                                    </div>
                                    <div class="thumb_meta">
                                        <div class="tour_days">
                                            9 Days
                                        </div>
                                        <div class="tour_price">
                                            $3000
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated3">
                                <a href="east-europe.html">
                                    <img src="assets/website/upload/1600x1200-9-560x460.jpg" alt="">
                                </a>
                                <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                                    <div class="thumb_title">
                                        <div class="tour_country">
                                            Austria, Switzerland
                                        </div>
                                        <h3>Swiss Alps Trip</h3>
                                    </div>
                                    <div class="thumb_meta">
                                        <div class="tour_days">
                                            13 Days
                                        </div>
                                        <div class="tour_price">
                                            $4000
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated4">
                                <a href="east-europe.html">
                                    <img src="assets/website/upload/1600x1200-10-560x460.jpg" alt="">
                                </a>
                                <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                                    <div class="thumb_title">
                                        <div class="tour_country">
                                            Italy
                                        </div>
                                        <h3>Grand Italy</h3>
                                    </div>
                                    <div class="thumb_meta">
                                        <div class="tour_days">
                                            8 Days
                                        </div>
                                        <div class="tour_price">
                                            $3000
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated5">
                                <a href="east-europe.html">
                                    <img src="assets/website/upload/1600x1200-11-560x460.jpg" alt="">
                                </a>
                                <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                                    <div class="thumb_title">
                                        <div class="tour_country">
                                            England, Scotland, Wales
                                        </div>
                                        <h3>UK Trip</h3>
                                    </div>
                                    <div class="thumb_meta">
                                        <div class="tour_days">
                                            13 Days
                                        </div>
                                        <div class="tour_price">
                                            $5000
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated6">
                                <a href="east-europe.html">
                                    <img src="assets/website/upload/1600x1200-12-560x460.jpg" alt="">
                                </a>
                                <div class="tour_sale fullwidth">
                                    <div class="tour_sale_text">Best Deal</div>
                                    25% Off
                                </div>
                                <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                                    <div class="thumb_title">
                                        <div class="tour_country">
                                            Slovenia, Hungary, Czech
                                        </div>
                                        <h3>East Europe</h3>
                                    </div>
                                    <div class="thumb_meta">
                                        <div class="tour_days">
                                            10 Days
                                        </div>
                                        <div class="tour_price">
                                            $3000
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated1">
                                <a href="east-europe.html">
                                    <img src="assets/website/upload/1600x1200-6-560x460.jpg" alt="">
                                </a>
                                <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                                    <div class="thumb_title">
                                        <div class="tour_country">
                                            Turkey
                                        </div>
                                        <h3>Grand Turkey</h3>
                                    </div>
                                    <div class="thumb_meta">
                                        <div class="tour_days">
                                            8 Days
                                        </div>
                                        <div class="tour_price">
                                            $2000
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated2">
                                <a href="east-europe.html">
                                    <img src="assets/website/upload/1600x1200-8-560x460.jpg" alt="">
                                </a>
                                <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                                    <div class="thumb_title">
                                        <div class="tour_country">
                                            Spain
                                        </div>
                                        <h3>Grand Spain Madrid</h3>
                                    </div>
                                    <div class="thumb_meta">
                                        <div class="tour_days">
                                            9 Days
                                        </div>
                                        <div class="tour_price">
                                            $3000
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="one withsmallpadding ">
                <div class="page_content_wrapper pt20" style="text-align:center">
                    <h2 class="ppb_title">What Customers Say</h2>
                    <br>
                    <div class="testimonial_slider_wrapper">
                        <div class="flexslider" data-height="750">
                            <ul class="slides">
                                <li>
                                    <div class="testimonial_slider_wrapper">Vivamus aliquet felis eu diam ultricies congue. Morbi porta lorem nec consectetur porta. Sed quis dui elit. Pellentesque habitant morbi tristique senectus et netus et male.
                                        <div class="testimonial_slider_meta">
                                            <h6>Mark Anthony</h6>
                                            <div class="testimonial_slider_meta_position">CEO</div>-
                                            <div class="testimonial_slider_meta_company"><a href="#" target="_blank">WikiMedia</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial_slider_wrapper">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed vestibulum orci quam. Pellentesque habitant morbi tristique senectus et netus et male.
                                        <div class="testimonial_slider_meta">
                                            <h6>Christina Hardy</h6>
                                            <div class="testimonial_slider_meta_position">Marketing Manager</div>-
                                            <div class="testimonial_slider_meta_company"><a href="#" target="_blank">Red Inc.</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial_slider_wrapper">In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Pellentesque habitant morbi tristique senectus et netus et male.
                                        <div class="testimonial_slider_meta">
                                            <h6>Jane Bennett</h6>
                                            <div class="testimonial_slider_meta_position">Developer</div>-
                                            <div class="testimonial_slider_meta_company"><a href="#" target="_blank">Hubboard Media</a></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="one withsmallpadding withbg fullwidth parallax" style="height:600px;" data-image="assets/website/upload/1600x1200-13.jpg" data-width="1600" data-height="1200">
                <div class="page_content_wrapper"></div>
            </div>
            <div class="one withsmallpadding pt80 pb80">
                <div class="page_content_wrapper">
                    <div style="text-align:center">
                        <h2 class="ppb_title">Lake Geneva Switzerland</h2>
                        <div class="page_caption_desc"></div>
                    </div>
                    <div class="two_third paragraphs">
                        <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ulla.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
                        <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla</p>
                    </div>
                    <div class="one_third last">
                        <blockquote>
                            <i>&#8220;It was fantastic going on the sled to see the views on the mountains! And the action of it – I loved going fast!&#8221;</i>
                        </blockquote>
                    </div>
                    <p>
                    </p>
                </div>
            </div>
            <div class="one withsmallpadding withbg parallax " data-image="assets/website/upload/1600x1200-12.jpg" data-width="1600" data-height="1200">
                <div class="page_content_wrapper pt40" style="text-align:center">
                    <h2 class="ppb_title">Why Choose Us</h2>
                    <div style="height:20px"></div>
                    <br>
                    <div class="service_content_wrapper ">
                        <div class="one_third ">
                            <div class="service_wrapper">
                                <div class="service_icon"><i class="fa fa-star"></i></div>
                                <div class="service_title">
                                    <h3>Handpicked Hotels</h3>
                                    <div class="service_content">Lorem ipsum dolor sit amet, consect adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa
                                        <br>
                                        <br>
                                        <a href="paris.html">learn more</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="one_third ">
                            <div class="service_wrapper">
                                <div class="service_icon"><i class="fa fa-globe"></i></div>
                                <div class="service_title">
                                    <h3>World Class Service</h3>
                                    <div class="service_content">Lorem ipsum dolor sit amet, consect adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa
                                        <br>
                                        <br>
                                        <a href="paris.html">learn more</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="one_third last">
                            <div class="service_wrapper">
                                <div class="service_icon"><i class="fa fa-thumbs-up"></i></div>
                                <div class="service_title">
                                    <h3>Best Price Guarantee</h3>
                                    <div class="service_content">Lorem ipsum dolor sit amet, consect adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa
                                        <br>
                                        <br>
                                        <a href="paris.html">learn more</a></div>
                                </div>
                            </div>
                        </div>
                        <br class="clear">
                        <br>
                    </div>
                    <br class="clear">
                </div>
            </div>
            <div class="one withsmallpadding " style="background:#f3f3f3;">
                <div class="page_content_wrapper pt20">
                    <div class="one_fourth">
                        <div class="animate_counter_wrapper"><i class="fa fa-smile-o"></i>
                            <br>
                            <div id="1584612796597484876" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                            <div class="count_separator"><span></span></div>
                            <div class="counter_subject">Happy Customers</div>
                        </div>
                    </div>
                    <div class="one_fourth">
                        <div class="animate_counter_wrapper"><i class="fa fa-bus"></i>
                            <br>
                            <div id="1584612796254376806" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                            <div class="count_separator"><span></span></div>
                            <div class="counter_subject">Amazing Tours</div>
                        </div>
                    </div>
                    <div class="one_fourth">
                        <div class="animate_counter_wrapper"><i class="fa fa-briefcase"></i>
                            <br>
                            <div id="1584612796413307740" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                            <div class="count_separator"><span></span></div>
                            <div class="counter_subject">In Business</div>
                        </div>
                    </div>
                    <div class="one_fourth last">
                        <div class="animate_counter_wrapper"><i class="fa fa-comments-o"></i>
                            <br>
                            <div id="1584612796678726464" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                            <div class="count_separator"><span></span></div>
                            <div class="counter_subject">Support Cases</div>
                        </div>
                    </div>
                    <p>
                    </p>
                </div>
            </div>
            
        </div>

    </div>

    <div class="footer_bar ">
        <div id="footer" class="">
            <ul class="sidebar_widget four">
                <li id="text-2" class="widget widget_text">
                    <div class="textwidget">
                        <div style="text-align:left;margin-top:10px;">
                            <img src="images/logo@2x_white.png" alt="" style="max-width:100px;">
                            <div style="margin-top:10px;">A Powerful & Beautiful Multi-Purpose WordPress theme with tons of advanced features.
                            </div>
                        </div>
                    </div>
                </li>
                <li id="text-3" class="widget widget_text">
                    <h2 class="widgettitle">Contact Info</h2>
                    <div class="textwidget">
                        <ul class="address">
                            <li><i class="fa fa-map-marker"></i>732/21 Second Street, Manchester, King Street, Kingston United Kingdom</li>
                            <li><i class="fa fa-phone"></i>345-677-554</li>
                            <li><i class="fa fa-mobile"></i>323-678-567</li>
                            <li><i class="fa fa-envelope"></i>info@altairtheme.com</li>
                            <li><i class="fa fa-globe"></i>themegoods.com</li>
                        </ul>
                    </div>
                </li>
                <li id="recent-posts-6" class="widget widget_recent_entries">
                    <h2 class="widgettitle">Recent Posts</h2>
                    <ul>
                        <li>
                            <a href="standard-blog-post-with-image.html">Standard Blog Post With Image</a>
                        </li>
                        <li>
                            <a href="standard-blog-post-with-image.html">Amazing Fullwidth Post</a>
                        </li>
                        <li>
                            <a href="standard-blog-post-with-image.html">Link Post</a>
                        </li>
                        <li>
                            <a href="standard-blog-post-with-image.html">Quote Post</a>
                        </li>
                        <li>
                            <a href="standard-blog-post-with-image.html">Sidebar Post With Slideshow</a>
                        </li>
                    </ul>
                </li>
                <li id="tag_cloud-5" class="widget">
                    <h2 class="widgettitle">Tags</h2>
                    <div class="tagcloud">
                    	<a href="standard-blog-post-with-image.html" class="tag-cloud-link" style="font-size: 13px;">blog</a>
                        <a href="standard-blog-post-with-image.html" class="tag-cloud-link" style="font-size: 13px;">city</a>
                        <a href="standard-blog-post-with-image.html" class="tag-cloud-link" style="font-size: 13px;">Design</a>
                        <a href="standard-blog-post-with-image.html" class="tag-cloud-link" style="font-size: 13px;">landscape</a>
                        <a href="standard-blog-post-with-image.html" class="tag-cloud-link" style="font-size: 13px;">model</a>
                        <a href="standard-blog-post-with-image.html" class="tag-cloud-link" style="font-size: 13px;">portrait</a>
                        <a href="standard-blog-post-with-image.html" class="tag-cloud-link" style="font-size: 13px;">street</a>
                        <a href="standard-blog-post-with-image.html" class="tag-cloud-link" style="font-size: 13px;">street photography</a></div>
                </li>
            </ul>

            <br class="clear">
        </div>

        <div class="footer_bar_wrapper ">
            <div class="social_wrapper">
                <ul>
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="flickr"><a title="Flickr" href="#"><i class="fa fa-flickr"></i></a></li>
                    <li class="youtube"><a title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                    <li class="vimeo"><a title="Vimeo" href="#"><i class="fa fa-vimeo-square"></i></a></li>
                    <li class="google"><a title="Google+" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="pinterest"><a title="Pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li class="instagram"><a title="Instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div id="copyright">© Copyright Altair Template by Max Themes</div>
            <br class="clear">
            <div id="toTop"><i class="fa fa-angle-up"></i></div>
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
