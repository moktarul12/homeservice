<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Pestico\Helper\Elementor\Settings\Header;
use Elementor\Core\Schemes;
class Cleaning_Gallery_Tab_Two extends Widget_Base
{


    public function get_name()
    {
        return 'cleaning_tab_gallery_two';
    }

    public function get_title()
    {
        return esc_html__('Gallery Tab Two', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'sds-widget-ico';
    }

    public function get_categories()
    {
        return array('cleaning_service');
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'item',
            array(
                'label' => esc_html__('ITEM', 'cleaning_service-core'),
            )
        );
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Our Projects', 'cleaning_service-core')
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
					'p'      => __('p', 'cleaning_service-core')
				]
			]
		);

        $this->add_control(
            'all_type',
            array(
                'label'       => __('All Type', 'cleaning_service-core'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
            )
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'item_title',
            array(
                'label'       => __('Title', 'cleaning_service-core'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => __('Apartment Cleaning Service','cleaning_service-core')
            )
        );
        $repeater->add_control(
            'category_list',
            array(
                'label'       => __('Category name', 'cleaning_service-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Appartment'),
                'placeholder' => __('Category name', 'cleaning_service-core'),
            )
        );
        $repeater->add_control(
            'item_image',
            array(
                'label'   => esc_html__('Gallery Image', 'cleaning_service-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                )

            )
        );
        $this->add_control(
            'items',
            array(
                'label'   => esc_html__('Repeater List', 'cleaning_service-core'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'list_title'   => esc_html__('Title #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core')
                    ),
                    array(
                        'list_title'   => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core')
                    )
                )
            )
        );

        $this->end_controls_section();
        $this->start_controls_section(
			'content_section_slider',
			array(
				'label' => __( 'Settings', 'cleaning_services-core' )
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
			]
		);
		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'How many Slides to scroll?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 1
				
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
				'default' => 'yes'
				
			]
		);
        $this->add_control(
			'mobile_first',
			[
				'label' => __( 'Mobile First?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no'
				
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
				'default' => 'yes'
			]
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'       => __( 'Autoplay Speed', 'cleaning_services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '2500', 'cleaning_services-core' )
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
				'default' => 'yes'
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
				'default' => 'no'
			]
		);
		$this->end_controls_section();
    }
    protected function render()
    {
        $settings     = $this->get_settings_for_display();

        $all_type = $settings['all_type'];

        $slides_to_show = $settings['slides_to_show'];
        $slides_to_scroll = $settings['slides_to_scroll'];
        $autoplay_speed = $settings['autoplay_speed'];
        
        if($settings['infinite'] == 'yes'){
            $infiinite = 'true';
        }else{
            $infiinite = 'false';
        }

        if($settings['mobile_first'] == 'yes'){
            $mobile_class = 'true';
        }else{
            $mobile_class = 'false';
        }

        if($settings['autoplay'] == 'yes'){
            $autoplay = 'true';
        }else{
            $autoplay = 'false';
        }

        if($settings['dots'] == 'yes'){
            $dots = 'true';
        }else{
            $dots = 'false';
        }

        if($settings['arrows'] == 'yes'){
            $arrows = 'true';
        }else{
            $arrows = 'false';
        }

        $changed_atts = array(
            'mobile_first'     => $mobile_class,
            'slides_to_show'   => $slides_to_show,
            'slides_to_scroll' => $slides_to_scroll,
            'infinite'         => $infiinite,
            'autoplay'         => $autoplay,
            'autoplay_speed'   => $autoplay_speed,
            'dots'             => $dots,
            'arrows'           => $arrows
        );    
        wp_localize_script( 'cleaning-services-custom', 'ajax_gallery', $changed_atts );

?>
<div class="block fullwidth">
    <div class="container">
        <?php $this->cleaning_service_title();?>
        <div id="isotopeGalleryFilters" class="filters-by-category hidden-xs">
            <ul class="option-set" data-option-key="filter">
                <?php 
                    if(!empty($all_type) ){ ?>
                <li>
                    <a href="#filter" data-option-value="*" class="selected"><?php echo $all_type;?></a>
                </li>
                <?php }
                    $category_arr       = array();
                    $category_arr_class = array();
                    foreach ($settings['items'] as $key => $item) {

                        $cat                 = $item['category_list'];
                        $child_categories_ex = preg_replace('/\n$/', '', preg_replace('/^\n/', '', preg_replace('/[\r\n]+/', "\n", $cat)));
                        $child_categories_ex = explode(' ', $child_categories_ex);

                        foreach ($child_categories_ex as $child_category) {

                            $category_arr_class[] = str_replace(' ', '_', strtolower($child_category));
                        }
                    }
                    $category_arr1 = array();
                    foreach ($settings['items'] as $item) {
                        $category_list = $item['category_list'];
                        $arrayGetCode  = preg_replace('/\n$/', '', preg_replace('/^\n/', '', preg_replace('/[\r\n]+/', "\n", $category_list)));
                        $arrayGet      = explode("\n", $arrayGetCode);
                        $category_arr1 = array_merge($category_arr1, $arrayGet);
                    }
                    $category_arr1 = array_map('trim', $category_arr1);
                    $category_arr1 = array_unique($category_arr1);
                    $i = 1;
                    foreach ($category_arr1 as $category) {
                        $key = str_replace(' ', '_', $category);
                        $selected = '';
                        $filter_item = $key;
                        if ($i == 1 && $all_type == '') {
                            $selected = "selected";
                        }

                        $tab_category = strtolower(".".$category);
                        echo '<li><a href="#filter" data-option-value="' . $tab_category . '" class="'. $selected .'">' . $category . '</a></li>';
                        $i++;
                    } ?>
                </ul>
            </div>
            <div id="isotopeGallery" class="gallery gallery-isotope hidden-xs">
                <?php
                    $i = 1;
                    foreach ($settings['items'] as $key => $item) {

                        $item_title = $item['item_title'];
                        $item_image = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                        $item_image_alt = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                        $item_image_url     = ($item['item_image']['id'] != '') ? wp_get_attachment_image_url($item['item_image']['id'], 'full') : $item['item_image']['url'];
                        
                    ?>
                <div class="gallery-item  <?php echo esc_attr($category_arr_class[$key]); ?>">
                    <div class="gallery-item-image">
                        <?php
                            if ( wp_http_validate_url( $item_image ) ) {
                                ?>
                                    <img src="<?php echo esc_url( $item_image ); ?>" alt="<?php esc_url( $item_image_alt ); ?>">
                                    <?php
                            } else { 
		                        echo wp_get_attachment_image( $item['item_image']['id'], 'cleaning-services-gallery-thumbnail' );
                             }
                            ?>
                    </div>
                    <div class="gallery-item-caption">
                        <?php echo $item_title;?>
                    </div>
                    <a href="<?php echo esc_url( $item_image_url ); ?>" class="gallery-item-zoom" data-lightbox="projects">
                        <i class="icon icon-night"></i>
                    </a>
                </div>
            <?php } ?>
            </div>
            <div id="slickGalleryFilters" class="filters-by-category visible-xs"></div>
            <div id="slickGallery" class="gallery-slick visible-xs"></div>
        </div>
    </div>
      <?php
    }
    /**
	 * Render slider title output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	private function cleaning_service_title()
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
}