<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Core\Schemes;
use Hanta\Helper\Elementor\Settings\Header;

class Cleaning_Slider_News extends Widget_Base {

	public function get_name() {
		return 'cleaning_blog_postslider';
	}

	public function get_title() {
		return esc_html__( 'Cleaning Slider News', 'cleaning_service-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'cleaning_service' );
	}


	private function get_blog_categories() {
		$options  = array();
		$taxonomy = 'category';
		if ( ! empty( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'parent'     => 0,
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						$options[''] = 'Select';
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}
		return $options;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'General', 'cleaning_service-core' ),
			)
		);

		$this->add_control(
			'layout',
			array(
				'label'   => __( 'Layout Style', 'cleaning_service-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'One', 'cleaning_service-core' ),
					'2' => __( 'Two', 'cleaning_service-core' )
				)
			)
		);

		$this->add_control(
			'heading_area',
			[
				'label' => __('Display Heading Area?', 'cleaning_service-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cleaning_service-core'),
				'label_off' => __('Hide', 'cleaning_service-core'),
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);
		$this->add_control(
			'title_heading',
			[
				'label'                 => __('Title', 'cleaning_service-core'),
				'type'                  => Controls_Manager::HEADING,
				'separator'             => 'before',
				'condition'             => [
					'heading_area'    => 'yes'
				]
			]
		);
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Heading Text', 'cleaning_service-core'),
                'condition'             => [
					'heading_area'    => 'yes'
				]
            ]
        );
		$this->add_control(
			'title_html_tag',
			[
				'label'                => __('Title HTML Tag', 'cleaning_service-core'),
				'type'                 => Controls_Manager::SELECT,
				'default'              => 'h2',
				'options'              => [
					'h1'     => __('H1', 'cleaning_service-core'),
					'h2'     => __('H2', 'cleaning_service-core'),
					'h3'     => __('H3', 'cleaning_service-core'),
					'h4'     => __('H4', 'cleaning_service-core'),
					'h5'     => __('H5', 'cleaning_service-core'),
					'h6'     => __('H6', 'cleaning_service-core'),
					'div'    => __('div', 'cleaning_service-core'),
					'span'   => __('span', 'cleaning_service-core'),
					'p'      => __('p', 'cleaning_service-core'),
				],
				'condition'             => [
					'heading_area'    => 'yes'
				]
			]
		);
		$this->add_control(
			'blog_content',
			[
				'label' => __('Content', 'cleaning_service-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __('We are pleased to share the testimonials of our satisfied customers', 'cleaning_service-core'),
				'condition'             => [
					'heading_area'    => 'yes'
				]
			]
		);

		$this->add_control(
			'category_id',
			array(
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'label'       => esc_html__( 'Category', 'cleaning_service-core' ),
				'options'     => $this->get_blog_categories(),
				'multiple'    => true,
				'label_block' => true,
			)
		);

		$this->add_control(
			'posts_per_page',
			array(
				'label'   => esc_html__( 'Number of Post', 'cleaning_service-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3
			)
		);

		$this->add_control(
			'order_by',
			array(
				'label'   => esc_html__( 'Order By', 'cleaning_service-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'          => esc_html__( 'Date', 'cleaning_service-core' ),
					'ID'            => esc_html__( 'ID', 'cleaning_service-core' ),
					'author'        => esc_html__( 'Author', 'cleaning_service-core' ),
					'title'         => esc_html__( 'Title', 'cleaning_service-core' ),
					'modified'      => esc_html__( 'Modified', 'cleaning_service-core' ),
					'rand'          => esc_html__( 'Random', 'cleaning_service-core' ),
					'comment_count' => esc_html__( 'Comment count', 'cleaning_service-core' ),
					'menu_order'    => esc_html__( 'Menu order', 'cleaning_service-core' )
				)
			)
		);

		$this->add_control(
			'order',
			array(
				'label'   => esc_html__( 'Order', 'cleaning_service-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => array(
					'desc' => esc_html__( 'DESC', 'cleaning_service-core' ),
					'asc'  => esc_html__( 'ASC', 'cleaning_service-core' ),
				)
			)
		);

		
        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__('Button Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Read More', 'cleaning_service-core'),
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'General Settings', 'cleaning_services-core' )
			)
		);

		$this->add_control(
			'service_type',
			array(
				'label'   => __( 'Service Type', 'cleaning_service-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Slider', 'cleaning_services-core' ),
					'2' => __( 'Grid', 'cleaning_services-core' ),
				)
			)
		);
		$this->add_control(
			'slides_to_show',
			[
				'label' => __( 'How many Slider to Show?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 3,
				'condition' => ['service_type' => '1']
			]
		);
		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'How many Slides to scroll?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 1,
				'condition' => ['service_type' => '1']
			]
		);
		$this->add_control(
			'infinite',
			[
				'label' => __( 'Is infinite?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => ['service_type' => '1']
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Enable Autoplay?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => ['service_type' => '1']
			]
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'       => __( 'Autoplay Speed', 'cleaning_services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '2500', 'cleaning_services-core' ),
				'condition' => ['service_type' => '1']
			)
		);
		$this->add_control(
			'arrows',
			[
				'label' => __( 'Enable Arrows?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => ['service_type' => '1'],
			]
		);
		$this->add_control(
			'dots',
			[
				'label' => __( 'Enable Dots?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => ['service_type' => '1']
			]
		);
		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$layout   = $settings['layout'];
		$blog_content   = $settings['blog_content'];
		$btn_title  	= $settings['btn_title'];

		if ( $layout == '2' ) {
			$design_select = 'news-carousel news-carousel-2';
		} else {
			$design_select = 'news-carousel';
		}
			$slides_to_show = $settings['slides_to_show'];
			$slides_to_scroll = $settings['slides_to_scroll'];
			$autoplay_speed = $settings['autoplay_speed'];
			
			if($settings['infinite'] == 'yes'){
				$infiinite = true;
			}else{
				$infiinite = false;
			}

			if($settings['autoplay'] == 'yes'){
				$autoplay = true;
			}else{
				$autoplay = false;
			}

			if($settings['dots'] == 'yes'){
				$dots = true;
			}else{
				$dots = false;
			}

			if($settings['arrows'] == 'yes'){
				$arrows = true;
			}else{
				$arrows = false;
			}

			$changed_atts = array(
				'slidesToShow'      => $slides_to_show,
				'slidesToScroll'    => $slides_to_scroll,
				'infinite'          => $infiinite,
				'autoplay'          => $autoplay,
				'autoplaySpeed'     => $autoplay_speed,
				'dots' => $dots,
				'arrows' => $arrows
			);  

		if ( $settings['category_id'] ) {
			$category_arr = implode( ', ', $settings['category_id'] );
		} else {
			$category_arr = array();
		}

		$posts_per_page = $settings['posts_per_page'];
		$order_by       = $settings['order_by'];
		$order          = $settings['order'];
		$pg_num         = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$args           = array(
			'post_type'      => array( 'post' ),
			'post_status'    => array( 'publish' ),
			'nopaging'       => false,
			'paged'          => $pg_num,
			'posts_per_page' => $posts_per_page,
			'category_name'  => $category_arr,
			'orderby'        => $order_by,
			'order'          => $order,
		);

		$query = new \WP_Query( $args );
		?>
		<div class="block">
			<div class="container">
				<?php $this->cleaning_service_title();
				if($blog_content) : ?>
				<div class="text-center max-700">
					<p class="p-lg"><?php $this->cleaning_description();?></p>
				</div>
				<?php endif;?>
				<div class="<?php echo $design_select; ?>  row" id="news_slider" data-news='<?php echo wp_json_encode($changed_atts);?>' >
					<?php 
						$i     = 0;
						$delay = 0;
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$i++;
								$query->the_post();
								global $post;
								$tags = wp_get_post_categories( get_the_ID() );
								
								if ( $layout == '2' ) { ?>
								<div class="col-sm-4">
									<div class="news-prw">
										<div class="news-prw-image">
										<?php
											if ( has_post_thumbnail() ) :
												$no_thumb_post = null;
												?>
											<a target="__blank"  href="<?php echo esc_url( get_permalink() ); ?>">
												<?php the_post_thumbnail( 'cleaning-blog-grid' ); ?>
												<span><i class="icon-link"></i></span>
											</a>
											<?php
												else :
													$no_thumb_post = 'no-thumb-post';
											endif;
										?>
										</div>
										<div class="news-prw-date"><?php cleaning_posted_on();?></div>
										<h3 class="news-prw-title"><?php the_title(); ?></h3>
										<p>
										<?php
											$content = substr(get_the_excerpt(), 0, 110);
											echo esc_html($content) . '.';
											?>
										</p>
										<a target="__blank" href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-border">
											<?php echo $btn_title; ?>
										</a>
									</div>
								</div>

							<?php } else { ?>

								<div class="col-sm-4">
									<div class="news-prw">
										<div class="news-prw-image">
											<?php
												if ( has_post_thumbnail() ) :
													$no_thumb_post = null;
													?>
													<a target="__blank"  href="<?php echo esc_url( get_permalink() ); ?>">
													<?php the_post_thumbnail( 'cleaning-blog-grid' ); ?>
													<span><i class="icon-link"></i></span>
													</a>
												<?php
													else :
														$no_thumb_post = 'no-thumb-post';
												endif;
											?>
												<a target="__blank" href="<?php echo esc_url( get_permalink() ); ?>" class="news-prw-link">
													<i class="icon-right-arrow"></i>
												</a>
										</div>
										<div class="news-prw-date"><?php cleaning_posted_on();?></div>
										<h3 class="news-prw-title"><?php the_title(); ?></h3>
										<p>
										<?php
											$content = substr(get_the_excerpt(), 0, 110);
											echo esc_html($content) . '.';
											?>
										</p>
									</div>
								</div>

							<?php } 
							}
							wp_reset_postdata();
						}
						?>
				</div>
			</div>
		</div>
   <?php }
	/**
	 * Render slider title output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function cleaning_service_title()
	{
		$settings = $this->get_settings_for_display();

		if ($settings['heading']) {
			
			$this->add_inline_editing_attributes('heading', 'none');
			$this->add_render_attribute('heading', 'class', 'text-center h-lg h-decor');

			if ($settings['heading']) {
				$title_tag = $settings['title_html_tag'];
		?>
				<<?php echo esc_html($title_tag); ?> <?php echo wp_kses_post($this->get_render_attribute_string('heading')); ?>>
					<?php echo wp_kses_post($settings['heading']); ?>
				</<?php echo esc_html($title_tag); ?>>
			<?php
			}
			
		}
    }
	/**
	 * Render slider description output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function cleaning_description()
	{
		$settings = $this->get_settings_for_display();

		$testimonial_content = $settings['blog_content'];

		echo wp_kses_post($testimonial_content);
	}
}