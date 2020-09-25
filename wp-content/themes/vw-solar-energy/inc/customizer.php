<?php
/**
 * VW Solar Energy Theme Customizer
 *
 * @package VW Solar Energy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_solar_energy_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_solar_energy_custom_controls' );

function vw_solar_energy_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_solar_energy_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_solar_energy_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWSolarEnergyParentPanel = new VW_Solar_Energy_WP_Customize_Panel( $wp_customize, 'vw_solar_energy_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_solar_energy_left_right', array(
    	'title'      => __( 'General Settings', 'vw-solar-energy' ),
		'priority'   => 30,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	$wp_customize->add_setting('vw_solar_energy_width_option',array(
        'default' => __('Full Width','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Solar_Energy_Image_Radio_Control($wp_customize, 'vw_solar_energy_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-solar-energy'),
        'description' => __('Here you can change the width layout of Website.','vw-solar-energy'),
        'section' => 'vw_solar_energy_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_solar_energy_theme_options',array(
        'default' => __('Right Sidebar','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_solar_energy_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-solar-energy'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-solar-energy'),
        'section' => 'vw_solar_energy_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-solar-energy'),
            'Right Sidebar' => __('Right Sidebar','vw-solar-energy'),
            'One Column' => __('One Column','vw-solar-energy'),
            'Three Columns' => __('Three Columns','vw-solar-energy'),
            'Four Columns' => __('Four Columns','vw-solar-energy'),
            'Grid Layout' => __('Grid Layout','vw-solar-energy')
        ),
	));

	$wp_customize->add_setting('vw_solar_energy_page_layout',array(
        'default' => __('One Column','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
	));
	$wp_customize->add_control('vw_solar_energy_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-solar-energy'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-solar-energy'),
        'section' => 'vw_solar_energy_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-solar-energy'),
            'Right Sidebar' => __('Right Sidebar','vw-solar-energy'),
            'One Column' => __('One Column','vw-solar-energy')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'vw_solar_energy_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-solar-energy' ),
        'section' => 'vw_solar_energy_left_right'
    )));

	$wp_customize->add_setting('vw_solar_energy_loader_icon',array(
        'default' => __('Two Way','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
	));
	$wp_customize->add_control('vw_solar_energy_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-solar-energy'),
        'section' => 'vw_solar_energy_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-solar-energy'),
            'Dots' => __('Dots','vw-solar-energy'),
            'Rotate' => __('Rotate','vw-solar-energy')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_solar_energy_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-solar-energy' ),
		'priority'   => 30,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	$wp_customize->add_setting( 'vw_solar_energy_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-solar-energy' ),
      'section' => 'vw_solar_energy_topbar'
    )));

    $wp_customize->add_setting('vw_solar_energy_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_solar_energy_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-solar-energy' ),
        'section' => 'vw_solar_energy_topbar'
    )));

    $wp_customize->add_setting('vw_solar_energy_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_solar_energy_search_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_search_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Search','vw-solar-energy' ),
      'section' => 'vw_solar_energy_topbar'
    )));

     $wp_customize->add_setting('vw_solar_energy_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_search_font_size',array(
		'label'	=> __('Search Font Size','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_solar_energy_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_solar_energy_phone', array( 
		'selector' => '#topbar span', 
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_phone', 
	));

    $wp_customize->add_setting('vw_solar_energy_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Solar_Energy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_solar_energy_phone_number_icon',array(
		'label'	=> __('Add Phone Number Icon','vw-solar-energy'),
		'transport' => 'refresh',
		'section'	=> 'vw_solar_energy_topbar',
		'setting'	=> 'vw_solar_energy_phone_number_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_solar_energy_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_solar_energy_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_solar_energy_phone',array(
		'label'	=> __('Add Phone no.','vw-solar-energy'),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_email_address_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Solar_Energy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_solar_energy_email_address_icon',array(
		'label'	=> __('Add Email Icon','vw-solar-energy'),
		'transport' => 'refresh',
		'section'	=> 'vw_solar_energy_topbar',
		'setting'	=> 'vw_solar_energy_email_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_solar_energy_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_solar_energy_sanitize_email'
	));	
	$wp_customize->add_control('vw_solar_energy_email_address',array(
		'label'	=> __('Add Email Address','vw-solar-energy'),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_timing_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Solar_Energy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_solar_energy_timing_icon',array(
		'label'	=> __('Add Timing Icon','vw-solar-energy'),
		'transport' => 'refresh',
		'section'	=> 'vw_solar_energy_topbar',
		'setting'	=> 'vw_solar_energy_timing_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_solar_energy_timming',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_solar_energy_timming',array(
		'label'	=> __('Add Opening Time','vw-solar-energy'),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_solar_energy_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-solar-energy' ),
		'priority'   => null,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	$wp_customize->add_setting( 'vw_solar_energy_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-solar-energy' ),
      'section' => 'vw_solar_energy_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_solar_energy_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_slider_hide_show',
	));
    
	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_solar_energy_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_solar_energy_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_solar_energy_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-solar-energy' ),
			'description' => __('Slider image size (1500 x 590)','vw-solar-energy'),
			'section'  => 'vw_solar_energy_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_solar_energy_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( 'DISCOVER MORE', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_slidersettings',
		'type'=> 'text'
	));

	//content layout
	$wp_customize->add_setting('vw_solar_energy_slider_content_option',array(
        'default' => __('Right','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Solar_Energy_Image_Radio_Control($wp_customize, 'vw_solar_energy_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-solar-energy'),
        'section' => 'vw_solar_energy_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_solar_energy_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_solar_energy_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_solar_energy_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_solar_energy_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-solar-energy' ),
	'section'     => 'vw_solar_energy_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_solar_energy_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-solar-energy'),
      '0.1' =>  esc_attr('0.1','vw-solar-energy'),
      '0.2' =>  esc_attr('0.2','vw-solar-energy'),
      '0.3' =>  esc_attr('0.3','vw-solar-energy'),
      '0.4' =>  esc_attr('0.4','vw-solar-energy'),
      '0.5' =>  esc_attr('0.5','vw-solar-energy'),
      '0.6' =>  esc_attr('0.6','vw-solar-energy'),
      '0.7' =>  esc_attr('0.7','vw-solar-energy'),
      '0.8' =>  esc_attr('0.8','vw-solar-energy'),
      '0.9' =>  esc_attr('0.9','vw-solar-energy')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_solar_energy_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_slider_height',array(
		'label'	=> __('Slider Height','vw-solar-energy'),
		'description'	=> __('Specify the slider height (px).','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_solar_energy_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'vw_solar_energy_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_solar_energy_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-solar-energy'),
		'section' => 'vw_solar_energy_slidersettings',
		'type'  => 'number',
	) );

	//About Section
	$wp_customize->add_section( 'vw_solar_energy_about_section' , array(
    	'title'      => __( 'About us', 'vw-solar-energy' ),
		'priority'   => null,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_solar_energy_about_page', array( 
		'selector' => '#about h2', 
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_about_page',
	));

	$wp_customize->add_setting( 'vw_solar_energy_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_solar_energy_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_solar_energy_about_page', array(
		'label'    => __( 'About Page', 'vw-solar-energy' ),
		'section'  => 'vw_solar_energy_about_section',
		'type'     => 'dropdown-pages'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_solar_energy_services', array( 
		'selector' => '#our_services h3:first-child', 
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_services',
	));

	$wp_customize->add_setting('vw_solar_energy_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_solar_energy_sanitize_choices',
	));
	$wp_customize->add_control('vw_solar_energy_services',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display services','vw-solar-energy'),
		'description' => __('Services Icon size (75 x 65)','vw-solar-energy'),
		'section' => 'vw_solar_energy_about_section',
	));	

	//about excerpt
	$wp_customize->add_setting( 'vw_solar_energy_about_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_about_section',
		'type'        => 'range',
		'settings'    => 'vw_solar_energy_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_solar_energy_about_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_about_button_text',array(
		'label'	=> __('Add About Button Text','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_about_section',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( $VWSolarEnergyParentPanel );

	$BlogPostParentPanel = new VW_Solar_Energy_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-solar-energy' ),
		'panel' => 'vw_solar_energy_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_solar_energy_post_settings', array(
		'title' => __( 'Post Settings', 'vw-solar-energy' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_solar_energy_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_solar_energy_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-solar-energy' ),
        'section' => 'vw_solar_energy_post_settings'
    )));

    $wp_customize->add_setting( 'vw_solar_energy_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_toggle_author',array(
		'label' => esc_html__( 'Author','vw-solar-energy' ),
		'section' => 'vw_solar_energy_post_settings'
    )));

    $wp_customize->add_setting( 'vw_solar_energy_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-solar-energy' ),
		'section' => 'vw_solar_energy_post_settings'
    )));

    $wp_customize->add_setting( 'vw_solar_energy_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-solar-energy' ),
		'section' => 'vw_solar_energy_post_settings'
    )));

    $wp_customize->add_setting( 'vw_solar_energy_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_solar_energy_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_solar_energy_blog_layout_option',array(
        'default' => __('Default','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Solar_Energy_Image_Radio_Control($wp_customize, 'vw_solar_energy_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-solar-energy'),
        'section' => 'vw_solar_energy_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_solar_energy_excerpt_settings',array(
        'default' => __('Excerpt','vw-solar-energy'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
	));
	$wp_customize->add_control('vw_solar_energy_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-solar-energy'),
        'section' => 'vw_solar_energy_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-solar-energy'),
            'Excerpt' => __('Excerpt','vw-solar-energy'),
            'No Content' => __('No Content','vw-solar-energy')
        ),
	) );

	$wp_customize->add_setting('vw_solar_energy_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_solar_energy_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-solar-energy' ),
      'section' => 'vw_solar_energy_post_settings'
    )));

	$wp_customize->add_setting( 'vw_solar_energy_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_solar_energy_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_solar_energy_blog_pagination_type', array(
        'section' => 'vw_solar_energy_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-solar-energy' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-solar-energy' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-solar-energy' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_solar_energy_button_settings', array(
		'title' => __( 'Button Settings', 'vw-solar-energy' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_solar_energy_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_solar_energy_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_solar_energy_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_button_text', 
	));

	$wp_customize->add_setting('vw_solar_energy_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_button_text',array(
		'label'	=> __('Add Button Text','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_solar_energy_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-solar-energy' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_solar_energy_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_solar_energy_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_related_post',array(
		'label' => esc_html__( 'Related Post','vw-solar-energy' ),
		'section' => 'vw_solar_energy_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_solar_energy_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_solar_energy_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_solar_energy_sanitize_float'
	));
	$wp_customize->add_control('vw_solar_energy_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_solar_energy_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-solar-energy' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_solar_energy_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-solar-energy' ),
		'section' => 'vw_solar_energy_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_solar_energy_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_solar_energy_404_page',array(
		'title'	=> __('404 Page Settings','vw-solar-energy'),
		'panel' => 'vw_solar_energy_panel_id',
	));	

	$wp_customize->add_setting('vw_solar_energy_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_solar_energy_404_page_title',array(
		'label'	=> __('Add Title','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_solar_energy_404_page_content',array(
		'label'	=> __('Add Text','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_404_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_solar_energy_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-solar-energy'),
		'panel' => 'vw_solar_energy_panel_id',
	));	

	$wp_customize->add_setting('vw_solar_energy_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_social_icon_width',array(
		'label'	=> __('Icon Width','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_social_icon_height',array(
		'label'	=> __('Icon Height','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_solar_energy_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_solar_energy_responsive_media',array(
		'title'	=> __('Responsive Media','vw-solar-energy'),
		'panel' => 'vw_solar_energy_panel_id',
	));

	$wp_customize->add_setting( 'vw_solar_energy_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-solar-energy' ),
      'section' => 'vw_solar_energy_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_solar_energy_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-solar-energy' ),
      'section' => 'vw_solar_energy_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_solar_energy_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-solar-energy' ),
      'section' => 'vw_solar_energy_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_solar_energy_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-solar-energy' ),
      'section' => 'vw_solar_energy_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_solar_energy_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-solar-energy' ),
      'section' => 'vw_solar_energy_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_solar_energy_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-solar-energy' ),
      'section' => 'vw_solar_energy_responsive_media'
    )));

    $wp_customize->add_setting('vw_solar_energy_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Solar_Energy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_solar_energy_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-solar-energy'),
		'transport' => 'refresh',
		'section'	=> 'vw_solar_energy_responsive_media',
		'setting'	=> 'vw_solar_energy_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_solar_energy_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Solar_Energy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_solar_energy_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-solar-energy'),
		'transport' => 'refresh',
		'section'	=> 'vw_solar_energy_responsive_media',
		'setting'	=> 'vw_solar_energy_res_menu_close_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_solar_energy_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-solar-energy' ),
		'priority' => null,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	$wp_customize->add_setting('vw_solar_energy_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Solar_Energy_Content_Creation( $wp_customize, 'vw_solar_energy_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-solar-energy' ),
		),
		'section' => 'vw_solar_energy_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-solar-energy' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_solar_energy_footer',array(
		'title'	=> __('Footer','vw-solar-energy'),
		'description'=> __('This section will appear in the footer','vw-solar-energy'),
		'panel' => 'vw_solar_energy_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_solar_energy_footer_text', array( 
		'selector' => '#footer-2 .copyright p', 
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_footer_text', 
	));
	
	$wp_customize->add_setting('vw_solar_energy_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_solar_energy_footer_text',array(
		'label'	=> __('Copyright Text','vw-solar-energy'),
		'section'=> 'vw_solar_energy_footer',
		'setting'=> 'vw_solar_energy_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_copyright_alingment',array(
        'default' => __('center','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Solar_Energy_Image_Radio_Control($wp_customize, 'vw_solar_energy_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-solar-energy'),
        'section' => 'vw_solar_energy_footer',
        'settings' => 'vw_solar_energy_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_solar_energy_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_solar_energy_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-solar-energy' ),
      	'section' => 'vw_solar_energy_footer'
    )));	

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_solar_energy_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_solar_energy_customize_partial_vw_solar_energy_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_solar_energy_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Solar_Energy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_solar_energy_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-solar-energy'),
		'transport' => 'refresh',
		'section'	=> 'vw_solar_energy_footer',
		'setting'	=> 'vw_solar_energy_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_solar_energy_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_solar_energy_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_solar_energy_scroll_top_alignment',array(
        'default' => __('Right','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Solar_Energy_Image_Radio_Control($wp_customize, 'vw_solar_energy_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-solar-energy'),
        'section' => 'vw_solar_energy_footer',
        'settings' => 'vw_solar_energy_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_solar_energy_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-solar-energy'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_solar_energy_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-solar-energy' ),
		'section' => 'vw_solar_energy_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_solar_energy_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_solar_energy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Solar_Energy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_solar_energy_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-solar-energy' ),
		'section' => 'vw_solar_energy_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_solar_energy_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_solar_energy_sanitize_float'
	));
	$wp_customize->add_control('vw_solar_energy_products_per_page',array(
		'label'	=> __('Products Per Page','vw-solar-energy'),
		'description' => __('Display on shop page','vw-solar-energy'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_solar_energy_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_solar_energy_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_solar_energy_sanitize_choices'
	));
	$wp_customize->add_control('vw_solar_energy_products_per_row',array(
		'label'	=> __('Products Per Row','vw-solar-energy'),
		'description' => __('Display on shop page','vw-solar-energy'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_solar_energy_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_solar_energy_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_solar_energy_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-solar-energy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-solar-energy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-solar-energy' ),
        ),
		'section'=> 'vw_solar_energy_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_solar_energy_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_solar_energy_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_solar_energy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_solar_energy_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-solar-energy' ),
		'section'     => 'vw_solar_energy_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Solar_Energy_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Solar_Energy_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_solar_energy_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Solar_Energy_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_solar_energy_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Solar_Energy_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_solar_energy_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_solar_energy_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_solar_energy_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Solar_Energy_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Solar_Energy_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Solar_Energy_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Solar Energy Pro', 'vw-solar-energy' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-solar-energy' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/solar-energy-wordpress-theme/'),
		)));

		$manager->add_section(new VW_Solar_Energy_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-solar-energy' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-solar-energy' ),
			'pro_url'  => admin_url('themes.php?page=vw_solar_energy_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-solar-energy-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-solar-energy-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Solar_Energy_Customize::get_instance();