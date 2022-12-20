<?php
/* Customizer Code HERE */

function cleaning_theme_customizer( $wp_customize ) {

	// Customizer Title Control
	class WP_Customize_Title_Control extends WP_Customize_Control {

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}

		public function render_content() {
			?><h3><?php echo esc_html( $this->label ); ?></h3>
			<?php
		}

	}

	$wp_customize->add_panel(
		'all_styling_panel',
		array(
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'title'       => esc_html__( 'Styling Settings', 'cleaning-services' ),
			'description' => esc_html__( 'All Styling Settings', 'cleaning-services' ),
		)
	);

	// Common Color Section
	$wp_customize->add_section(
		'cleaning_common_color_section',
		array(
			'title'    => esc_html__( 'Common Color', 'cleaning-services' ),
			'priority' => 1,
			'panel'    => 'all_styling_panel',
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[preloader_color]',
		array(
			'default'           => '#4ba0e8',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[preloader_color]',
			array(
				'label'    => esc_html__( 'Preloader Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 1,
			)
		)
	);


	$wp_customize->add_setting(
		'cleaning_services_colors[body_color]',
		array(
			'default'           => '#677d8f',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[body_color]',
			array(
				'label'    => esc_html__( 'Body Text Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[heading_color]',
		array(
			'default'           => '#4b5b68',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[heading_color]',
			array(
				'label'    => esc_html__( 'Heading Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[white_heading_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[white_heading_color]',
			array(
				'label'    => esc_html__( 'White Text Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[backtotop_color]',
		array(
			'default'           => '#4ba0e8',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[backtotop_color]',
			array(
				'label'    => esc_html__( 'BackToTop Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 4,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[backtotop_hover_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[backtotop_hover_color]',
			array(
				'label'    => esc_html__( 'BackToTop Bg Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 5,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[theme_icon_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[theme_icon_color]',
			array(
				'label'    => esc_html__( 'Theme Icon Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 6,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[theme_active_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[theme_active_color]',
			array(
				'label'    => esc_html__( 'Theme Active Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 7,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[theme_active_bg_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[theme_active_bg_color]',
			array(
				'label'    => esc_html__( 'Theme Active Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 8,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[theme_border_color]',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[theme_border_color]',
			array(
				'label'    => esc_html__( 'Theme Border Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 9,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[pagi_color]',
		array(
			'default'           => '#cccccc',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[pagi_color]',
			array(
				'label'    => esc_html__( 'Pagination Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 10,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[pagi_active_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[pagi_active_color]',
			array(
				'label'    => esc_html__( 'Pagination Active Color', 'cleaning-services' ),
				'section'  => 'cleaning_common_color_section',
				'priority' => 11,
			)
		)
	);

	// Menu Color Section

	$wp_customize->add_section(
		'cleaning_menu_color_section',
		array(
			'title'    => esc_html__( 'Menu Area Color', 'cleaning-services' ),
			'priority' => 2,
			'panel'    => 'all_styling_panel',
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[main_menu_bg_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[main_menu_bg_color]',
			array(
				'label'    => esc_html__( 'Menu BG Color', 'cleaning-services' ),
				'section'  => 'cleaning_menu_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[dropdown_menu_bg_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[dropdown_menu_bg_color]',
			array(
				'label'    => esc_html__( 'Dropdown Menu BG Color', 'cleaning-services' ),
				'section'  => 'cleaning_menu_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[menu_color]',
		array(
			'default'           => '#425d74',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[menu_color]',
			array(
				'label'    => esc_html__( 'Menu Color', 'cleaning-services' ),
				'section'  => 'cleaning_menu_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[dropdown_menu_color]',
		array(
			'default'           => '#425d74',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[dropdown_menu_color]',
			array(
				'label'    => esc_html__( 'Dropdown Menu Color', 'cleaning-services' ),
				'section'  => 'cleaning_menu_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[menu_active_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[menu_active_color]',
			array(
				'label'    => esc_html__( 'Menu Active Color', 'cleaning-services' ),
				'section'  => 'cleaning_menu_color_section',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[menu_border_color]',
		array(
			'default'           => '#4ba0e8',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[menu_border_color]',
			array(
				'label'    => esc_html__( 'Menu Border Color', 'cleaning-services' ),
				'section'  => 'cleaning_menu_color_section',
				'priority' => 4,
			)
		)
	);

	// Slider Color Section
	$wp_customize->add_section(
		'cleaning_slider_color_section',
		array(
			'title'    => esc_html__( 'Slider Color', 'cleaning-services' ),
			'priority' => 3,
			'panel'    => 'all_styling_panel',
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[slider_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[slider_color]',
			array(
				'label'    => esc_html__( 'Slider Caption Color', 'cleaning-services' ),
				'section'  => 'cleaning_slider_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[slider_btn_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[slider_btn_color]',
			array(
				'label'    => esc_html__( 'Slider Button Color', 'cleaning-services' ),
				'section'  => 'cleaning_slider_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[slider_btn_bg_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[slider_btn_bg_color]',
			array(
				'label'    => esc_html__( 'Slider Button Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_slider_color_section',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[slider_btn_border_color]',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[slider_btn_border_color]',
			array(
				'label'    => esc_html__( 'Slider Button Border Color', 'cleaning-services' ),
				'section'  => 'cleaning_slider_color_section',
				'priority' => 4,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[slider_btn_hover_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[slider_btn_hover_color]',
			array(
				'label'    => esc_html__( 'Slider Button Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_slider_color_section',
				'priority' => 5,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[slider_btn_bg_hover_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[slider_btn_bg_hover_color]',
			array(
				'label'    => esc_html__( 'Slider Button Bg Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_slider_color_section',
				'priority' => 6,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[slider_btn_border_hover_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[slider_btn_border_hover_color]',
			array(
				'label'    => esc_html__( 'Slider Button Border Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_slider_color_section',
				'priority' => 7,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[slider_navigation_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[slider_navigation_color]',
			array(
				'label'    => esc_html__( 'Slider Navigation Color', 'cleaning-services' ),
				'section'  => 'cleaning_slider_color_section',
				'priority' => 8,
			)
		)
	);

	// $wp_customize->add_setting('cleaning_services_colors[slider_navigation_hover_color]', array(
	// 'sanitize_callback' => 'sanitize_hex_color',
	// 'type' => 'theme_mod',
	// ));
	//
	// $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cleaning_services_colors[slider_navigation_hover_color]', array(
	// 'label' => esc_html__('Slider Navigation Hover Color', 'cleaning-services'),
	// 'section' => 'cleaning_slider_color_section',
	// 'priority' => 9,
	// )));

	// Button Color Section
	$wp_customize->add_section(
		'cleaning_button_color_section',
		array(
			'title'    => esc_html__( 'Theme Button Color', 'cleaning-services' ),
			'priority' => 4,
			'panel'    => 'all_styling_panel',
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[btn_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[btn_color]',
			array(
				'label'    => esc_html__( 'Button Color', 'cleaning-services' ),
				'section'  => 'cleaning_button_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[btn_bg_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[btn_bg_color]',
			array(
				'label'    => esc_html__( 'Button Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_button_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[btn_hover_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[btn_hover_color]',
			array(
				'label'    => esc_html__( 'Button Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_button_color_section',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[btn_bg_hover_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[btn_bg_hover_color]',
			array(
				'label'    => esc_html__( 'Button Bg Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_button_color_section',
				'priority' => 4,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[btn_white_hover_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[btn_white_hover_color]',
			array(
				'label'    => esc_html__( 'White Button Color', 'cleaning-services' ),
				'section'  => 'cleaning_button_color_section',
				'priority' => 5,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[btn_white_bg_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[btn_white_bg_color]',
			array(
				'label'    => esc_html__( 'White Button Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_button_color_section',
				'priority' => 6,
			)
		)
	);

	// Other Color Section
	$wp_customize->add_section(
		'cleaning_other_color_section',
		array(
			'title'    => esc_html__( 'Other Color Section', 'cleaning-services' ),
			'priority' => 5,
			'panel'    => 'all_styling_panel',
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[work_round_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[work_round_color]',
			array(
				'label'    => esc_html__( 'Works Area Round Shape Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[work_one]',
		array(
			'default'           => '#7bd6c5',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[work_one]',
			array(
				'label'    => esc_html__( 'One Shape Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[work_two]',
		array(
			'default'           => '#6dd0f0',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[work_two]',
			array(
				'label'    => esc_html__( 'Two Shape Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[work_three]',
		array(
			'default'           => '#4ba0e8',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[work_three]',
			array(
				'label'    => esc_html__( 'Three Shape Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 4,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[blog_link_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[blog_link_color]',
			array(
				'label'    => esc_html__( 'Blog Link Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 5,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[blog_link_bg_color]',
		array(
			'default'           => '#4ba0e8',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[blog_link_bg_color]',
			array(
				'label'    => esc_html__( 'Blog Link BG Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 6,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[blog_link_hover_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[blog_link_hover_color]',
			array(
				'label'    => esc_html__( 'Blog Link Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 6,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[blog_link_bg_hover_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[blog_link_bg_hover_color]',
			array(
				'label'    => esc_html__( 'Blog Link Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 6,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[gallery_caption_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[gallery_caption_color]',
			array(
				'label'    => esc_html__( 'Gallery Caption Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 9,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[gallery_overly_color]',
		array(
			'default'           => '#4b5b68',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[gallery_overly_color]',
			array(
				'label'    => esc_html__( 'Gallery Overly Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 10,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[copun_icon_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[copun_icon_color]',
			array(
				'label'    => esc_html__( 'Coupun Icon Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 11,
			)
		)
	);
	$wp_customize->add_setting(
		'cleaning_services_colors[copun_icon_bg_color]',
		array(
			'default'           => '#4ba0e8',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[copun_icon_bg_color]',
			array(
				'label'    => esc_html__( 'Coupun Icon Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 12,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[copun_icon_bg_hover_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[copun_icon_bg_hover_color]',
			array(
				'label'    => esc_html__( 'Coupun Icon Bg Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 13,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[service_menu_bg_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[service_menu_bg_color]',
			array(
				'label'    => esc_html__( 'Service Right Menu Bg Color ', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 14,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[calender_section_bg_color]',
		array(
			'default'           => '#47a8e3',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[calender_section_bg_color]',
			array(
				'label'    => esc_html__( 'Calender section Bg Color', 'cleaning-services' ),
				'section'  => 'cleaning_other_color_section',
				'priority' => 15,
			)
		)
	);

	// Footer Color Section
	$wp_customize->add_section(
		'cleaning_footer_color_section',
		array(
			'title'    => esc_html__( 'Footer Area Color', 'cleaning-services' ),
			'priority' => 6,
			'panel'    => 'all_styling_panel',
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[footer_menu_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[footer_menu_color]',
			array(
				'label'    => esc_html__( 'Footer Menu Color', 'cleaning-services' ),
				'section'  => 'cleaning_footer_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[footer_menu_hover_color]',
		array(
			'default'           => '#425d74',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[footer_menu_hover_color]',
			array(
				'label'    => esc_html__( 'Footer Menu Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_footer_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[footer_gradient_first_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#46c6cf',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[footer_gradient_first_color]',
			array(
				'label'    => esc_html__( 'Footer Gradient First Color', 'cleaning-services' ),
				'section'  => 'cleaning_footer_color_section',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[footer_gradient_second_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#47a8e3',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[footer_gradient_second_color]',
			array(
				'label'    => esc_html__( 'Footer Gradient Second Color', 'cleaning-services' ),
				'section'  => 'cleaning_footer_color_section',
				'priority' => 4,
			)
		)
	);

	// Breadcrumbs Color Section
	$wp_customize->add_section(
		'cleaning_breadcrumbs_color_section',
		array(
			'title'    => esc_html__( 'Breadcrumbs Color Area', 'cleaning-services' ),
			'priority' => 7,
			'panel'    => 'all_styling_panel',
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[breadcrums_bg_color]',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#f6f6f7',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[breadcrums_bg_color]',
			array(
				'label'    => esc_html__( 'Breadcrums BG Color', 'cleaning-services' ),
				'section'  => 'cleaning_breadcrumbs_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[breadcrums_a_color]',
		array(
			'default'           => '#74828e',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[breadcrums_a_color]',
			array(
				'label'    => esc_html__( 'Breadcrums a Color', 'cleaning-services' ),
				'section'  => 'cleaning_breadcrumbs_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[breadcrums_a_hover_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[breadcrums_a_hover_color]',
			array(
				'label'    => esc_html__( 'Breadcrums a Hover Color', 'cleaning-services' ),
				'section'  => 'cleaning_breadcrumbs_color_section',
				'priority' => 3,
			)
		)
	);

	// Shop Page Color
	$wp_customize->add_section(
		'shop_color_section',
		array(
			'title'    => esc_html__( 'Shop Page Color', 'cleaning-services' ),
			'priority' => 8,
			'panel'    => 'all_styling_panel',
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_active_icon]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_active_icon]',
			array(
				'label'    => esc_html__( 'Shop Active Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_active_bg_icon]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_active_bg_icon]',
			array(
				'label'    => esc_html__( 'Shop Active Bg Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[cart_icon]',
		array(
			'default'           => '#425d74',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[cart_icon]',
			array(
				'label'    => esc_html__( 'Cart Icon Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[cart_icon_hover]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[cart_icon_hover]',
			array(
				'label'    => esc_html__( 'Cart Icon Hover Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[cart_icon_bg]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[cart_icon_bg]',
			array(
				'label'    => esc_html__( 'Cart Icon Badge Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 3,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[cart_icon_bg_hover]',
		array(
			'default'           => '#4ba0e8',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[cart_icon_bg_hover]',
			array(
				'label'    => esc_html__( 'Cart Icon Badge Bg Hover Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 4,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_filter_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_filter_color]',
			array(
				'label'    => esc_html__( 'Shop filter Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 5,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_sale_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_sale_color]',
			array(
				'label'    => esc_html__( 'Shop Sale lavel Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 6,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_sale_text_color]',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_sale_text_color]',
			array(
				'label'    => esc_html__( 'Shop Sale lavel Text Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 7,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_rateing_color]',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_rateing_color]',
			array(
				'label'    => esc_html__( 'Shop Rating Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 8,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_pagination_bg_color',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_pagination_bg_color]',
			array(
				'label'    => esc_html__( 'Shop Pagination Bg Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 10,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_pagination_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_pagination_text_color]',
			array(
				'label'    => esc_html__( 'Shop Pagination Text Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 11,
			)
		)
	);

	$wp_customize->add_setting(
		'cleaning_services_colors[shop_pagination_border_color',
		array(
			'default'           => '#6fbf52',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cleaning_services_colors[shop_pagination_border_color]',
			array(
				'label'    => esc_html__( 'Shop Pagination Border Color', 'cleaning-services' ),
				'section'  => 'shop_color_section',
				'priority' => 12,
			)
		)
	);
}

add_action( 'customize_register', 'cleaning_theme_customizer' );
