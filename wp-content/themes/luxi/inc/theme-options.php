<?php

///// Setup the Theme Options

function luxi_customizer( $wp_customize ) {

	// Remove Unwanted Default Sections
	$wp_customize->remove_control("header_image");
	$wp_customize->remove_control("display_header_text");
	$wp_customize->remove_section("background_image");
	$wp_customize->remove_section("colors");


	////////// General Section

	$wp_customize->add_section(
			'general_section',
				array(
						'title' => esc_html__( 'Theme Settings', 'luxi' ),
						'description' => esc_html__( 'The themes general settings section.', 'luxi' ),
						'priority' => 1,
				)
	);

	$wp_customize->add_setting(
		'select_smoothscrolling',
			array(
					'default' => 'on',
					'sanitize_callback' => 'luxi_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'select_smoothscrolling',
			array(
			'label' => esc_html__( 'Smooth Scrolling Effect', 'luxi' ),
			'section' => 'general_section',
			'settings' => 'select_smoothscrolling',
			'type' => 'radio',
			'choices' => array(
				'on' => esc_html__( 'On', 'luxi' ),
				'off' => esc_html__( 'Off', 'luxi' ),
			),
		)
	);

	$wp_customize->add_setting(
	    'luxi_logo',
	    	array(
	        	'sanitize_callback' => 'esc_url_raw',
	    	)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control( $wp_customize, 'luxi_logo',
			array(
				'label' => esc_html__( 'Logo', 'luxi' ),
				'section' => 'title_tagline',
				'settings' => 'luxi_logo',
			)
		)
	);

		$wp_customize->add_setting(
			'custom_css',
			array(
				'default'              => '',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'wp_filter_nohtml_kses',
				'sanitize_js_callback' => 'wp_filter_nohtml_kses'
			)
		);

		$wp_customize->add_control(
			'custom_css',
			array(
				'label'    => esc_html__( 'Custom CSS', 'luxi' ),
				'section'  => 'general_section',
				'settings' => 'custom_css',
				'type'     => 'textarea'
			)
		);


	////////// Header Section

		$wp_customize->add_section(
			'header_section',
				array(
						'title' => esc_html__( 'Header', 'luxi' ),
						'description' => esc_html__( 'Settings for the Header.', 'luxi' ),
						'priority' => 54,
				)
			);


				$wp_customize->add_setting(
					'top_text',
					array(
					'default' => '0',
					'sanitize_callback' => 'luxi_sanitize_text',
					)
				);


				$wp_customize->add_control(
					'top_text',
					array(
						'label' => esc_html__( 'Text for the top bar', 'luxi' ),
						'type' => 'text',
						'section' => 'header_section',
					)
				);

		$wp_customize->add_setting(
		  'move_logo_up',
		  array(
		    'default' => '0',
		    'sanitize_callback' => 'luxi_sanitize_text',
		  )
		);

		$wp_customize->add_control(
			'move_logo_up',
			array(
	  		'label' => esc_html__( 'Move Logo Up / Down ( e.g 20 or -20 )', 'luxi' ),
	  		'type' => 'text',
	  		'section' => 'header_section',
			)
		);

		$wp_customize->add_setting(
			'move_logo_left',
			array(
				'default' => '0',
				'sanitize_callback' => 'luxi_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'move_logo_left',
			array(
				'label' => esc_html__( 'Move Logo Left / Right ( e.g 20 or -20 )', 'luxi' ),
				'type' => 'text',
				'section' => 'header_section',
			)
		);

    $wp_customize->add_setting(
		'large_logo',
		array(
        'default' => '',
				'sanitize_callback' => 'esc_attr',
	   ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'large_logo',
		array(
        'label'    => __( 'Large Logo', 'luxi' ),
        'section'  => 'header_section',
        'settings' => 'large_logo',
    ) ) );

		////////// Footer Section

			$wp_customize->add_section(
				'footer_section',
					array(
							'title' => esc_html__( 'Footer', 'luxi' ),
							'description' => esc_html__( 'Settings for the Footer.', 'luxi' ),
							'priority' => 54,
					)
		);

		$wp_customize->add_setting(
	        'luxi_footer_top_color',
	        array(
	            'default'     => '#FFF',
	            'sanitize_callback' => 'luxi_sanitize_text',
	        )
	    );

	    $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            'footer_top_color',
	            array(
	                'label'      => esc_html__( 'Footer Top Row Background Color', 'luxi' ),
	                'section'    => 'footer_section',
	                'settings'   => 'luxi_footer_top_color'
	            )
	        )
	    );

				$wp_customize->add_setting(
			        'luxi_footer_bottom_color',
			        array(
			            'default'     => '#f3f3f3',
			            'sanitize_callback' => 'luxi_sanitize_text',
			        )
			    );

			    $wp_customize->add_control(
			        new WP_Customize_Color_Control(
			            $wp_customize,
			            'footer_bottom_color',
			            array(
			                'label'      => esc_html__( 'Footer Bottom Row Background Color', 'luxi' ),
			                'section'    => 'footer_section',
			                'settings'   => 'luxi_footer_bottom_color'
			            )
			        )
			    );


	////////// Blog Section

	$wp_customize->add_section(
			'blog_section',
				array(
						'title' => esc_html__( 'Blog Settings', 'luxi' ),
						'description' => esc_html__( 'The themes blog settings section.', 'luxi' ),
						'priority' => 56,
				)
	);

	$wp_customize->add_setting(
	    'select_blog_layout',
	    	array(
	        	'default' => 'right',
	        	'sanitize_callback' => 'luxi_sanitize_text',
	    	)
	);

	$wp_customize->add_control(
		'select_blog_layout',
			array(
				'label' => esc_html__( 'Blog Sidebar Position', 'luxi' ),
				'section' => 'blog_section',
				'settings' => 'select_blog_layout',
				'type' => 'radio',
				'choices' => array(
					'right' => esc_html__( 'Right', 'luxi' ),
					'none' => esc_html__( 'None', 'luxi' ),
					),
			)
	);

	////////// Shop Section

	$wp_customize->add_section(
			'shop_section',
				array(
						'title' => esc_html__( 'Shop Settings', 'luxi' ),
						'description' => esc_html__( 'The themes shop settings section.', 'luxi' ),
						'priority' => 57,
				)
	);

	$wp_customize->add_setting(
    'select_shop_layout',
    	array(
        	'default' => 'none',
        	'sanitize_callback' => 'luxi_sanitize_text',
    )
	);

	$wp_customize->add_control(
		'select_shop_layout',
			array(
				'label' => esc_html__( 'Shop Sidebar Position', 'luxi' ),
				'section' => 'shop_section',
				'settings' => 'select_shop_layout',
				'type' => 'radio',
				'choices' => array(
					'right' => esc_html__( 'Right', 'luxi' ),
					'none' => esc_html__( 'None', 'luxi' ),
			),
		)
	);

}

add_action( 'customize_register', 'luxi_customizer' );

// Theme Option Functions
	function luxi_sanitize_text( $str ) {
		return sanitize_text_field( $str );
	}

	function luxi_sanitize_textarea( $text ) {
		return esc_textarea( $text );
	}

	function luxi_sanitize_number( $int ) {
		return absint( $int );
	}

	function luxi_sanitize_email( $email ) {
		if(is_email( $email )){
		    return $email;
		}else{
		    return '';
		}
	}

?>
