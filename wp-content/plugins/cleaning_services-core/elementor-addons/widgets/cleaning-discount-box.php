<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Discount_Box extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_discount_box';
    }

    public function get_title()
    {
        return esc_html__('Discount Box Item', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-shopping-bag';
    }

    public function get_categories()
    {
        return ['cleaning_service'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__('General', 'cleaning_service-core'),
            ]
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
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Discounts for Recurring Clientele', 'cleaning_service-core'),
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
            'description',
            [
                'label' => esc_html__('Description', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),
                'condition'             => [
					'heading_area'    => 'yes'
				]

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Item', 'cleaning_service-core'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
            ]
        );
        $repeater->add_control(
            'highlight_text',
            [
                'label' => esc_html__('Highlight Text', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
            ]
        );
        $repeater->add_control(
            'item_offer_text',
            [
                'label' => esc_html__('Offer Text', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('30% <span>OFF</span>', 'cleaning_service-core'),
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core')

            ]
        );
        $this->add_control(
            'items',
            [
                'label' => esc_html__('Repeater List', 'cleaning_service-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ]
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $heading_area = $settings["heading_area"];
        $layout = $settings["layout"];
?> 
        <div class="block">
            <div class="container">
                <?php if($heading_area == 'yes') : 
                 $description = $settings["description"];
                $this->cleaning_service_title();?>
                <?php 
                 if($layout == '2'){ ?>
                <div class="text-center max-700">
                    <p class="p-lg"><?php echo $description; ?>
                    </p>
                </div>
                <?php } else { ?>
                    <p class="text-center"><?php echo $description; ?></p>
               <?php }
                endif;?>
                <div class="discount-box-row">
                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {
                        $item_title = $item["item_title"];
                        $item_offer_text = $item["item_offer_text"];
                        $highlight_text = $item["highlight_text"];

                        if($layout == '2'){
                    ?> 
                        <div class="discount-box discount-box-2 discount-box--color<?php echo $i;?>">
                            <div class="discount-box-sale"><?php echo $highlight_text; ?> <strong><?php echo $item_offer_text; ?></strong></div>
                            <h4><?php echo $item_title; ?></h4>
                        </div> 
                    <?php } else { ?>
                        <div class="discount-box discount-box--color<?php echo $i;?>">
                            <div class="discount-box-sale"><?php echo $item_offer_text; ?></div>
                            <div><?php echo $item_title; ?></div>
                        </div>
                        <?php
                        } 
                        $i++; } ?>
                </div>
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
					<?php echo esc_attr($settings['heading']); ?>
				</<?php echo esc_html($title_tag); ?>>
			<?php
			}
          
		}
	}
}
