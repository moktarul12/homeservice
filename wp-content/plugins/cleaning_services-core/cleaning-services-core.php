<?php
/*
  Plugin Name: Cleaning Services Core
  Plugin URI: http://smartdatasoft.com/
  Description: Helping for the SmartDataSoft  theme.
  Author: SmartDataSoft Team
  Version: 3.2
  Author URI: http://smartdatasoft.com/
*/

if ( ! defined( 'CLEANING_SERVICES_THEME_URI' ) ) {
	define( 'CLEANING_SERVICES_THEME_URI', get_template_directory_uri() );
}
define( 'PLUGIN_DIR', dirname( __FILE__ ) . '/' );

require_once PLUGIN_DIR . '/elementor-addons/elementor-addons.php';

/**
 * Load plugin textdomain.
 *
 * @since 1.6
 */
function cleaning_services_calc_post_ajax() {
	if ( ! function_exists( 'cleaning_services_options' ) ) {
		echo json_encode( array( 'result' => esc_html__( 'Function Not Defined', 'cleaning_services-core' ) ) );
		wp_die();
	}
	$array = $_POST;
	if ( isset( $array['costcal_nonce'] ) && wp_verify_nonce( $array['costcal_nonce'], 'costcal_field' ) ) {
		$cleaning_services_option = cleaning_services_options();
		$sendmassage              = '';
		$to                       = $cleaning_services_option['cleaning_services-des_email'];
		if ( $to == '' ) {
			echo json_encode( array( 'result' => esc_html__( 'Destination Email Not Found', 'cleaning_services-core' ) ) );
			wp_die();
		}
		global $customar_email;
		global $customar_name;
		$customar_name = get_bloginfo( 'name' );
		unset( $array['costcal_nonce'] );
		unset( $array['action'] );
		foreach ( $array as $key => $val ) {
			if ( strpos( $key, 'calcinput' ) !== false ) {
				$newkey       = str_replace( 'calcinput', 'title', $key );
				$sendmassage .= $array[ $newkey ] . "\r\n" . '<br>';
				if ( is_array( $array[ $key ] ) ) {
					$sendmassage .= implode( ',', $array[ $key ] ) . "\r\n" . '<br>';
				} else {
					$sendmassage .= $array[ $key ] . "\r\n" . '<br>';
				}
			} elseif ( strpos( $key, '_email' ) !== false ) {
				$customar_email = $val;
			} elseif ( strpos( $key, '_text' ) !== false ) {
				$newkey       = str_replace( '_text', '', $key );
				$newkey       = str_replace( '_', ' ', $newkey );
				$sendmassage .= $newkey . "\r\n" . '<br>';
				$sendmassage .= $val . "\r\n" . '<br>';
			} elseif ( strpos( $key, '_massage' ) !== false ) {
				$sendmassage .= esc_html__( 'Customer Massage', 'cleaning_services-core' ) . "\r\n" . '<br>';
				$sendmassage .= $val . "\r\n" . '<br>';
			} elseif ( strpos( $key, '_price' ) !== false ) {
				$sendmassage .= esc_html__( 'Total Price', 'cleaning_services-core' ) . "\r\n" . '<br>';
				$sendmassage .= $val . "\r\n" . '<br>';
			}
		}
		$sendmassage = apply_filters( 'cost_calculator_send_massage_html', $sendmassage, $array );
		add_filter( 'wp_mail_content_type', 'cleaning_services_core_set_content_type' );
		add_filter( 'wp_mail_from', 'cleaning_services_core_setcustomer_email' );
		add_filter( 'wp_mail_from_name', 'cleaning_services_core_setcustomer_name' );
		$subject = apply_filters( 'cost_calculator_send_massage_subject', 'Customer Order' );
		$send    = wp_mail( $to, $subject, $sendmassage );
		if ( $send ) {
			echo json_encode( array( 'result' => $cleaning_services_option['cleaning_services-success_message'] ) );
		} else {
			echo json_encode( array( 'result' => $cleaning_services_option['cleaning_services-error_message'] ) );
		}
	} else {
		echo json_encode( array( 'result' => esc_html__( 'Nonce Error', 'cleaning_services-core' ) ) );
	}
	// echo $sendmassage;
	wp_die();

}

function cleaning_services_core_setcustomer_email() {
	global $customar_email;
	return $customar_email;
}
function cleaning_services_core_setcustomer_name() {
	global $customar_name;
	return $customar_name;
}

function cleaning_services_core_set_content_type() {
	return 'text/html';
}

function cleaning_services_core_core_smpt_mail_setup() {
	if ( function_exists( 'cleaning_services_options' ) ) {
		$cleaning_services_option = cleaning_services_options();
		if ( isset( $cleaning_services_option['cleaning_services-useing_smtpMail'] ) ) {
			$is_smtp = $cleaning_services_option['cleaning_services-useing_smtpMail'];
			if ( isset( $is_smtp ) && $is_smtp ) {
				add_action( 'phpmailer_init', 'send_smtp_email' );
				function send_smtp_email( $phpmailer ) {
					$phpmailer->isSMTP();
					$phpmailer->Host       = $cleaning_services_option['cleaning_services-smtp_host'];
					$phpmailer->SMTPAuth   = $cleaning_services_option['cleaning_services-useing_smtp_auth'];
					$phpmailer->Port       = $cleaning_services_option['cleaning_services-smtp_Port'];
					$phpmailer->Username   = $cleaning_services_option['cleaning_services-smtp_Username'];
					$phpmailer->Password   = $cleaning_services_option['cleaning_services-smtp_Password'];
					$phpmailer->SMTPSecure = $cleaning_services_option['cleaning_services-smtp_SMTPSecure'];
					$phpmailer->SMTPDEbug  = $cleaning_services_option['cleaning_services-smtp_SMTPDEbug'];
				}
			}
		}
	}
}

add_action( 'wp_ajax_send_mail_with_cl_service_data', 'cleaning_services_calc_post_ajax' );
add_action( 'wp_ajax_nopriv_send_mail_with_cl_service_data', 'cleaning_services_calc_post_ajax' );
add_action( 'init', 'cleaning_services_core_core_smpt_mail_setup' );

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function cleaning_services_core_load_textdomain() {
	 load_plugin_textdomain( 'cleaning_services-core', false, basename( dirname( __FILE__ ) ) . '/languages' );
	include_once plugin_dir_path( __FILE__ ) . 'redux/redux.config.php';
}

add_action( 'plugins_loaded', 'cleaning_services_core_load_textdomain' );


/**
 *
 */
if ( ! defined( 'CLEANING_SERVICE_THEME_URI' ) ) {
	define( 'CLEANING_SERVICE_THEME_URI', get_template_directory_uri() );
}
if ( ! defined( 'ULTIMA_NAME' ) ) {
	define( 'ULTIMA_NAME', 'cleaning_services-core' );
}

// add_action( 'wp_enqueue_scripts', 'cleaning_services_core_enqueue', 1001 );

// function cleaning_services_core_enqueue() {
// wp_enqueue_style( 'cleaning-services-forms', plugin_dir_url( __FILE__ ) . '/js/forms.js', 1001 );
// }


add_action( 'admin_enqueue_scripts', 'cleaning_services_core_admin_enqueue' );

function cleaning_services_core_admin_enqueue( $hook ) {
	wp_enqueue_style( 'iconfont-style', get_template_directory_uri() . '/fonts/style.css', '', null );
	// laod custom post type js
	if ( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) {
		return;
	}
}

/*
 ============================================================
 * Visual Composer shorrtcode config
 * ============================================================ */



$classesDir = array(
	PLUGIN_DIR . 'shortcode/',
	PLUGIN_DIR . 'vc_element/',
);

function __autoloadShortCode() {
	global $classesDir;
	foreach ( $classesDir as $directory ) {

		foreach ( glob( $directory . '*.php' ) as $filename ) {
			if ( file_exists( $filename ) ) {
				include_once $filename;
			}
		}
	}
}

function __autoloadVcMap() {
	__autoloadShortCode();
}

add_action( 'vc_before_init', '__autoloadVcMap' );


$classesPostTypeDir = PLUGIN_DIR . 'post_type/';

function __autoloadPostType( $directory ) {
	foreach ( glob( $directory . '*.php' ) as $filename ) {
		if ( file_exists( $filename ) ) {
			include_once $filename;
		}
	}
}

__autoloadPostType( $classesPostTypeDir );


/*
 * widgets auto load
 */


$classesWidgetsDir = PLUGIN_DIR . 'widgets/';

function __autoloadWidgets( $directory ) {
	foreach ( glob( $directory . '*.php' ) as $filename ) {
		if ( file_exists( $filename ) ) {
			include_once $filename;
		}
	}
}

__autoloadWidgets( $classesWidgetsDir );


add_action( 'cleaning_services_after_footer', 'cleaning_services_after_footer_function' );

function cleaning_services_after_footer_function() {
	if ( ! function_exists( 'cleaning_services_options' ) ) {
		return;
	}
	$cleaning_services_option = cleaning_services_options();
	$gmap_latitude            = ( isset( $cleaning_services_option['cleaning_services-gmap_latitude'] ) && ! empty( $cleaning_services_option['cleaning_services-gmap_latitude'] ) ) ? $cleaning_services_option['cleaning_services-gmap_latitude'] : '';
	$gmap_longitude           = ( isset( $cleaning_services_option['cleaning_services-gmap_longitude'] ) && ! empty( $cleaning_services_option['cleaning_services-gmap_longitude'] ) ) ? $cleaning_services_option['cleaning_services-gmap_longitude'] : '';

	// footer_map
	$mapkey = '';
	if ( isset( $cleaning_services_option['cleaning_services-gmap_api_key'] ) && ! empty( $cleaning_services_option['cleaning_services-gmap_api_key'] ) ) {
		$mapkey .= '&key=' . $cleaning_services_option['cleaning_services-gmap_api_key'];
	}
	?>

	<!-- map -->
	<div id="footer-map" class="footer-map"></div>
	<!-- /map -->  
	<!-- Google map -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false<?php echo $mapkey; ?>"></script>
	<script type="text/javascript">

		// When the window has finished loading create our google map below
		google.maps.event.addDomListener(window, 'load', init);

		function init() {
			// Basic options for a simple Google Map
			// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
			var mapOptions = {
				// How zoomed in you want the map to start at (always required)
				zoom: 14,
				// The latitude and longitude to center the map (always required)
				center: new google.maps.LatLng(<?php echo esc_html( $gmap_latitude ); ?>, <?php echo esc_html( $gmap_longitude ); ?>), // New York

				// How you would like to style the map. 
				// This is where you would paste any style found on Snazzy Maps.
				styles: [{
						"featureType": "water",
						"elementType": "geometry",
						"stylers": [{
								"color": "#e9e9e9"
							}, {
								"lightness": 17
							}]
					}, {
						"featureType": "landscape",
						"elementType": "geometry",
						"stylers": [{
								"color": "#f5f5f5"
							}, {
								"lightness": 20
							}]
					}, {
						"featureType": "road.highway",
						"elementType": "geometry.fill",
						"stylers": [{
								"color": "#ffffff"
							}, {
								"lightness": 17
							}]
					}, {
						"featureType": "road.highway",
						"elementType": "geometry.stroke",
						"stylers": [{
								"color": "#ffffff"
							}, {
								"lightness": 29
							}, {
								"weight": 0.2
							}]
					}, {
						"featureType": "road.arterial",
						"elementType": "geometry",
						"stylers": [{
								"color": "#ffffff"
							}, {
								"lightness": 18
							}]
					}, {
						"featureType": "road.local",
						"elementType": "geometry",
						"stylers": [{
								"color": "#ffffff"
							}, {
								"lightness": 16
							}]
					}, {
						"featureType": "poi",
						"elementType": "geometry",
						"stylers": [{
								"color": "#f5f5f5"
							}, {
								"lightness": 21
							}]
					}, {
						"featureType": "poi.park",
						"elementType": "geometry",
						"stylers": [{
								"color": "#dedede"
							}, {
								"lightness": 21
							}]
					}, {
						"elementType": "labels.text.stroke",
						"stylers": [{
								"visibility": "on"
							}, {
								"color": "#ffffff"
							}, {
								"lightness": 16
							}]
					}, {
						"elementType": "labels.text.fill",
						"stylers": [{
								"saturation": 36
							}, {
								"color": "#333333"
							}, {
								"lightness": 40
							}]
					}, {
						"elementType": "labels.icon",
						"stylers": [{
								"visibility": "off"
							}]
					}, {
						"featureType": "transit",
						"elementType": "geometry",
						"stylers": [{
								"color": "#f2f2f2"
							}, {
								"lightness": 19
							}]
					}, {
						"featureType": "administrative",
						"elementType": "geometry.fill",
						"stylers": [{
								"color": "#fefefe"
							}, {
								"lightness": 20
							}]
					}, {
						"featureType": "administrative",
						"elementType": "geometry.stroke",
						"stylers": [{
								"color": "#fefefe"
							}, {
								"lightness": 17
							}, {
								"weight": 1.2
							}]
					}]
			};
			// Get the HTML DOM element that will contain your map 
			// We are using a div with id="map" seen below in the <body>
			var mapElement = document.getElementById('footer-map');
			// Create the Google Map using our element and options defined above
			var map = new google.maps.Map(mapElement, mapOptions);
			var image = "
	<?php
	if ( isset( $cleaning_services_option['cleaning_services-gmap_marker'] ) && ! empty( $cleaning_services_option['cleaning_services-gmap_marker'] ) ) {
		echo $cleaning_services_option['cleaning_services-gmap_marker']['url'];
	}
	?>
			";
			// Let's also add a marker while we're at it
			// Let's also add a marker while we're at it
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(<?php echo esc_html( $gmap_latitude ); ?>, <?php echo esc_html( $gmap_longitude ); ?>),
				map: map,
				//title: '<?php esc_html_e( 'Snazzy!', 'cleaning_services' ); ?>'
				icon: image
			});
		}
	</script>

	<?php
}



function cleaning_services_add_fonts_family( $target = '' ) {
	return array(
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Icon library', ULTIMA_NAME ),
			'value'       => array(
				__( 'Cleaning Icon', ULTIMA_NAME ) => 'cleaningservicesicon',
				__( 'Font Awesome', ULTIMA_NAME )  => 'fontawesome',
				__( 'Open Iconic', ULTIMA_NAME )   => 'openiconic',
				__( 'Typicons', ULTIMA_NAME )      => 'typicons',
				__( 'Entypo', ULTIMA_NAME )        => 'entypo',
				__( 'Linecons', ULTIMA_NAME )      => 'linecons',
				__( 'Mono Social', ULTIMA_NAME )   => 'monosocial',
			),
			'param_name'  => 'icon_type' . $target,
			'description' => __( 'Select icon library.', ULTIMA_NAME ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', ULTIMA_NAME ),
			'param_name'  => 'icon_fontawesome' . $target,
			'value'       => 'fa fa-info-circle',
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type' . $target,
				'value'   => 'fontawesome',
			),
			'description' => __( 'Select icon from library.', ULTIMA_NAME ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', ULTIMA_NAME ),
			'param_name'  => 'icon_openiconic' . $target,
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'openiconic',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type' . $target,
				'value'   => 'openiconic',
			),
			'description' => __( 'Select icon from library.', ULTIMA_NAME ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', ULTIMA_NAME ),
			'param_name'  => 'icon_typicons' . $target,
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'typicons',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type' . $target,
				'value'   => 'typicons',
			),
			'description' => __( 'Select icon from library.', ULTIMA_NAME ),
		),
		array(
			'type'       => 'iconpicker',
			'heading'    => __( 'Icon', ULTIMA_NAME ),
			'param_name' => 'icon_entypo' . $target,
			'settings'   => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'entypo',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type' . $target,
				'value'   => 'entypo',
			),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', ULTIMA_NAME ),
			'param_name'  => 'icon_linecons' . $target,
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'linecons',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type' . $target,
				'value'   => 'linecons',
			),
			'description' => __( 'Select icon from library.', ULTIMA_NAME ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', ULTIMA_NAME ),
			'param_name'  => 'icon_monosocial' . $target,
			'value'       => 'vc-mono vc-mono-fivehundredpx',
			// default value to backend editor admin_label
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'monosocial',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type' . $target,
				'value'   => 'monosocial',
			),
			'description' => __( 'Select icon from library.', ULTIMA_NAME ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', ULTIMA_NAME ),
			'param_name'  => 'icon' . $target,
			'value'       => 'icon-decor1',
			// default value to backend editor admin_label
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'cleaningservicesicon',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type' . $target,
				'value'   => 'cleaningservicesicon',
			),
			'description' => __( 'Select icon from library.', ULTIMA_NAME ),
		),
	);
}

function cleaning_services_replace_icon_html( $atts, $target = '' ) {
	extract(
		shortcode_atts(
			array(
				'icon' . $target             => '',
				'heading' . $target          => '',
				'description' . $target      => '',
				'icon_type' . $target        => '',
				'type' . $target             => 'cleaningservicesicon',
				'icon_fontawesome' . $target => '',
				'icon_openiconic' . $target  => '',
				'icon_typicons' . $target    => '',
				'icon_entypo' . $target      => '',
				'icon_linecons' . $target    => '',
				'icon_monosocial' . $target  => '',
			),
			$atts
		)
	);
	if ( ${'icon_type' . $target} == '' ) {
		$icon_type = ${'type' . $target};
		$icon      = ${'icon' . $target};
	} else {
		$icon_type = ${'icon_type' . $target};
	}
	if ( ( $icon_type ) != 'cleaningservicesicon' && ! empty( $icon_type ) && function_exists( 'vc_icon_element_fonts_enqueue' ) ) {
		vc_icon_element_fonts_enqueue( $icon_type );
		if ( ${'icon_' . $icon_type . $target} != '' ) {
			$icon = ${'icon_' . $icon_type . $target};
		}
	}
	return $icon;
}

add_filter( 'replace_icon_html', 'cleaning_services_replace_icon_html', 1, 2 );

/*
 * fonts auto load
 */

require_once PLUGIN_DIR . 'fonts-loader.php';

/*
 * Gallery load
 */

require_once PLUGIN_DIR . '/lib/sds_cpt_gallery.php';
/*
 * sidebar load
 */
require_once PLUGIN_DIR . '/lib/sidebar_generator.php';

/*
 * Meta Box Configuration Post Meta Option
 */
require_once PLUGIN_DIR . '/lib/config.meta.box.php';


add_action( 'wp_loaded', 'envato_theme_license_dashboard_remove_js_composser_hook_core', 99 );

function envato_theme_license_dashboard_remove_js_composser_hook_core() {
	global $wp_filter;
	if ( isset( $wp_filter['upgrader_pre_download'] ) ) {
		if ( isset( $wp_filter['upgrader_pre_download']->callbacks[10] ) ) {
			foreach ( $wp_filter['upgrader_pre_download']->callbacks[10] as $key => $value ) {
				if ( strpos( $key, 'preUpgradeFilter' ) !== false ) {
					remove_filter( 'upgrader_pre_download', $key, 10, $wp_filter['upgrader_pre_download']->callbacks[10][ $key ]['accepted_args'] );
					break;
				}
			}
		}
	}

}



// Hook called when the plugin is activated.
add_action( 'plugins_loaded', 'cleaning_services_function_elem_cpt_support' );
function cleaning_services_function_elem_cpt_support() {
	$cpt_support = get_option( 'elementor_cpt_support' );
	if ( ! $cpt_support ) {
		// First check if the option is not available already in the database. It not then create the array with all default post types including yours and save the settings.
		$cpt_support = array( 'page', 'post', 'cleaning_services' );
		update_option( 'elementor_cpt_support', $cpt_support );
	} elseif ( ! in_array( 'cleaning_services', $cpt_support ) ) {
		// If the option is available then just append the array and update the settings.
		$cpt_support[] = 'cleaning_services';
		update_option( 'elementor_cpt_support', $cpt_support );
	}
}