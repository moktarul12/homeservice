<?php
/**
 * Cleaning-services Services functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cleaning_Services
 */
if ( ! defined( 'CLEANING_SERVICES_THEME_URI' ) ) {
	define( 'CLEANING_SERVICES_THEME_URI', get_template_directory_uri() );
}
define( 'CLEANING_SERVICES_THEME_DIR', get_template_directory() );
define( 'CLEANING_SERVICES_CSS_URL', get_template_directory_uri() . '/css' );
define( 'CLEANING_SERVICES_JS_URL', get_template_directory_uri() . '/js' );
define( 'CLEANING_SERVICES_IMG_URL', CLEANING_SERVICES_THEME_URI . '/images/' );
define( 'CLEANING_SERVICES_FREAMWORK_DIRECTORY', CLEANING_SERVICES_THEME_DIR . '/framework/' );
define( 'CLEANING_SERVICES_INC_DIRECTORY', CLEANING_SERVICES_THEME_DIR . '/inc/' );
define( 'CLEANING_SERVICES_VC_MAP', CLEANING_SERVICES_THEME_DIR . '/vc_element/' );

/*
 * plugin.php has to load to know which plugin is active
 */
require_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once CLEANING_SERVICES_FREAMWORK_DIRECTORY . 'plugin-list.php';

/*
 * Enable support TGM features.
 */
require_once CLEANING_SERVICES_FREAMWORK_DIRECTORY . 'class-tgm-plugin-activation.php';

/*
 * Load Theme Customizer.
 */
require_once CLEANING_SERVICES_FREAMWORK_DIRECTORY . 'framework_customizer.php';

/*
 * Redux framework configuration
 */
require_once CLEANING_SERVICES_FREAMWORK_DIRECTORY . 'redux.fallback.php';
require_once CLEANING_SERVICES_FREAMWORK_DIRECTORY . 'redux.config.php';

/*
 * Enable support TGM configuration.
 */
require_once CLEANING_SERVICES_FREAMWORK_DIRECTORY . 'config.tgm.php';


/*
 * Load Menu Walker
 */
require_once CLEANING_SERVICES_FREAMWORK_DIRECTORY . 'nav_menu_walker.php';

/*
 * Load Theme Menu
 */

require CLEANING_SERVICES_FREAMWORK_DIRECTORY . '/dashboard/class-dashboard.php';

/**
 * Implement the post meta.
 */
require get_template_directory() . '/inc/post_meta.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * comment walker.
 */
require get_template_directory() . '/inc/class-walker-comment.php';

if ( ! function_exists( 'cleaning_services_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cleaning_services_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Pool Services, use a find and replace
		 * to change 'cleaning-services' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cleaning-services', get_template_directory() . '/languages' );

		add_editor_style( CLEANING_SERVICES_CSS_URL . '/editor-style.css' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'     => esc_html__( 'Primary', 'cleaning-services' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'cleaning-services' ),
			)
		);

		$defaults = array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);

		add_theme_support( 'custom-header', $defaults );

		/*
		 * Enable support for custom-background.
		 */
		$defaults = array(
			'default-color'          => '',
			'default-image'          => '',
			'default-repeat'         => '',
			'default-position-x'     => '',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		/*
		 * Enable support for Post Formats.
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'gallery',
				'audio',
				'video',
				'link',
				'quote',
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );

		// Add custom thumb size
		set_post_thumbnail_size( 870, 483, false );
		add_image_size( 'cleaning-services-thumbnail-carousel', 309, 309, true );
		add_image_size( 'cleaning-services-thumbnail', 357, 242, true );
		add_image_size( 'cleaning-services-coupon', 570, 310, true );
		add_image_size( 'cleaning-services-gallery-thumbnail', 369, 369, true );
		add_image_size( 'cleaning-services-testimonial', 653, 235, true );
		add_image_size( 'cleaning-services-service-full', 870, 500, true );
		add_image_size( 'cleaning-services-blog_post_featured_image', 270, 150, true );
		add_image_size( 'cleaning-blog-grid', 370, 249, true );
	}

endif;

add_action( 'after_setup_theme', 'cleaning_services_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'cleaning_services_content_width' ) ) :

	function cleaning_services_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'cleaning_services_content_width', 640 );
	}

endif;

add_action( 'after_setup_theme', 'cleaning_services_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( 'cleaning_services_widgets_init' ) ) :

	function cleaning_services_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog Sidebar', 'cleaning-services' ),
				'id'            => 'blog_sideber',
				'description'   => esc_html__( 'Blog sidebar area', 'cleaning-services' ),
				'before_widget' => '<div class="%2$s side-block widget" id="%1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-aside">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Services Sidebar', 'cleaning-services' ),
				'id'            => 'servicesidebar',
				'description'   => esc_html__( 'Service sidebar area', 'cleaning-services' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="">',
				'after_title'   => '</h4>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Contact Info', 'cleaning-services' ),
				'id'            => 'contact_list',
				'description'   => esc_html__( 'Contacts Area', 'cleaning-services' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="">',
				'after_title'   => '</h4>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column 1', 'cleaning-services' ),
				'id'            => 'footer_col_1',
				'description'   => esc_html__( 'Footer Area', 'cleaning-services' ),
				'before_widget' => '<div id="%1$s" class="widget page-footer-text %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="">',
				'after_title'   => '</h4>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column 2', 'cleaning-services' ),
				'id'            => 'footer_col_2',
				'description'   => esc_html__( 'Footer Area', 'cleaning-services' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="">',
				'after_title'   => '</h4>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column 3', 'cleaning-services' ),
				'id'            => 'footer_col_3',
				'description'   => esc_html__( 'Footer Area', 'cleaning-services' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="">',
				'after_title'   => '</h4>',
			)
		);

		// add by tanvir
		register_sidebar(
			array(
				'name'          => esc_html__( 'Woo Shop Sidebar', 'cleaning-services' ),
				'id'            => 'woo_shop_sideber',
				'description'   => esc_html__( 'Shop sidebar area', 'cleaning-services' ),
				'before_widget' => '<div class="%2$s side-block widget" id="%1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="title-aside">',
				'after_title'   => '</h4>',
			)
		);
		// end add by tanvir
	}

endif;

add_action( 'widgets_init', 'cleaning_services_widgets_init' );



if ( ! function_exists( 'cleaning_services_loop_columns' ) ) :

	function cleaning_services_loop_columns() {
		if ( is_product() ) {
			return 4;
		}
		return 3;
	}

endif;

add_filter( 'loop_shop_columns', 'cleaning_services_loop_columns' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'cleaning_services_front_init_js_var' ) ) :

	function cleaning_services_front_init_js_var() {
		global $yith_wcwl, $post, $product;
		wp_localize_script( 'cleaning-services-custom', 'THEMEURL', array( 'url' => CLEANING_SERVICES_THEME_URI ) );
		wp_localize_script( 'cleaning-services-custom', 'IMAGEURL', array( 'url' => CLEANING_SERVICES_THEME_URI . '/images' ) );
		wp_localize_script( 'cleaning-services-custom', 'CSSURL', array( 'url' => CLEANING_SERVICES_THEME_URI . '/css' ) );
	}

endif;

add_action( 'wp_enqueue_scripts', 'cleaning_services_front_init_js_var', 1001 );

/*
  default config variable
 */
$fonts_areas = array(
	'cleaning_services-body_typography',
	'cleaning_services-heading-1-typography',
	'cleaning_services-heading-2-typography',
	'cleaning_services-heading-3-typography',
	'cleaning_services-heading-4-typography',
	'cleaning_services-heading-5-typography',
	'cleaning_services-heading-6-typography',
	'cleaning_services-widget_title_typography',
);




if ( ! function_exists( 'cleaning_services_fonts_url' ) ) :

	function cleaning_services_fonts_url() {
		$cleaning_services_opt = cleaning_services_options();
		global $fonts_areas;
		$protocol           = is_ssl() ? 'https' : 'http';
		$subsets            = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
		$variants           = ':100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i';
		$font_families      = array();
		$font_families_name = array();

		if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
			$open_sans = _x( 'on', 'Open Sans font: on or off', 'cleaning-services' );
			if ( 'off' !== $open_sans ) {
				$font_families[]      = 'Open Sans' . $variants;
				$font_families_name[] = 'Open Sans';
			}
		}
		foreach ( $fonts_areas as $option ) {
			if ( isset( $cleaning_services_opt[ $option ]['font-family'] ) && $cleaning_services_opt[ $option ]['font-family'] && ! in_array( $cleaning_services_opt[ $option ]['font-family'], $font_families_name ) ) {
				$font_families_name[] = $cleaning_services_opt[ $option ]['font-family'];
				foreach ( explode( ',', $cleaning_services_opt[ $option ]['font-family'] ) as  $fontvalue ) {
					$fontvalue       = str_replace( "'", '', $fontvalue );
					$fontvalue       = trim( $fontvalue );
					$font_families[] = $fontvalue . $variants;
				}
			}
		}

		if ( ! empty( $font_families ) ) {
			$fonts_url = add_query_arg(
				array(
					'family' => urlencode( implode( '|', $font_families ) ),
					'subset' => urlencode( $subsets ),
				),
				$protocol . '://fonts.googleapis.com/css'
			);
		}
		return esc_url_raw( $fonts_url );
	}

endif;




function cleaning_services_scripts_styles() {
	wp_enqueue_style( 'cleaning-services-fonts', cleaning_services_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'cleaning_services_scripts_styles' );



/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'cleaning_services_scripts' ) ) :

	function cleaning_services_scripts() {
		$cleaning_services_opt = cleaning_services_options();
		/*
		 ===============================================================
		 * CSS Files
		 * --------------------------------------------------------------- */

		/* BOOTSTRAP  ------------------------- */
		wp_enqueue_style( 'bootstrap', CLEANING_SERVICES_CSS_URL . '/vendor/bootstrap.min.css', '', null );
		wp_enqueue_style( 'animate', CLEANING_SERVICES_CSS_URL . '/vendor/animate.min.css', '', null );
		wp_enqueue_style( 'slick', CLEANING_SERVICES_CSS_URL . '/vendor/slick.css', '', null );
		wp_enqueue_style( 'light', CLEANING_SERVICES_CSS_URL . '/vendor/lightbox.css', '', null );
		wp_enqueue_style( 'cleaning-services-shop', CLEANING_SERVICES_CSS_URL . '/shop.css', '', time() );
		wp_enqueue_style( 'nouislider', CLEANING_SERVICES_CSS_URL . '/vendor/nouislider.css', '', null );
		wp_enqueue_style( 'cleaning-services-style', get_stylesheet_uri(), false, time() );
		wp_enqueue_style( 'cleaning-services-wp-default-norm', CLEANING_SERVICES_CSS_URL . '/wp-default-norm.css', '', null );
		wp_enqueue_style( 'bootstrap-datetimepicker', CLEANING_SERVICES_CSS_URL . '/vendor/bootstrap-datetimepicker.css', '', null );

		wp_enqueue_style( 'icomoon', CLEANING_SERVICES_THEME_URI . '/fonts/style.css', '', time() );

		require_once CLEANING_SERVICES_THEME_DIR . '/css/custom_style.php';

		$cleaning_services_custom_inline_style = '';
		if ( function_exists( 'cleaning_services_get_custom_styles' ) ) {
			$cleaning_services_custom_inline_style = cleaning_services_get_custom_styles();
		}

		wp_add_inline_style( 'cleaning-services-style', $cleaning_services_custom_inline_style );

		/*
		 ===============================================================
		 * JS Files
		 * --------------------------------------------------------------- */
		wp_enqueue_script( 'bootstrap', CLEANING_SERVICES_JS_URL . '/vendor/bootstrap.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'slick', CLEANING_SERVICES_JS_URL . '/vendor/slick.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'isotope-pkgd', CLEANING_SERVICES_JS_URL . '/vendor/isotope.pkgd.min.js', array( 'jquery', 'imagesloaded' ), '', true );
		wp_enqueue_script( 'cleaning-lightbox', CLEANING_SERVICES_JS_URL . '/vendor/lightbox.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-form', CLEANING_SERVICES_JS_URL . '/vendor/jquery.form.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'doubletaptogo', CLEANING_SERVICES_JS_URL . '/vendor/jquery.doubletaptogo.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-validate', CLEANING_SERVICES_JS_URL . '/vendor/jquery.validate.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'moment', CLEANING_SERVICES_JS_URL . '/vendor/moment.js', array( 'jquery' ), '', true );
		if ( isset( $cleaning_services_opt['cleaning_services-js_for_calender_lang'] ) && $cleaning_services_opt['cleaning_services-js_for_calender_lang'] != '' ) {
			wp_enqueue_script( 'forms-lang', $cleaning_services_opt['cleaning_services-js_for_calender_lang'], array( 'jquery', 'moment' ), '', true );
		}
		wp_enqueue_script( 'bootstrap-datetimepicker', CLEANING_SERVICES_JS_URL . '/vendor/bootstrap-datetimepicker.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-waypoints', CLEANING_SERVICES_JS_URL . '/vendor/jquery.waypoints.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-countTo', CLEANING_SERVICES_JS_URL . '/vendor/jquery.countTo.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-print', CLEANING_SERVICES_JS_URL . '/vendor/jquery.print.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-dotdotdot', CLEANING_SERVICES_JS_URL . '/vendor/jquery.dotdotdot.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'nouislider', CLEANING_SERVICES_JS_URL . '/vendor/nouislider.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-elevateZoom', CLEANING_SERVICES_JS_URL . '/vendor/jquery.elevateZoom-3.0.8.min.js', array( 'jquery' ), '', true );

		wp_enqueue_script( 'jquery-wNumb', CLEANING_SERVICES_JS_URL . '/vendor/wNumb.js', array( 'jquery' ), '', true );
		/* ====================== Custom JavaScripts -- */

		wp_enqueue_script( 'cleaning-services-custom', CLEANING_SERVICES_JS_URL . '/custom.js', array( 'jquery', 'jquery-ui-spinner' ), time(), true );
		wp_enqueue_script( 'cleaning-services-forms', CLEANING_SERVICES_JS_URL . '/forms.js', array( 'jquery', 'jquery-wNumb' ), time(), true );
		$changed_atts = array(
			'mobile_first'     => 'false',
			'slides_to_show'   => '2',
			'slides_to_scroll' => '1',
			'infinite'         => 'false',
			'autoplay'         => 'true',
			'autoplay_speed'   => '2000',
			'dots'             => 'true',
			'arrows'           => 'true',
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_coupon', $changed_atts );

		wp_localize_script(
			'cleaning-services-custom',
			'cleaning_services_ajax_object',
			array(
				'ajax_nonce_servicecart' => wp_create_nonce( 'servicecart' ),
				'ajax_nonce_removecart'  => wp_create_nonce( 'removecart' ),
				'form_date_format'       => $cleaning_services_opt['cleaning_services-form_date_format'],
				'ajax_url'               => esc_url( admin_url( 'admin-ajax.php' ) ),
				'loader_img'             => esc_url( CLEANING_SERVICES_IMG_URL . 'ajax-loader.gif' ),
				'all_service'            => esc_html__(
					'All Services',
					'cleaning-services'
				),
			)
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;

add_action( 'wp_enqueue_scripts', 'cleaning_services_scripts', 10000 );



function cleaning_gutenberg_editor_palette_styles() {
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'strong yellow', 'cleaning-services' ),
				'slug'  => 'strong-yellow',
				'color' => '#f7bd00',
			),
			array(
				'name'  => esc_html__( 'strong white', 'cleaning-services' ),
				'slug'  => 'strong-white',
				'color' => '#fff',
			),
			array(
				'name'  => esc_html__( 'light black', 'cleaning-services' ),
				'slug'  => 'light-black',
				'color' => '#242424',
			),
			array(
				'name'  => esc_html__( 'very light gray', 'cleaning-services' ),
				'slug'  => 'very-light-gray',
				'color' => '#797979',
			),
			array(
				'name'  => esc_html__( 'very dark black', 'cleaning-services' ),
				'slug'  => 'very-dark-black',
				'color' => '#000000',
			),
		)
	);

	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name' => esc_html__( 'Small', 'cleaning-services' ),
				'size' => 10,
				'slug' => 'small',
			),
			array(
				'name' => esc_html__( 'Normal', 'cleaning-services' ),
				'size' => 15,
				'slug' => 'normal',
			),
			array(
				'name' => esc_html__( 'Large', 'cleaning-services' ),
				'size' => 24,
				'slug' => 'large',
			),
			array(
				'name' => esc_html__( 'Huge', 'cleaning-services' ),
				'size' => 36,
				'slug' => 'huge',
			),
		)
	);
}
add_action( 'after_setup_theme', 'cleaning_gutenberg_editor_palette_styles' );


function cleaning_add_editor_styles() {
	 add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'cleaning_add_editor_styles' );


function cleaning_services_theme_slug_scripts_styles() {
	wp_enqueue_style( 'cleaning-theme-slug-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800', '', null );
}

add_action( 'admin_enqueue_scripts', 'cleaning_services_theme_slug_scripts_styles' );


function cleaning_block_editor_styles() {
	wp_enqueue_style( 'cleaning-block-styles', get_theme_file_uri( 'css/all-block.css' ), false, '1.0', 'all' );
}

add_action( 'admin_enqueue_scripts', 'cleaning_block_editor_styles' );

if ( ! function_exists( 'cleaning_services_breadcrumb' ) ) :

	function cleaning_services_breadcrumb() {
		global $post, $cleaning_services_opt;
		if ( ! isset( $post->ID ) ) {
			return false;
		}
		if ( ! is_front_page() || is_home() ) {
			if ( ( isset( $post->post_type ) && is_page() ) || is_search() || is_home() || is_single() || is_archive() || is_category() ) {
				$show_breadcrumb = 'on';
				if ( $show_breadcrumb == 'on' || ! $show_breadcrumb ) {
					?>
					<div class="block breadcrumbs">
						<div class="container">
							<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
								<div class="breadcrumb">
									<?php
									yoast_breadcrumb( '', '' );
									?>
								</div>
							<?php } ?>
						</div>
					</div>
					<?php
				}
			}
		}
	}

endif;

add_action( 'cleaning_services_breadcrumb', 'cleaning_services_breadcrumb' );

if ( ! function_exists( 'cleaning_services_comment_nav' ) ) :

	function cleaning_services_comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
			<nav class="navigation comment-navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cleaning-services' ); ?></h2>
				<div class="nav-links">
					<?php
					if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'cleaning-services' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'cleaning-services' ) ) ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
					?>
				</div>
			</nav>
			<?php
		endif;
	}

endif;


/*
 * ****************************************************************
 * Ajax Posts loading
 * ***************************************************************** */
if ( ! function_exists( 'cleaning_services_testimonial_more_post_ajax' ) ) :

	function cleaning_services_testimonial_more_post_ajax() {
		check_ajax_referer( 'testimonial_more', 'security' );
		$args  = array(
			'posts_per_page' => sanitize_text_field( $_POST['post_per_page'] ),
			'post_type'      => 'cleaning-testimonial',
			'orderby'        => 'DESC',
			'paged'          => sanitize_text_field( $_POST['paged'] ),
			'no_found_rows'  => true,
		);
		$style = sanitize_text_field( $_POST['grid_style'] );
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				global $post;
				$post->style = $style;
				get_template_part( 'template-parts/testimonial', get_post_format() );
			}
		} else {
		}
		wp_reset_postdata();
		die();
	}

endif;

add_action( 'wp_ajax_testimonial_more_post_ajax', 'cleaning_services_testimonial_more_post_ajax' );
add_action( 'wp_ajax_nopriv_testimonial_more_post_ajax', 'cleaning_services_testimonial_more_post_ajax' );



if ( ! function_exists( 'cleaning_services_coupon_popup_ajax' ) ) :

	function cleaning_services_coupon_popup_ajax() {
		check_ajax_referer( 'coupon_popup', 'security' );
		$post_id             = sanitize_text_field( $_POST['post_id'] );
		$coupon_top_left     = get_post_meta( $post_id, 'framework-coupon-top-left', true );
		$coupon_top_right    = get_post_meta( $post_id, 'framework-coupon-top-right', true );
		$coupon_bottom_left  = get_post_meta( $post_id, 'framework-coupon-bottom-left', true );
		$coupon_bottom_right = get_post_meta( $post_id, 'framework-coupon-bottom-right', true );
		?>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><?php echo esc_html__( 'Coupon', 'cleaning-services' ); ?></h4>
					</div>
					<div class="modal-body" id="modal-coupon">
						<div>
							<div class="coupon-print">
								<div class="coupon-print-inside">
									<div class="coupon-print-row-top">
										<div class="coupon-print-col-left">
											<i><?php echo esc_html( $coupon_top_left ); ?> </i>
										</div>
										<div class="coupon-print-col-right">
											<div class="contact-info"><i class="icon icon-locate"></i>
												<?php echo esc_html( $coupon_top_right ); ?>
											</div>
										</div>
									</div>
									<?php echo get_the_post_thumbnail( $post_id, 'cleaning-services-coupon', array( 'class' => 'img-responsive-inline' ) ); ?>
									<div class="coupon-print-row-bot">
										<div class="coupon-print-col-left">
											<?php echo esc_html( $coupon_bottom_left ); ?>
										</div>
										<div class="coupon-print-col-right text-right">
											<?php echo esc_html( $coupon_bottom_right ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="btn_save_close" class="btn btn-default" data-dismiss="modal"><?php echo esc_html__( 'Close', 'cleaning-services' ); ?></button>
						<button id="btn_save_and_close" type="button" class="btn btn-primary"><?php echo esc_html__( 'Print', 'cleaning-services' ); ?> </button>
					</div>
				</div>
			</div>
		</div>
		<?php
		exit();
	}

endif;

add_action( 'wp_ajax_coupon_popup_ajax', 'cleaning_services_coupon_popup_ajax' );
add_action( 'wp_ajax_nopriv_coupon_popup_ajax', 'cleaning_services_coupon_popup_ajax' );

if ( ! function_exists( 'woocommerce_output_upsells' ) ) :
	function woocommerce_output_upsells() {
		woocommerce_upsell_display( 4, 4 );
	}
endif;

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

if ( ! function_exists( 'woocommerce_output_cross_sell_display' ) ) :
	function woocommerce_output_cross_sell_display() {
		woocommerce_cross_sell_display( 2, 2 );
	}
endif;

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_output_cross_sell_display', 15 );

if ( ! function_exists( 'cleaning_services_view_product_design' ) ) :
	function cleaning_services_view_product_design() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'cleaning_services_view_product_design' );


if ( ! function_exists( 'cleaning_services_add_to_cart_fragment' ) ) :
	function cleaning_services_add_to_cart_fragment( $fragments ) {
		ob_start();
		$count            = WC()->cart->cart_contents_count;
		$conditionarray   = array();
		$conditionarray[] = $count > 0;
		$conditionarray[] = is_shop();
		$conditionarray[] = is_product_category();
		$conditionarray[] = is_product();
		$conditionarray[] = is_cart();
		if ( wp_is_mobile() && count( array_unique( $conditionarray ) ) === 1 ) {
		} else {
			?>
			<a class="cart-contents icon icon-cart cart-list" href="<?php echo esc_js( 'javascript:void(0);' ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'cleaning-services' ); ?>">
				<?php
				if ( $count > 0 ) {
					?>
					<span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
					<?php
				}
				?>
			</a>
			<?php
		}
		$fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}
endif;

add_filter( 'woocommerce_add_to_cart_fragments', 'cleaning_services_add_to_cart_fragment' );


if ( ! function_exists( 'cleaning_services_add_to_cart_fragment_details' ) ) :
	function cleaning_services_add_to_cart_fragment_details( $fragments ) {
		ob_start();
		?>
		<div class="header-cart-dropdown">
			<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
		</div>
		<?php
		$fragments['div.header-cart-dropdown'] = ob_get_clean();
		return $fragments;
	}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'cleaning_services_add_to_cart_fragment_details' );

if ( ! function_exists( 'cleaning_services_remove_item_from_cart' ) ) :
	function cleaning_services_remove_item_from_cart() {
		$cart = WC()->instance()->cart;
		$id   = sanitize_text_field( $_POST['product_id'] );

		if ( 'product_variation' === get_post_type( $id ) ) {
			$variation_id = $id;
			$id           = wp_get_post_parent_id( $variation_id );
		}
		if ( isset( $_POST['cid'] ) && $_POST['cid'] != '' ) {
			$cart_item_id = $cart->find_product_in_cart( $_POST['cid'] );
		} else {
			if ( isset( $_POST['vid'] ) && $_POST['vid'] != '0' ) {
				$cart_id = $cart->generate_cart_id( $id, $_POST['vid'] );
			} else {
				$cart_id = $cart->generate_cart_id( $id );
			}
			$cart_item_id = $cart->find_product_in_cart( $cart_id );
		}

		$array = array();
		if ( $cart_item_id ) {
			$cart->set_quantity( $cart_item_id, 0 );
			WC_AJAX::get_refreshed_fragments();
		} else {
			$array['error'] = true;
			echo json_encode( $array );
		}

		exit();
	}

endif;

add_action( 'wp_ajax_remove_item_from_cart', 'cleaning_services_remove_item_from_cart' );
add_action( 'wp_ajax_nopriv_remove_item_from_cart', 'cleaning_services_remove_item_from_cart' );

// service cart add
require_once CLEANING_SERVICES_INC_DIRECTORY . 'priceclass.php';

add_filter( 'woocommerce_add_cart_item', 'cleaning_service_add_cart_item', 10, 2 );
if ( ! function_exists( 'cleaning_service_add_cart_item' ) ) {

	function cleaning_service_add_cart_item( $cart_item, $cart_id ) {
		$post_type = get_post_type( $cart_item['data']->get_id() );
		$cart_item['data']->set_props(
			array(
				'product_id'     => $cart_item['product_id'],
				'check_in_date'  => $cart_item['check_in_date'],
				'check_out_date' => $cart_item['check_out_date'],
				'woo_cart_id'    => $cart_id,
			)
		);
		return $cart_item;
	}
}

add_filter( 'woocommerce_product_class', 'cleaning_service_product_class', 10, 4 );
if ( ! function_exists( 'cleaning_service_product_class' ) ) {
	function cleaning_service_product_class( $classname, $product_type, $post_type, $product_id ) {

		if ( $product_id == 0 && '' == get_post_type( $product_id ) ) {
			return $classname;
		}
		if ( 'product' != get_post_type( $product_id ) && 'product_variation' != get_post_type( $product_id ) ) {
			$classname = 'CR_WC_Product_Device';
		}

		return $classname;
	}
}

add_action( 'wp_ajax_service_add_to_cart', 'cleaning_service_add_to_cart' );
add_action( 'wp_ajax_nopriv_service_add_to_cart', 'cleaning_service_add_to_cart' );

if ( ! function_exists( 'cleaning_service_add_to_cart' ) ) {

	function cleaning_service_add_to_cart() {
		global $woocommerce;
		if ( ! $woocommerce || ! $woocommerce->cart ) {
			return $_POST['product_id'];
		}
		WC()->session->set( 'custom_price' . (int) $_POST['product_id'], ( $_POST['price'] ) );
		$cart_items     = $woocommerce->cart->get_cart();
		$woo_cart_param = array(
			'product_id'     => $_POST['product_id'],
			'check_in_date'  => '',
			'check_out_date' => '',
			'quantity'       => $_POST['quantity'],
			'service_name'   => $_POST['service_name'],
		);

		$woo_cart_id = $woocommerce->cart->generate_cart_id( $woo_cart_param['product_id'], null, array(), $woo_cart_param );

		if ( array_key_exists( $woo_cart_id, $cart_items ) ) {
			$woocommerce->cart->set_quantity( $woo_cart_id, $_POST['quantity'] );
		} else {
			$woocommerce->cart->add_to_cart( $woo_cart_param['product_id'], $woo_cart_param['quantity'], null, array(), $woo_cart_param );
		}
		$woocommerce->cart->calculate_totals();
		// Save cart to session
		$woocommerce->cart->set_session();
		// Maybe set cart cookies
		$woocommerce->cart->maybe_set_cart_cookies();
		echo 'success';
		wp_die();
	}
}


if ( ! function_exists( 'wc_add_to_cart_message_html_func' ) ) :
	function wc_add_to_cart_message_html_func( $message, $product_id ) {
		$message = preg_replace( '#<a.*?>([^>]*)</a>#i', '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-invert wc-forward">' . esc_html__( 'View cart', 'cleaning-services' ) . '</a>', $message );
		return $message;
	}
endif;
add_filter( 'wc_add_to_cart_message_html', 'wc_add_to_cart_message_html_func', 10, 2 );

if ( ! function_exists( 'cleaning_services_woocommerce_add_error' ) ) :
	function cleaning_services_woocommerce_add_error( $error ) {
		$error = preg_replace( '#<a.*?>([^>]*)</a>#i', '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-invert wc-forward">' . esc_html__( 'View cart', 'cleaning-services' ) . '</a>', $error );
		return $error;
	}
endif;
add_filter( 'woocommerce_add_error', 'cleaning_services_woocommerce_add_error' );

if ( ! function_exists( 'woocommerce_widget_shopping_cart_button_view_cart' ) ) :

	function woocommerce_widget_shopping_cart_button_view_cart() {
		echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn wc-forward">' . esc_html__( 'View cart', 'cleaning-services' ) . '</a>';
	}

endif;

if ( ! function_exists( 'woocommerce_widget_shopping_cart_proceed_to_checkout' ) ) :
	function woocommerce_widget_shopping_cart_proceed_to_checkout() {
		echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="btn btn-invert checkout wc-forward">' . esc_html__( 'Checkout', 'cleaning-services' ) . '</a>';
	}
endif;

if ( ! function_exists( 'woocommerce_template_loop_add_to_cart' ) ) :
	function woocommerce_template_loop_add_to_cart( $args = array() ) {
		global $product;
		if ( $product ) {
			$defaults = array(
				'quantity' => 1,
				'class'    => implode(
					' ',
					array_filter(
						array(
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
						)
					)
				),
			);
			$args     = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
			wc_get_template( 'loop/add-to-cart.php', $args );
		}
	}
endif;



if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) :
	function woocommerce_template_loop_product_title() {
		echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
	}
endif;

if ( ! function_exists( 'woocommerce_get_sidebar' ) ) :
	function woocommerce_get_sidebar() {
		if ( ! is_product() ) {
			dynamic_sidebar( 'woo_shop_sideber' );
		}
	}
endif;

if ( ! function_exists( 'woocommerce_pagination' ) ) :
	function woocommerce_pagination( $a = false ) {
		if ( ! $a ) {
			wc_get_template( 'loop/pagination.php' );
		} else {
			wc_get_template( 'loop/pagination-top.php' );
		}
	}
endif;

if ( ! function_exists( 'cleaning_services_options' ) ) :
	function cleaning_services_options() {
		global $cleaning_services_opt;
		return $cleaning_services_opt;
	}
endif;


if ( ! function_exists( 'cleaning_services_loop_shop_per_page' ) ) {
	function cleaning_services_loop_shop_per_page( $cols ) {
		$cols = 9;
		return $cols;
	}
}
add_filter( 'loop_shop_per_page', 'cleaning_services_loop_shop_per_page', 20 );


if ( ! function_exists( 'cleaning_services_modify_read_more_link' ) ) :
	function cleaning_services_modify_read_more_link() {
		return '<div class="post-read-more"><a href="' . get_permalink() . '" class="btn">' . esc_html__( 'Read Post', 'cleaning-services' ) . '</a></div>';
	}
endif;
add_filter( 'the_content_more_link', 'cleaning_services_modify_read_more_link' );

add_filter( 'woocommerce_breadcrumb_defaults', 'cleaning_services_breadcrumb_delimiter' );
function cleaning_services_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = ' <i class="icon-right-arrow"></i> ';
	return $defaults;
}

add_action( 'vc_before_init', 'cleaning_services_vcsetsstheme' );
function cleaning_services_vcsetsstheme() {
	vc_set_as_theme();
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

/**
 * Add kses wp.
 */
function cleaning_kses_allowed_html( $cleaning_tags, $cleaning_context ) {
	switch ( $cleaning_context ) {
		case 'cleaning_kses':
			$cleaning_tags = array(
				'div'    => array(
					'class' => array(),
				),
				'ul'     => array(
					'class' => array(),
				),
				'li'     => array(),
				'span'   => array(
					'class' => array(),
				),
				'a'      => array(
					'href'  => array(),
					'class' => array(),
				),
				'i'      => array(
					'class' => array(),
				),
				'p'      => array(),
				'em'     => array(),
				'br'     => array(),
				'strong' => array(),
				'h1'     => array(),
				'h2'     => array(),
				'h3'     => array(),
				'h4'     => array(),
				'h5'     => array(),
				'h6'     => array(),
				'del'    => array(),
				'ins'    => array(),
			);
			return $cleaning_tags;
		case 'cleaning_img':
			$cleaning_tags = array(
				'img' => array(
					'class'  => array(),
					'height' => array(),
					'width'  => array(),
					'src'    => array(),
					'alt'    => array(),
				),
			);
			return $cleaning_tags;
		default:
			return $cleaning_tags;

	}
}

add_filter( 'wp_kses_allowed_html', 'cleaning_kses_allowed_html', 10, 2 );


function cleaning_elementor_library() {
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if ( ! empty( $pageslist ) ) {
		foreach ( $pageslist as $page ) {
			$pagearray[ $page->ID ] = $page->post_title;
		}
	}
	return $pagearray;
}

function cleaning_search_redirect($query) {
	if ( !is_admin() && $query->is_main_query())
	if(isset($_GET['s']) && $_GET['s']==''){ 
		if($query->is_search){
		   wp_redirect( home_url() ); exit;
		}
	}
}
add_action('pre_get_posts','cleaning_search_redirect');