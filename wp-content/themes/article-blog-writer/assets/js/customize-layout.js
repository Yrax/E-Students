(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-article_blog_writer_options-';
		
		// Label
		function article_blog_writer_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'article_blog_writer_global_color' || id === 'article_blog_writer_heading_color' || id === 'article_blog_writer_paragraph_color') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'article_blog_writer_scroll_hide' || id === 'article_blog_writer_preloader_hide' || id === 'article_blog_writer_sticky_header' || id === 'article_blog_writer_products_per_row' || id === 'article_blog_writer_scroll_top_position' || id === 'article_blog_writer_products_per_row' || id === 'article_blog_writer_width_option' || id === 'article_blog_writer_nav_menu_text_transform')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'article_blog_writer_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header
			
			if ( id === 'article_blog_writer_subscribe_btn_text') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Banner

			if ( id === 'article_blog_writer_banner_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Products

			if ( id === 'article_blog_writer_activities_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'article_blog_writer_footer_widget_content_alignment' || id === 'article_blog_writer_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Settings

			if ( id === 'article_blog_writer_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Settings

			if ( id === 'article_blog_writer_single_post_page_content' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-article_blog_writer_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		article_blog_writer_customizer_label( 'custom_logo', 'Logo Setup' );
		article_blog_writer_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		article_blog_writer_customizer_label( 'article_blog_writer_global_color', 'Global Color' );
		article_blog_writer_customizer_label( 'article_blog_writer_heading_color', 'Heading Typography' );
		article_blog_writer_customizer_label( 'article_blog_writer_paragraph_color', 'Paragraph Typography' );

		// General Setting
		article_blog_writer_customizer_label( 'article_blog_writer_preloader_hide', 'Preloader' );
		article_blog_writer_customizer_label( 'article_blog_writer_scroll_hide', 'Scroll To Top' );
		article_blog_writer_customizer_label( 'article_blog_writer_scroll_top_position', 'Scroll to top Position' );
		article_blog_writer_customizer_label( 'article_blog_writer_products_per_row', 'woocommerce Setting' );
		article_blog_writer_customizer_label( 'article_blog_writer_width_option', 'Site Width Layouts' );
		article_blog_writer_customizer_label( 'article_blog_writer_nav_menu_text_transform', 'Nav Menus Text Transform' );

		// Colors
		article_blog_writer_customizer_label( 'article_blog_writer_theme_color', 'Theme Color' );
		article_blog_writer_customizer_label( 'background_color', 'Colors' );
		article_blog_writer_customizer_label( 'background_image', 'Image' );

		//Header Image
		article_blog_writer_customizer_label( 'header_image', 'Header Image' );

		// Header 
		article_blog_writer_customizer_label( 'article_blog_writer_subscribe_btn_text', 'Subscribe' );

		//Slider
		article_blog_writer_customizer_label( 'article_blog_writer_banner_section_setting', 'Banner' );

		//Products
		article_blog_writer_customizer_label( 'article_blog_writer_activities_section_setting', 'Flash Sale' );

		//Footer
		article_blog_writer_customizer_label( 'article_blog_writer_footer_widget_content_alignment', 'Footer' );
		article_blog_writer_customizer_label( 'article_blog_writer_show_hide_copyright', 'Copyright' );

		//Post setting
		article_blog_writer_customizer_label( 'article_blog_writer_post_page_title', 'Post Settings' );

		//Single post setting
		article_blog_writer_customizer_label( 'article_blog_writer_single_post_page_content', 'Single Post Settings' );
	

	});

})( jQuery );
