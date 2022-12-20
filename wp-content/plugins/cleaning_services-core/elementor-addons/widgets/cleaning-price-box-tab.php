<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Price_Box_Tab extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_price_box_tab';
    }

    public function get_title()
    {
        return esc_html__('Cleaning Price Box Tab', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-child';
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
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Choose Your Pricing Plan', 'cleaning_service-core'),
            ]
        );


        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),

            ]
        );
        $repeater = new Repeater();


        $repeater->add_control(
            'tab_title',
            [
                'label' => esc_html__('Tab Title', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('One Day', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'items_two',
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

        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Item', 'cleaning_service-core'),
            ]
        );

        $repeater = new Repeater();


        $repeater->add_control(
			'item_duration',
			array(
				'label'   => esc_html__( 'Duration', 'cleaning_service-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'one_day' => esc_html__( 'One Day', 'cleaning_service-core' ),
					'weekly'  => esc_html__( 'Weekly', 'cleaning_service-core' ),
					'bi_weekly'  => esc_html__( 'Bi-Weekly', 'cleaning_service-core' ),
					'monthly_service'  => esc_html__( 'Monthly Service', 'cleaning_service-core' ),
				),
				'default' => 'one_day',

			)
		);
        $repeater->add_control(
			'item_featured',
			[
				'label' => __( 'Featured Enable?', 'cleaning_service-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $repeater->add_control(
            'item_title_text',
            [
                'label' => esc_html__('Title Text', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Start Plan', 'cleaning_service-core'),
            ]
        );
        $repeater->add_control(
            'item_price_content',
            [
                'label' => esc_html__('Price Content', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),

            ]
        );
        $repeater->add_control(
            'item_service_list',
            [
                'label' => esc_html__('Service List', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),

            ]
        );
        $repeater->add_control(
            'item_button_title',
            [
                'label' => esc_html__('Button Title', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Order Now', 'cleaning_service-core'),
            ]
        );
        $repeater->add_control(
            'item_button_link',
            [
                'label' => esc_html__('Button Link', 'cleaning_service-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'cleaning_service-core'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],

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
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'General Settings', 'cleaning_services-core' ),
			)
		);
		$this->add_control(
			'slides_to_show',
			[
				'label' => __( 'How many Slider to Show?', 'cleaning_service-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 3,
			]
		);
		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'How many Slides to scroll?', 'cleaning_service-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 1,
				
			]
		);
		$this->add_control(
			'infinite',
			[
				'label' => __( 'Is infinite?', 'cleaning_service-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				
			]
		);
        $this->add_control(
			'mobile_first',
			[
				'label' => __( 'Mobile First?', 'cleaning_service-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Enable Autoplay?', 'cleaning_service-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'       => __( 'Autoplay Speed', 'cleaning_services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '2500', 'cleaning_services-core' ),
			)
		);
		$this->add_control(
			'arrows',
			[
				'label' => __( 'Enable Arrows?', 'cleaning_service-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'dots',
			[
				'label' => __( 'Enable Dots?', 'cleaning_service-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $heading = $settings["heading"];
        $description = $settings["description"];

        $slides_to_show = $settings['slides_to_show'];
        $slides_to_scroll = $settings['slides_to_scroll'];
        $autoplay_speed = $settings['autoplay_speed'];
        
        if($settings['infinite'] == 'yes'){
            $infiinite = true;
        }else{
            $infiinite = false;
        }

        if($settings['mobile_first'] == 'yes'){
            $mobile_class = true;
        }else{
            $mobile_class = false;
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
            'mobileFirst'       => $mobile_class,
            'slidesToShow'      => $slides_to_show,
            'slidesToScroll'    => $slides_to_scroll,
            'infinite'          => $infiinite,
            'autoplay'          => $autoplay,
            'autoplaySpeed'     => $autoplay_speed,
            'dots' => $dots,
            'arrows' => $arrows
        );  
        ?>         
    <div class="block">
		<div class="container">
            <h2 class="text-center h-lg h-decor"><?php echo $heading;?></h2>
			<div class="text-center max-800">
				<p class="p-lg"><?php echo $description;?></p>
			</div>
            <div class="nav-tabs-wrap text-center">
                <ul class="nav nav-tabs nav-tabs--rounded">
                <?php
                    $i = 1;
                    foreach ($settings["items_two"] as $item) {
                        $tab_title = $item["tab_title"];
                        $active = '';
                        if($i == 1){
                            $active = 'active';
                        }
                        
                    ?>
                    <li class="<?php echo $active;?>"><a data-toggle="tab" href="#plan<?php echo $i;?>" aria-expanded="true"><?php echo $tab_title;?></a></li>
                    <?php $i++;} ?>
                </ul>
            </div>
            <div class="tab-content tab-content-nopad">
                <div id="plan1" class="tab-pane fade in active">
                    <div class="price-row price-carousel-tab price-carousel-2" data-price='<?php echo wp_json_encode($changed_atts);?>'>
                    <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                        
                            $item_title_text = $item["item_title_text"];
                            $item_price_content = $item["item_price_content"];
                            $item_service_list = $item["item_service_list"];
                            $item_button_title = $item["item_button_title"];
                            $item_button_link = $item["item_button_link"]["url"];
                            $item_button_link_external = $item["item_button_link"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_link_nofollow = $item["item_button_link"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_featured = $item["item_featured"];
                            $item_duration = $item["item_duration"];

                            if ( $item_featured == 'yes' ) {
                                $featured_clss = 'prices-box prices-box--primary';
                            } else {
                                $featured_clss = 'prices-box';
                            }
                        
                        if( $item_duration == 'one_day') { ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="<?php echo $featured_clss; ?>">
                                <h3 class="prices-box-title"><?php echo wp_kses_post($item_title_text); ?></h3>
                                <div class="prices-box-price">
                                    <?php echo wp_kses_post($item_price_content); ?>
                                </div>
                                    <?php echo $item_service_list;
                                if (!empty($item_button_link != '')) :
                                ?>
                                    <div class="prices-box-link">
                                        <a href="<?php echo esc_url($item_button_link); ?>" <?php echo $item_button_link_external; ?>  <?php echo $item_button_link_nofollow; ?>  class="btn"><?php echo $item_button_title; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php  } 
                         $i++;} ?>
                    </div>
                </div>
                <div id="plan2" class="tab-pane fade">
                    <div class="price-row price-carousel-tab price-carousel-2">
                    <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                        
                            $item_title_text = $item["item_title_text"];
                            $item_price_content = $item["item_price_content"];
                            $item_service_list = $item["item_service_list"];
                            $item_button_title = $item["item_button_title"];
                            $item_button_link = $item["item_button_link"]["url"];
                            $item_button_link_external = $item["item_button_link"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_link_nofollow = $item["item_button_link"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_featured = $item["item_featured"];
                            $item_duration = $item["item_duration"];

                            if ( $item_featured == 'yes' ) {
                                $featured_clss = 'prices-box prices-box--primary';
                            } else {
                                $featured_clss = 'prices-box';
                            }
                        
                        if( $item_duration == 'weekly') { ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="<?php echo $featured_clss; ?>">
                                <h3 class="prices-box-title"><?php echo wp_kses_post($item_title_text); ?></h3>
                                <div class="prices-box-price">
                                    <?php echo wp_kses_post($item_price_content); ?>
                                </div>
                                    <?php echo $item_service_list;
                                if (!empty($item_button_link != '')) :
                                ?>
                                    <div class="prices-box-link">
                                        <a href="<?php echo esc_url($item_button_link); ?>" <?php echo $item_button_link_external; ?>  <?php echo $item_button_link_nofollow; ?>  class="btn"><?php echo $item_button_title; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php  } 
                        $i++;} ?>
                    </div>
                </div>
                <div id="plan3" class="tab-pane fade">
                    <div class="price-row price-carousel-tab price-carousel-2">
                    <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                        
                            $item_title_text = $item["item_title_text"];
                            $item_price_content = $item["item_price_content"];
                            $item_service_list = $item["item_service_list"];
                            $item_button_title = $item["item_button_title"];
                            $item_button_link = $item["item_button_link"]["url"];
                            $item_button_link_external = $item["item_button_link"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_link_nofollow = $item["item_button_link"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_featured = $item["item_featured"];
                            $item_duration = $item["item_duration"];

                            if ( $item_featured == 'yes' ) {
                                $featured_clss = 'prices-box prices-box--primary';
                            } else {
                                $featured_clss = 'prices-box';
                            }
                            
                       
                        if( $item_duration == 'bi_weekly') { ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="<?php echo $featured_clss; ?>">
                                <h3 class="prices-box-title"><?php echo wp_kses_post($item_title_text); ?></h3>
                                <div class="prices-box-price">
                                    <?php echo wp_kses_post($item_price_content); ?>
                                </div>
                                    <?php echo $item_service_list;
                                if (!empty($item_button_link != '')) :
                                ?>
                                    <div class="prices-box-link">
                                        <a href="<?php echo esc_url($item_button_link); ?>" <?php echo $item_button_link_external; ?>  <?php echo $item_button_link_nofollow; ?>  class="btn"><?php echo $item_button_title; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php  } 
                        $i++;} ?>
                    </div>
                </div>
                <div id="plan4" class="tab-pane fade">
                    <div class="price-row price-carousel-tab price-carousel-2">
                    <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                        
                            $item_title_text = $item["item_title_text"];
                            $item_price_content = $item["item_price_content"];
                            $item_service_list = $item["item_service_list"];
                            $item_button_title = $item["item_button_title"];
                            $item_button_link = $item["item_button_link"]["url"];
                            $item_button_link_external = $item["item_button_link"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_link_nofollow = $item["item_button_link"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_featured = $item["item_featured"];
                            $item_duration = $item["item_duration"];

                            if ( $item_featured == 'yes' ) {
                                $featured_clss = 'prices-box prices-box--primary';
                            } else {
                                $featured_clss = 'prices-box';
                            }
                            
                    
                        if( $item_duration == 'monthly_service') { ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="<?php echo $featured_clss; ?>">
                                <h3 class="prices-box-title"><?php echo wp_kses_post($item_title_text); ?></h3>
                                <div class="prices-box-price">
                                    <?php echo wp_kses_post($item_price_content); ?>
                                </div>
                                    <?php echo $item_service_list;
                                if (!empty($item_button_link != '')) :
                                ?>
                                    <div class="prices-box-link">
                                        <a href="<?php echo esc_url($item_button_link); ?>" <?php echo $item_button_link_external; ?>  <?php echo $item_button_link_nofollow; ?>  class="btn"><?php echo $item_button_title; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php  } 
                        $i++;} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
}
