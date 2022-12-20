<?php
add_action( 'admin_enqueue_scripts', 'cleaning_services_core_admin_fonts_enqueue' );
function cleaning_services_core_admin_fonts_enqueue() {
	wp_enqueue_style( 'iconfont-style', get_template_directory_uri() . '/iconfont/style.css', '', null );
}


/* **************************************************************
 * Get Theme Font Icon
 * ************************************************************** */
if (!function_exists('cleaning_services_get_theme_font')) {
	function &cleaning_services_get_theme_font() {
		if (isset($GLOBALS['cleaning_services_theme_icons']) && is_array($GLOBALS['cleaning_services_theme_icons'])) {
			return $GLOBALS['cleaning_services_theme_icons'];
		}
		$GLOBALS['cleaning_services_theme_icons'] = apply_filters('cleaning_services_theme_icons', array(
			
			array('icon-printer' => 'icon-printer'),
			array('icon-cancel' => 'icon-cancel'),
			array('icon-line-menu' => 'icon-line-menu'),
			array('icon-speech-bubble' => 'icon-speech-bubble'),
			array('icon-linkedin-logo' => 'icon-linkedin-logo'),
			array('icon-google-plus-logo' => 'icon-google-plus-logo'),
			array('icon-twitter-logo' => 'icon-twitter-logo'),
			array('icon-instagram-logo' => 'icon-instagram-logo'),
			array('icon-facebook-logo' => 'icon-facebook-logo'),
			array('icon-mouse' => 'icon-mouse'),
			array('icon-checked' => 'icon-checked'),
			array('icon-bubble' => 'icon-bubble'),
			array('icon-next' => 'icon-next'),
			array('icon-right-arrow' => 'icon-right-arrow'),
			array('icon-back' => 'icon-back'),
			array('icon-star-black' => 'icon-star-black'),
			array('icon-time' => 'icon-time'),
			array('icon-technology' => 'icon-technology'),
			array('icon-bell' => 'icon-bell'),
			array('icon-market' => 'icon-market'),
			array('icon-cancel2' => 'icon-cancel2'),
			array('icon-user' => 'icon-user'),
			array('icon-clock' => 'icon-clock'),
			array('icon-cleaning-spray' => 'icon-cleaning-spray'),
			array('icon-cleaning-lady' => 'icon-cleaning-lady'),
			array('icon-map-marker' => 'icon-map-marker'),
			array('icon-vacuum' => 'icon-vacuum'),
			array('icon-conversation' => 'icon-conversation'),
			array('icon-broom' => 'icon-broom'),
			array('icon-night' => 'icon-night'),
			array('icon-target' => 'icon-target'),
			array('icon-bucket' => 'icon-bucket'),
			array('icon-map-with-marker' => 'icon-map-with-marker'),
			array('icon-boss' => 'icon-boss'),
			array('icon-umbrella' => 'icon-umbrella'),
			array('icon-smiling-face' => 'icon-smiling-face'),
			array('icon-icon-check' => 'icon-icon-check'),
			array('icon-phone-call' => 'icon-phone-call'),
			array('icon-phone-lined' => 'icon-phone-lined'),
			array('icon-map-lined' => 'icon-map-lined'),
			array('icon-umbrella-lined' => 'icon-umbrella-lined'),
			array('icon-user-lined' => 'icon-user-lined'),
			array('icon-like-lined' => 'icon-like-lined'),
			array('icon-users-lined' => 'icon-users-lined'),
			array('icon-reward-lined' => 'icon-reward-lined'),
			array('icon-target-lined' => 'icon-target-lined'),
			array('icon-brush-lined' => 'icon-brush-lined'),
			array('icon-user-rating' => 'icon-user-rating'),
			array('icon-award' => 'icon-award'),
			array('icon-648324users' => 'icon-648324users'),
			array('icon-cleaning' => 'icon-cleaning'),
			array('icon-house' => 'icon-house'),
			array('icon-house-1' => 'icon-house-1'),
			array('icon-house-3' => 'icon-house-3'),
			array('icon-window' => 'icon-window'),
			array('icon-leaf' => 'icon-leaf'),
			array('icon-link' => 'icon-link'),
			array('icon-play' => 'icon-play'),
			array('icon-calc' => 'icon-calc'),
			array('icon-location' => 'icon-location'),
			array('icon-phone' => 'icon-phone'),
			array('icon-letter' => 'icon-letter'),
			array('icon-clock1' => 'icon-clock1'),
			array('icon-facebook-logo1' => 'icon-facebook-logo1'),
			array('icon-twitter-logo1' => 'icon-twitter-logo1'),
			array('icon-instagram-logo1' => 'icon-instagram-logo1'),
			array('icon-search' => 'icon-search'),
			array('icon-cart' => 'icon-cart'),

		));

		return $GLOBALS['cleaning_services_theme_icons'];
	}
}

/* **************************************************************
 * Get Theme Font Icon
 * ************************************************************** */
if (!function_exists('cleaning_services_get_theme_font')) {
	function &cleaning_services_get_theme_font() {
		if (function_exists('cleaning_services_get_theme_font')) {
			return cleaning_services_get_theme_font();
		}
		$fonts = array();
		return $fonts;
	}
}


/* **************************************************************
 * Add theme icon
 * ************************************************************** */
if (!function_exists('cleaning_services_add_theme_icon')) {
	function cleaning_services_add_theme_icon($icons){
		$icons['Cleaning Services Icon'] = &cleaning_services_get_theme_font();
		return $icons;
	}
	add_filter('vc_iconpicker-type-cleaningservicesicon','cleaning_services_add_theme_icon');
}
