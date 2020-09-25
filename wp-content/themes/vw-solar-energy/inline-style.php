<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_solar_energy_first_color = get_theme_mod('vw_solar_energy_first_color');

	$vw_solar_energy_custom_css = '';

	if($vw_solar_energy_first_color != false){
		$vw_solar_energy_custom_css .='.page-template-custom-home-page .search-box i, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .more-btn a, .about-btn a, #footer input[type="submit"], #footer .tagcloud a:hover, #sidebar .custom-social-icons i, #footer .custom-social-icons i, .scrollup i, #footer-2, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .logo, .home-page-header, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .content-bttn a, .pagination span, .pagination a, .error-btn a, .header-fixed, input[type="submit"], #comments a.comment-reply-link, .page-template-custom-home-page .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a{';
			$vw_solar_energy_custom_css .='background-color: '.esc_html($vw_solar_energy_first_color).';';
		$vw_solar_energy_custom_css .='}';
	}
	if($vw_solar_energy_first_color != false){
		$vw_solar_energy_custom_css .='#comments input[type="submit"].submit{';
			$vw_solar_energy_custom_css .='background-color: '.esc_html($vw_solar_energy_first_color).'!important;';
		$vw_solar_energy_custom_css .='}';
	}
	if($vw_solar_energy_first_color != false){
		$vw_solar_energy_custom_css .='a, #topbar i, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .post-main-box:hover h2 a, .entry-content a, .page-template-custom-home-page #header .main-navigation ul li a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$vw_solar_energy_custom_css .='color: '.esc_html($vw_solar_energy_first_color).';';
		$vw_solar_energy_custom_css .='}';
	}
	if($vw_solar_energy_first_color != false){
		$vw_solar_energy_custom_css .='.custom-social-icons i:hover,#footer li a:hover{';
			$vw_solar_energy_custom_css .='color: '.esc_html($vw_solar_energy_first_color).'!important;';
		$vw_solar_energy_custom_css .='}';
	}
	if($vw_solar_energy_first_color != false){
		$vw_solar_energy_custom_css .='.sec-image{';
			$vw_solar_energy_custom_css .='border-color: '.esc_html($vw_solar_energy_first_color).'!important;';
		$vw_solar_energy_custom_css .='}';
	}
	if($vw_solar_energy_first_color != false){
		$vw_solar_energy_custom_css .='.logo:after, .post-info hr, .main-navigation ul ul{';
			$vw_solar_energy_custom_css .='border-top-color: '.esc_html($vw_solar_energy_first_color).';';
		$vw_solar_energy_custom_css .='}';
	}
	if($vw_solar_energy_first_color != false){
		$vw_solar_energy_custom_css .='.main-navigation ul ul, .page-template-custom-home-page .header-fixed {';
			$vw_solar_energy_custom_css .='border-bottom-color: '.esc_html($vw_solar_energy_first_color).';';
		$vw_solar_energy_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_solar_energy_theme_lay = get_theme_mod( 'vw_solar_energy_width_option','Full Width');
    if($vw_solar_energy_theme_lay == 'Boxed'){
		$vw_solar_energy_custom_css .='body{';
			$vw_solar_energy_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_solar_energy_custom_css .='}';
	}else if($vw_solar_energy_theme_lay == 'Wide Width'){
		$vw_solar_energy_custom_css .='body{';
			$vw_solar_energy_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_solar_energy_custom_css .='}';
	}else if($vw_solar_energy_theme_lay == 'Full Width'){
		$vw_solar_energy_custom_css .='body{';
			$vw_solar_energy_custom_css .='max-width: 100%;';
		$vw_solar_energy_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_solar_energy_theme_lay = get_theme_mod( 'vw_solar_energy_slider_opacity_color','0.5');
	if($vw_solar_energy_theme_lay == '0'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.1'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.1';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.2'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.2';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.3'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.3';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.4'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.4';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.5'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.5';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.6'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.6';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.7'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.7';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.8'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.8';
		$vw_solar_energy_custom_css .='}';
		}else if($vw_solar_energy_theme_lay == '0.9'){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='opacity:0.9';
		$vw_solar_energy_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_solar_energy_theme_lay = get_theme_mod( 'vw_solar_energy_slider_content_option','Right');
    if($vw_solar_energy_theme_lay == 'Left'){
		$vw_solar_energy_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_solar_energy_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_solar_energy_custom_css .='}';
	}else if($vw_solar_energy_theme_lay == 'Center'){
		$vw_solar_energy_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_solar_energy_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_solar_energy_custom_css .='}';
	}else if($vw_solar_energy_theme_lay == 'Right'){
		$vw_solar_energy_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_solar_energy_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_solar_energy_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_solar_energy_slider_height = get_theme_mod('vw_solar_energy_slider_height');
	if($vw_solar_energy_slider_height != false){
		$vw_solar_energy_custom_css .='#slider img{';
			$vw_solar_energy_custom_css .='height: '.esc_html($vw_solar_energy_slider_height).';';
		$vw_solar_energy_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_solar_energy_slider = get_theme_mod('vw_solar_energy_slider_hide_show');
	if($vw_solar_energy_slider == false){
		$vw_solar_energy_custom_css .='.page-template-custom-home-page .home-page-header, .page-template-custom-home-page .logo{';
			$vw_solar_energy_custom_css .='background: #9ecc19;';
		$vw_solar_energy_custom_css .='}';
		$vw_solar_energy_custom_css .='.page-template-custom-home-page .logo:after{';
			$vw_solar_energy_custom_css .='border-top: 40px solid #9ecc19;';
		$vw_solar_energy_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_solar_energy_theme_lay = get_theme_mod( 'vw_solar_energy_blog_layout_option','Default');
    if($vw_solar_energy_theme_lay == 'Default'){
		$vw_solar_energy_custom_css .='.post-main-box{';
			$vw_solar_energy_custom_css .='';
		$vw_solar_energy_custom_css .='}';
	}else if($vw_solar_energy_theme_lay == 'Center'){
		$vw_solar_energy_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_solar_energy_custom_css .='text-align:center;';
		$vw_solar_energy_custom_css .='}';
		$vw_solar_energy_custom_css .='.post-info{';
			$vw_solar_energy_custom_css .='margin-top:10px;';
		$vw_solar_energy_custom_css .='}';
		$vw_solar_energy_custom_css .='.post-info hr{';
			$vw_solar_energy_custom_css .='margin:10px auto;';
		$vw_solar_energy_custom_css .='}';
	}else if($vw_solar_energy_theme_lay == 'Left'){
		$vw_solar_energy_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_solar_energy_custom_css .='text-align:Left;';
		$vw_solar_energy_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_solar_energy_resp_topbar = get_theme_mod( 'vw_solar_energy_resp_topbar_hide_show',false);
    if($vw_solar_energy_resp_topbar == true){
    	$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='#topbar{';
			$vw_solar_energy_custom_css .='display:block;';
		$vw_solar_energy_custom_css .='} }';
	}else if($vw_solar_energy_resp_topbar == false){
		$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='#topbar{';
			$vw_solar_energy_custom_css .='display:none;';
		$vw_solar_energy_custom_css .='} }';
	}

	$vw_solar_energy_resp_stickyheader = get_theme_mod( 'vw_solar_energy_stickyheader_hide_show',false);
    if($vw_solar_energy_resp_stickyheader == true){
    	$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='.header-fixed{';
			$vw_solar_energy_custom_css .='display:block;';
		$vw_solar_energy_custom_css .='} }';
	}else if($vw_solar_energy_resp_stickyheader == false){
		$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='.header-fixed{';
			$vw_solar_energy_custom_css .='display:none;';
		$vw_solar_energy_custom_css .='} }';
	}

	$vw_solar_energy_resp_slider = get_theme_mod( 'vw_solar_energy_resp_slider_hide_show',false);
    if($vw_solar_energy_resp_slider == true){
    	$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='#slider{';
			$vw_solar_energy_custom_css .='display:block;';
		$vw_solar_energy_custom_css .='} }';
	}else if($vw_solar_energy_resp_slider == false){
		$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='#slider{';
			$vw_solar_energy_custom_css .='display:none;';
		$vw_solar_energy_custom_css .='} }';
	}

	$vw_solar_energy_resp_metabox = get_theme_mod( 'vw_solar_energy_metabox_hide_show',true);
    if($vw_solar_energy_resp_metabox == true){
    	$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='.post-info{';
			$vw_solar_energy_custom_css .='display:block;';
		$vw_solar_energy_custom_css .='} }';
	}else if($vw_solar_energy_resp_metabox == false){
		$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='.post-info{';
			$vw_solar_energy_custom_css .='display:none;';
		$vw_solar_energy_custom_css .='} }';
	}

	$vw_solar_energy_resp_sidebar = get_theme_mod( 'vw_solar_energy_sidebar_hide_show',true);
    if($vw_solar_energy_resp_sidebar == true){
    	$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='#sidebar{';
			$vw_solar_energy_custom_css .='display:block;';
		$vw_solar_energy_custom_css .='} }';
	}else if($vw_solar_energy_resp_sidebar == false){
		$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='#sidebar{';
			$vw_solar_energy_custom_css .='display:none;';
		$vw_solar_energy_custom_css .='} }';
	}

	$vw_solar_energy_resp_scroll_top = get_theme_mod( 'vw_solar_energy_resp_scroll_top_hide_show',true);
    if($vw_solar_energy_resp_scroll_top == true){
    	$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='.scrollup i{';
			$vw_solar_energy_custom_css .='display:block;';
		$vw_solar_energy_custom_css .='} }';
	}else if($vw_solar_energy_resp_scroll_top == false){
		$vw_solar_energy_custom_css .='@media screen and (max-width:575px) {';
		$vw_solar_energy_custom_css .='.scrollup i{';
			$vw_solar_energy_custom_css .='display:none !important;';
		$vw_solar_energy_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_solar_energy_topbar_padding_top_bottom = get_theme_mod('vw_solar_energy_topbar_padding_top_bottom');
	if($vw_solar_energy_topbar_padding_top_bottom != false){
		$vw_solar_energy_custom_css .='#topbar{';
			$vw_solar_energy_custom_css .='padding-top: '.esc_html($vw_solar_energy_topbar_padding_top_bottom).'; padding-bottom: '.esc_html($vw_solar_energy_topbar_padding_top_bottom).';';
		$vw_solar_energy_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_solar_energy_sticky_header_padding = get_theme_mod('vw_solar_energy_sticky_header_padding');
	if($vw_solar_energy_sticky_header_padding != false){
		$vw_solar_energy_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_solar_energy_custom_css .='padding: '.esc_html($vw_solar_energy_sticky_header_padding).';';
		$vw_solar_energy_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_solar_energy_search_padding_top_bottom = get_theme_mod('vw_solar_energy_search_padding_top_bottom');
	$vw_solar_energy_search_padding_left_right = get_theme_mod('vw_solar_energy_search_padding_left_right');
	$vw_solar_energy_search_font_size = get_theme_mod('vw_solar_energy_search_font_size');
	$vw_solar_energy_search_border_radius = get_theme_mod('vw_solar_energy_search_border_radius');
	if($vw_solar_energy_search_padding_top_bottom != false || $vw_solar_energy_search_padding_left_right != false || $vw_solar_energy_search_font_size != false || $vw_solar_energy_search_border_radius != false){
		$vw_solar_energy_custom_css .='.search-box i{';
			$vw_solar_energy_custom_css .='padding-top: '.esc_html($vw_solar_energy_search_padding_top_bottom).'; padding-bottom: '.esc_html($vw_solar_energy_search_padding_top_bottom).';padding-left: '.esc_html($vw_solar_energy_search_padding_left_right).';padding-right: '.esc_html($vw_solar_energy_search_padding_left_right).';font-size: '.esc_html($vw_solar_energy_search_font_size).';border-radius: '.esc_html($vw_solar_energy_search_border_radius).'px;';
		$vw_solar_energy_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_solar_energy_button_padding_top_bottom = get_theme_mod('vw_solar_energy_button_padding_top_bottom');
	$vw_solar_energy_button_padding_left_right = get_theme_mod('vw_solar_energy_button_padding_left_right');
	if($vw_solar_energy_button_padding_top_bottom != false || $vw_solar_energy_button_padding_left_right != false){
		$vw_solar_energy_custom_css .='.content-bttn a{';
			$vw_solar_energy_custom_css .='padding-top: '.esc_html($vw_solar_energy_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_solar_energy_button_padding_top_bottom).';padding-left: '.esc_html($vw_solar_energy_button_padding_left_right).';padding-right: '.esc_html($vw_solar_energy_button_padding_left_right).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_button_border_radius = get_theme_mod('vw_solar_energy_button_border_radius');
	if($vw_solar_energy_button_border_radius != false){
		$vw_solar_energy_custom_css .='.content-bttn a{';
			$vw_solar_energy_custom_css .='border-radius: '.esc_html($vw_solar_energy_button_border_radius).'px;';
		$vw_solar_energy_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_solar_energy_single_blog_post_navigation_show_hide = get_theme_mod('vw_solar_energy_single_blog_post_navigation_show_hide',true);
	if($vw_solar_energy_single_blog_post_navigation_show_hide != true){
		$vw_solar_energy_custom_css .='.post-navigation{';
			$vw_solar_energy_custom_css .='display: none;';
		$vw_solar_energy_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_solar_energy_copyright_alingment = get_theme_mod('vw_solar_energy_copyright_alingment');
	if($vw_solar_energy_copyright_alingment != false){
		$vw_solar_energy_custom_css .='.copyright p{';
			$vw_solar_energy_custom_css .='text-align: '.esc_html($vw_solar_energy_copyright_alingment).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_copyright_padding_top_bottom = get_theme_mod('vw_solar_energy_copyright_padding_top_bottom');
	if($vw_solar_energy_copyright_padding_top_bottom != false){
		$vw_solar_energy_custom_css .='#footer-2{';
			$vw_solar_energy_custom_css .='padding-top: '.esc_html($vw_solar_energy_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_solar_energy_copyright_padding_top_bottom).';';
		$vw_solar_energy_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_solar_energy_scroll_to_top_font_size = get_theme_mod('vw_solar_energy_scroll_to_top_font_size');
	if($vw_solar_energy_scroll_to_top_font_size != false){
		$vw_solar_energy_custom_css .='.scrollup i{';
			$vw_solar_energy_custom_css .='font-size: '.esc_html($vw_solar_energy_scroll_to_top_font_size).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_scroll_to_top_padding = get_theme_mod('vw_solar_energy_scroll_to_top_padding');
	$vw_solar_energy_scroll_to_top_padding = get_theme_mod('vw_solar_energy_scroll_to_top_padding');
	if($vw_solar_energy_scroll_to_top_padding != false){
		$vw_solar_energy_custom_css .='.scrollup i{';
			$vw_solar_energy_custom_css .='padding-top: '.esc_html($vw_solar_energy_scroll_to_top_padding).';padding-bottom: '.esc_html($vw_solar_energy_scroll_to_top_padding).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_scroll_to_top_width = get_theme_mod('vw_solar_energy_scroll_to_top_width');
	if($vw_solar_energy_scroll_to_top_width != false){
		$vw_solar_energy_custom_css .='.scrollup i{';
			$vw_solar_energy_custom_css .='width: '.esc_html($vw_solar_energy_scroll_to_top_width).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_scroll_to_top_height = get_theme_mod('vw_solar_energy_scroll_to_top_height');
	if($vw_solar_energy_scroll_to_top_height != false){
		$vw_solar_energy_custom_css .='.scrollup i{';
			$vw_solar_energy_custom_css .='height: '.esc_html($vw_solar_energy_scroll_to_top_height).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_scroll_to_top_border_radius = get_theme_mod('vw_solar_energy_scroll_to_top_border_radius');
	if($vw_solar_energy_scroll_to_top_border_radius != false){
		$vw_solar_energy_custom_css .='.scrollup i{';
			$vw_solar_energy_custom_css .='border-radius: '.esc_html($vw_solar_energy_scroll_to_top_border_radius).'px;';
		$vw_solar_energy_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_solar_energy_social_icon_font_size = get_theme_mod('vw_solar_energy_social_icon_font_size');
	if($vw_solar_energy_social_icon_font_size != false){
		$vw_solar_energy_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_solar_energy_custom_css .='font-size: '.esc_html($vw_solar_energy_social_icon_font_size).'!important;';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_social_icon_padding = get_theme_mod('vw_solar_energy_social_icon_padding');
	if($vw_solar_energy_social_icon_padding != false){
		$vw_solar_energy_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_solar_energy_custom_css .='padding: '.esc_html($vw_solar_energy_social_icon_padding).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_social_icon_width = get_theme_mod('vw_solar_energy_social_icon_width');
	if($vw_solar_energy_social_icon_width != false){
		$vw_solar_energy_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_solar_energy_custom_css .='width: '.esc_html($vw_solar_energy_social_icon_width).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_social_icon_height = get_theme_mod('vw_solar_energy_social_icon_height');
	if($vw_solar_energy_social_icon_height != false){
		$vw_solar_energy_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_solar_energy_custom_css .='height: '.esc_html($vw_solar_energy_social_icon_height).';';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_social_icon_border_radius = get_theme_mod('vw_solar_energy_social_icon_border_radius');
	if($vw_solar_energy_social_icon_border_radius != false){
		$vw_solar_energy_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_solar_energy_custom_css .='border-radius: '.esc_html($vw_solar_energy_social_icon_border_radius).'px;';
		$vw_solar_energy_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_solar_energy_products_padding_top_bottom = get_theme_mod('vw_solar_energy_products_padding_top_bottom');
	if($vw_solar_energy_products_padding_top_bottom != false){
		$vw_solar_energy_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_solar_energy_custom_css .='padding-top: '.esc_html($vw_solar_energy_products_padding_top_bottom).'!important; padding-bottom: '.esc_html($vw_solar_energy_products_padding_top_bottom).'!important;';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_products_padding_left_right = get_theme_mod('vw_solar_energy_products_padding_left_right');
	if($vw_solar_energy_products_padding_left_right != false){
		$vw_solar_energy_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_solar_energy_custom_css .='padding-left: '.esc_html($vw_solar_energy_products_padding_left_right).'!important; padding-right: '.esc_html($vw_solar_energy_products_padding_left_right).'!important;';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_products_box_shadow = get_theme_mod('vw_solar_energy_products_box_shadow');
	if($vw_solar_energy_products_box_shadow != false){
		$vw_solar_energy_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_solar_energy_custom_css .='box-shadow: '.esc_html($vw_solar_energy_products_box_shadow).'px '.esc_html($vw_solar_energy_products_box_shadow).'px '.esc_html($vw_solar_energy_products_box_shadow).'px #ddd;';
		$vw_solar_energy_custom_css .='}';
	}

	$vw_solar_energy_products_border_radius = get_theme_mod('vw_solar_energy_products_border_radius');
	if($vw_solar_energy_products_border_radius != false){
		$vw_solar_energy_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_solar_energy_custom_css .='border-radius: '.esc_html($vw_solar_energy_products_border_radius).'px;';
		$vw_solar_energy_custom_css .='}';
	}