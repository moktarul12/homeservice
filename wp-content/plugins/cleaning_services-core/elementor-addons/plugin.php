<?php
namespace CleaningServiceAddons;
/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.2.0
 */
class Plugin {


	/**
	 * Instance
	 *
	 * @since  1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since  1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since  1.2.0
	 * @access public
	 */
	public function widget_scripts() {

		wp_enqueue_script( 'addons-custom', plugins_url( '/assets/js/addons-script.js', __FILE__ ), array( 'jquery' ), false, true );
	}


	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since  1.2.0
	 * @access private
	 */
	private function include_widgets_files() {

		include_once __DIR__ . '/widgets/cleaning-service-slider.php';
		include_once __DIR__ . '/widgets/cleaning-about-us-tab.php';
		include_once __DIR__ . '/widgets/cleaning-how-it-work.php';
		include_once __DIR__ . '/widgets/cleaning-with-works.php';
		include_once __DIR__ . '/widgets/about-provide-list.php';
		include_once __DIR__ . '/widgets/customer-choose-us.php';
		include_once __DIR__ . '/widgets/cleaning-service-testimonial.php';
		include_once __DIR__ . '/widgets/cleaning-slider-news.php';
		include_once __DIR__ . '/widgets/cleanign-testimonial-two.php';
		include_once __DIR__ . '/widgets/cleaning-counter-box.php';
		include_once __DIR__ . '/widgets/cleaning-service-gallery.php';
		include_once __DIR__ . '/widgets/cleaing-maker-box.php';
		include_once __DIR__ . '/widgets/cleaning-price-box-tab.php';
		include_once __DIR__ . '/widgets/cleaning-team-member.php';
		include_once __DIR__ . '/widgets/cleaning-service-faq.php';
		include_once __DIR__ . '/widgets/cleaning-about-company.php';
		include_once __DIR__ . '/widgets/cleaning-icon-hor.php';
		include_once __DIR__ . '/widgets/cleaning-icon-hor.php';
		include_once __DIR__ . '/widgets/cleaning-our-vlaues.php';
		include_once __DIR__ . '/widgets/cleaning-company-history.php';
		include_once __DIR__ . '/widgets/cleaning-satification-guranted.php';
		include_once __DIR__ . '/widgets/cleaning-icon-carosel.php';
		include_once __DIR__ . '/widgets/cleaning-affiliate-office.php';
		include_once __DIR__ . '/widgets/cleaning-contact-info.php';
		include_once __DIR__ . '/widgets/cleaning-contact-from.php';
		include_once __DIR__ . '/widgets/cleaning-gallery-tab.php';
		include_once __DIR__ . '/widgets/cleaning-service-banner.php';
		include_once __DIR__ . '/widgets/cleaning-additional-service.php';
		include_once __DIR__ . '/widgets/cleaning-additional-service.php';
		include_once __DIR__ . '/widgets/cleaning-discount-box.php';
		include_once __DIR__ . '/widgets/cleaning-estimate-banner.php';
		include_once __DIR__ . '/widgets/cleaning-price-box.php';
		include_once __DIR__ . '/widgets/cleaning-choose-us-two.php';
		include_once __DIR__ . '/widgets/cleaning-our-coupon.php';
		include_once __DIR__ . '/widgets/cleaning-banner-calendar.php';
		include_once __DIR__ . '/widgets/cleaning-service-bubble.php';
		include_once __DIR__ . '/widgets/cleaning-main-slider.php';
		include_once __DIR__ . '/widgets/cleaning-brand-carousel.php';
		include_once __DIR__ . '/widgets/cleaning-service-list.php';
		include_once __DIR__ . '/widgets/service-contact-info.php';
		include_once __DIR__ . '/widgets/cleaning-cost-calculator.php';
		include_once __DIR__ . '/widgets/cleaning-gallery-tab-two.php';
		include_once __DIR__ . '/widgets/cleaning-home-office-service.php';
		include_once __DIR__ . '/widgets/cleaning-icon-howit-works.php';
		include_once __DIR__ . '/widgets/cleaning-gurantee-banner.php';

	}

	/**
	 * Register Widgets
	 *
	 * Register widgets.
	 *
	 * @since  1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();
		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Service_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_About_Us_Tab() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\How_It_Works() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\With_Us() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Some_Words() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Customer_Choose_Us() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Services_Testimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Testimonials_2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Slider_News() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Counter_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Service_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Maker_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Price_Box_Tab() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Team_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Service_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_About_Company() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Icon_Hor() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Our_Values() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Company_History() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleanign_Satisfaction_Guaranteed() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Icon_Carousel_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Affiliate_Office() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Contact_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Contact_From() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Gallery_Tab() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Service_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Additional_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Discount_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Estimate_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Price_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Choose_Us_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Our_Coupons() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Banner_Calendar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Service_Bubble() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Banner_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Brand_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Service_List() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Service_Contact_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Cost_Calculator() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Gallery_Tab_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Home_And_Office_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Icon_How_It_Works() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cleaning_Guarantee_Banner() );

	}

	public function widget_assets_css() {
		wp_enqueue_style( 'elementor-custom-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', true );
	}
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since  1.2.0
	 * @access public
	 */
	public function __construct() {
		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'widget_scripts' ) );
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
		add_action( 'wp_head', array( $this, 'widget_assets_css' ) );
	}
}
// Instantiate Plugin Class
Plugin::instance();
