<?php

    $article_blog_writer_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $article_blog_writer_scroll_position = get_theme_mod( 'article_blog_writer_scroll_top_position','Right');
    if($article_blog_writer_scroll_position == 'Right'){
        $article_blog_writer_theme_css .='#button{';
            $article_blog_writer_theme_css .='right: 20px;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_scroll_position == 'Left'){
        $article_blog_writer_theme_css .='#button{';
            $article_blog_writer_theme_css .='left: 20px;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_scroll_position == 'Center'){
        $article_blog_writer_theme_css .='#button{';
            $article_blog_writer_theme_css .='right: 50%;left: 50%;';
        $article_blog_writer_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $article_blog_writer_footer_widget_heading_alignment = get_theme_mod( 'article_blog_writer_footer_widget_heading_alignment','Left');
    if($article_blog_writer_footer_widget_heading_alignment == 'Left'){
        $article_blog_writer_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $article_blog_writer_theme_css .='text-align: left;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_footer_widget_heading_alignment == 'Center'){
        $article_blog_writer_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $article_blog_writer_theme_css .='text-align: center;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_footer_widget_heading_alignment == 'Right'){
        $article_blog_writer_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $article_blog_writer_theme_css .='text-align: right;';
        $article_blog_writer_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $article_blog_writer_footer_widget_content_alignment = get_theme_mod( 'article_blog_writer_footer_widget_content_alignment','Left');
    if($article_blog_writer_footer_widget_content_alignment == 'Left'){
        $article_blog_writer_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $article_blog_writer_theme_css .='text-align: left;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_footer_widget_content_alignment == 'Center'){
        $article_blog_writer_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $article_blog_writer_theme_css .='text-align: center;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_footer_widget_content_alignment == 'Right'){
        $article_blog_writer_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $article_blog_writer_theme_css .='text-align: right;';
        $article_blog_writer_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $article_blog_writer_copyright_content_alignment = get_theme_mod( 'article_blog_writer_copyright_content_alignment','Center');
    if($article_blog_writer_copyright_content_alignment == 'Left'){
        $article_blog_writer_theme_css .='.footer-menu-left{';
        $article_blog_writer_theme_css .='text-align: left !important;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_copyright_content_alignment == 'Center'){
        $article_blog_writer_theme_css .='.footer-menu-left{';
            $article_blog_writer_theme_css .='text-align: center !important;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_copyright_content_alignment == 'Right'){
        $article_blog_writer_theme_css .='.footer-menu-left{';
            $article_blog_writer_theme_css .='text-align: right !important;';
        $article_blog_writer_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $article_blog_writer_width_option = get_theme_mod( 'article_blog_writer_width_option','Full Width');
    if($article_blog_writer_width_option == 'Boxed Width'){
        $article_blog_writer_theme_css .='body{';
            $article_blog_writer_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $article_blog_writer_theme_css .='}';
        $article_blog_writer_theme_css .='.scrollup i{';
            $article_blog_writer_theme_css .='right: 100px;';
        $article_blog_writer_theme_css .='}';
        $article_blog_writer_theme_css .='.page-template-custom-home-page .home-page-header{';
            $article_blog_writer_theme_css .='padding: 0px 40px 0 10px;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_width_option == 'Wide Width'){
        $article_blog_writer_theme_css .='body{';
            $article_blog_writer_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $article_blog_writer_theme_css .='}';
        $article_blog_writer_theme_css .='.scrollup i{';
            $article_blog_writer_theme_css .='right: 30px;';
        $article_blog_writer_theme_css .='}';
    }else if($article_blog_writer_width_option == 'Full Width'){
        $article_blog_writer_theme_css .='body{';
            $article_blog_writer_theme_css .='max-width: 100%;';
        $article_blog_writer_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $article_blog_writer_nav_menu = get_theme_mod( 'article_blog_writer_nav_menu_text_transform','Capitalize');
    if($article_blog_writer_nav_menu == 'Capitalize'){
        $article_blog_writer_theme_css .='.main-navigation .menu > li > a{';
            $article_blog_writer_theme_css .='text-transform:Capitalize;';
        $article_blog_writer_theme_css .='}';
    }
    if($article_blog_writer_nav_menu == 'Lowercase'){
        $article_blog_writer_theme_css .='.main-navigation .menu > li > a{';
            $article_blog_writer_theme_css .='text-transform:Lowercase;';
        $article_blog_writer_theme_css .='}';
    }
    if($article_blog_writer_nav_menu == 'Uppercase'){
        $article_blog_writer_theme_css .='.main-navigation .menu > li > a{';
            $article_blog_writer_theme_css .='text-transform:Uppercase;';
        $article_blog_writer_theme_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

    $article_blog_writer_global_color = get_theme_mod('article_blog_writer_global_color');

    if($article_blog_writer_global_color != false){
        $article_blog_writer_theme_css .='.comment-respond input#submit,.wp-block-button__link,.main-navigation .sub-menu,.sidebar input[type="submit"], .sidebar button[type="submit"],a.btn-text,#top-slider .owl-carousel .owl-nav .owl-prev, #top-slider .owl-carousel .owl-nav .owl-next,.featured .owl-carousel .owl-nav .owl-prev:hover, .featured .owl-carousel .owl-nav .owl-next:hover,#top-slider,#button, span.onsale, .pro-button a, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt,.woocommerce a.added_to_cart, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce .woocommerce-ordering select, .woocommerce-account .woocommerce-MyAccount-navigation ul li, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover, .sidebar h5, .sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover{';
            $article_blog_writer_theme_css .='background-color: '.esc_attr($article_blog_writer_global_color).';';
        $article_blog_writer_theme_css .='}';
    }

    if($article_blog_writer_global_color != false){
        $article_blog_writer_theme_css .='a,.main-navigation .menu > li > a:hover,.post-navigation .nav-previous a, .post-navigation .nav-next a, .posts-navigation .nav-previous a, .posts-navigation .nav-next a,.article-box h3.entry-title a,.navbar-brand p,.top-info .social-link a i:hover, .top-info p.location i,.chooseus-icon i, section.featured span.last_slide_head, p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-message::before, .woocommerce-info::before, .widget a:hover, .widget a:focus, .sidebar ul li a:hover{';
            $article_blog_writer_theme_css .='color: '.esc_attr($article_blog_writer_global_color).';';
        $article_blog_writer_theme_css .='}';
    }

    if($article_blog_writer_global_color != false){
        $article_blog_writer_theme_css .='.wp-block-button.is-style-outline .wp-block-button__link,.postcat-name{';
            $article_blog_writer_theme_css .='color: '.esc_attr($article_blog_writer_global_color).' !important;';
        $article_blog_writer_theme_css .='}';
    }

    if($article_blog_writer_global_color != false){
        $article_blog_writer_theme_css .='.wp-block-button.is-style-outline .wp-block-button__link,.button-header a, #top-slider .slide-btn a, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover{';
            $article_blog_writer_theme_css .='border-color: '.esc_attr($article_blog_writer_global_color).';';
        $article_blog_writer_theme_css .='}';
    }

    if($article_blog_writer_global_color != false){
        $article_blog_writer_theme_css .='.woocommerce-message, .woocommerce-info{';
            $article_blog_writer_theme_css .='border-top-color: '.esc_attr($article_blog_writer_global_color).';';
        $article_blog_writer_theme_css .='}';
    }

    $article_blog_writer_theme_css .='@media screen and (max-width:1000px) {';
        if($article_blog_writer_global_color != false){
            $article_blog_writer_theme_css .='.toggle-nav i, .sidenav .closebtn{
            background: '.esc_attr($article_blog_writer_global_color).';
            }';
        }
    $article_blog_writer_theme_css .='}';

    /*-------------------- Heading typography -------------------*/

    $article_blog_writer_heading_color = get_theme_mod('article_blog_writer_heading_color');
    $article_blog_writer_heading_font_family = get_theme_mod('article_blog_writer_heading_font_family');
    $article_blog_writer_heading_font_size = get_theme_mod('article_blog_writer_heading_font_size');
    if($article_blog_writer_heading_color != false || $article_blog_writer_heading_font_family != false || $article_blog_writer_heading_font_size != false){
        $article_blog_writer_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title, #top-slider .slider-inner-box h3, .featured h3.main-heading, .article-box h3.entry-title, .featured h4.main-heading, #colophon h5, .sidebar h5{';
            $article_blog_writer_theme_css .='color: '.esc_attr($article_blog_writer_heading_color).'!important; 
            font-family: '.esc_attr($article_blog_writer_heading_font_family).'!important;
            font-size: '.esc_attr($article_blog_writer_heading_font_size).'px !important;';
        $article_blog_writer_theme_css .='}';
    }

    $article_blog_writer_paragraph_color = get_theme_mod('article_blog_writer_paragraph_color');
    $article_blog_writer_paragraph_font_family = get_theme_mod('article_blog_writer_paragraph_font_family');
    $article_blog_writer_paragraph_font_size = get_theme_mod('article_blog_writer_paragraph_font_size');
    if($article_blog_writer_paragraph_color != false || $article_blog_writer_paragraph_font_family != false || $article_blog_writer_paragraph_font_size != false){
        $article_blog_writer_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $article_blog_writer_theme_css .='color: '.esc_attr($article_blog_writer_paragraph_color).'!important; 
            font-family: '.esc_attr($article_blog_writer_paragraph_font_family).'!important;
            font-size: '.esc_attr($article_blog_writer_paragraph_font_size).'px !important;';
        $article_blog_writer_theme_css .='}';
    }

    /*---------------- Logo CSS ----------------------*/
    $article_blog_writer_logo_title_font_size = get_theme_mod( 'article_blog_writer_logo_title_font_size');
    $article_blog_writer_logo_tagline_font_size = get_theme_mod( 'article_blog_writer_logo_tagline_font_size');
    if( $article_blog_writer_logo_title_font_size != '') {
        $article_blog_writer_theme_css .='#masthead .navbar-brand a{';
            $article_blog_writer_theme_css .='font-size: '. $article_blog_writer_logo_title_font_size. 'px;';
        $article_blog_writer_theme_css .='}';
    }
    if( $article_blog_writer_logo_tagline_font_size != '') {
        $article_blog_writer_theme_css .='#masthead .navbar-brand p{';
            $article_blog_writer_theme_css .='font-size: '. $article_blog_writer_logo_tagline_font_size. 'px;';
        $article_blog_writer_theme_css .='}';
    }