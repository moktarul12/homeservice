<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
class Cleaning_Team_Member extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_team_member';
    }

    public function get_title()
    {
        return esc_html__('Cleaning Team Member', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-bug';
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
				'default' => '2',
				'options' => array(
					'1' => __( 'One', 'cleaning_service-core' ),
					'2' => __( 'Two', 'cleaning_service-core' ),
				)
			)
		);
        $this->add_control(
			'column',
			[
				'label' => __( 'Column Select', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2'  => __( '2', 'cleaning_service-core' ),
					'3' => __( '3', 'cleaning_service-core' ),
					'4' => __( '4', 'cleaning_service-core' ),
				]
			]
		);
        $this->add_control(
			'heading_area',
			[
				'label' => __('Display Heading Area?', 'cleaning_service-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cleaning_service-core'),
				'label_off' => __('Hide', 'cleaning_service-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Our Team', 'cleaning_service-core'),
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
					'heading_area'    => 'yes',
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
					'heading_area'    => 'yes',
				]

            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Team Item', 'cleaning_service-core')
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'name_of_team_member',
            [
                'label' => esc_html__('Name Of Team Member', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Alan Yarbrough', 'cleaning_service-core')
            ]
        );


        $repeater->add_control(
            'designation_of_team_member',
            [
                'label' => esc_html__('Designation Of Team Member', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Managing Director', 'cleaning_service-core')
            ]
        );


        $repeater->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core')

            ]
        );

        $repeater->add_control(
            'picture_of_team_member',
            [
                'label' => esc_html__('Picture Of Team Member', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

            ]
        );


        $repeater->add_control(
            'social_list',
            [
                'label' => esc_html__('Social List', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
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
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core')
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core')
                    ]
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'content_section',
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
				'default' => 1,
				
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
				'default' => 'yes',
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
        $settings =  $this->get_settings_for_display();
        $layout = $settings["layout"];
        $description = $settings["description"];
        $heading_area = $settings["heading_area"];

        $column_no = $settings['column'];
		switch ( (int) $column_no ) {
			case 2:
				$colclass = 'col-sm-6 col-xs-12';
				break;
			case 4:
				$colclass = 'col-md-3 col-sm-4 col-xs-12';
				break;
			default:
				$colclass = 'col-md-4 col-sm-4 col-xs-12';
				break;
		}

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

        if ( $layout == '2' ) {
			$class = 'person-carousel-2';
		} else {
			$class = 'person-carousel';
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
        <?php if($heading_area == 'yes') : 
        $this->cleaning_service_title();?>
        <?php 
        if ( $layout == '2' ) { ?>
        <div class="text-center max-700">
            <p class="p-lg"><?php echo $description;?></p>
        </div>
        <?php } else { ?>
            <p class="text-center"><?php echo $description;?></p>
        <?php }
        endif;?>
        <div class="row <?php echo $class;?>" id="team_member" data-team='<?php echo wp_json_encode($changed_atts);?>'>
       <?php
        foreach ($settings["items"] as $item) {
            
            $name_of_team_member = $item["name_of_team_member"];
            $designation_of_team_member = $item["designation_of_team_member"];
            $item_description = $item["item_description"];
            $picture_of_team_member = ($item["picture_of_team_member"]["id"] != "") ? wp_get_attachment_image($item["picture_of_team_member"]["id"], "full") : $item["picture_of_team_member"]["url"];
            $picture_of_team_member_alt = get_post_meta($item["picture_of_team_member"]["id"], "_wp_attachment_image_alt", true);
            $social_list = $item["social_list"];
        if ($layout == '2') { ?>
            <div class="<?php echo $colclass; ?> person" id="team_member">
                <div class="person-img">
                <?php
					if ( wp_http_validate_url( $picture_of_team_member ) ) {
						?>
							<img src="<?php echo esc_url( $picture_of_team_member ); ?>" alt="<?php esc_url( $picture_of_team_member_alt ); ?>">
							<?php
					} else {
						echo $picture_of_team_member;
					}
					if ($social_list != '') { 
                         echo $social_list;
                    } ?>
                </div>
                <h4 class="person-name"><?php echo wp_kses_post($name_of_team_member); ?></h4>
                <h6 class="person-position"><?php echo wp_kses_post($designation_of_team_member); ?></h6>
                <div class="person-divider"></div>
                <p class="person-text"><?php echo wp_kses_post($item_description); ?></p>
            </div>
        <?php } else { ?>
            <div class="<?php echo $colclass; ?> person">
                <div class="person-img">
                <?php
					if ( wp_http_validate_url( $picture_of_team_member ) ) {
						?>
							<img src="<?php echo esc_url( $picture_of_team_member ); ?>" alt="<?php esc_url( $picture_of_team_member_alt ); ?>">
							<?php
					} else {
						echo $picture_of_team_member;
					}
                    if ($social_list != '') { 
                        echo $social_list;
                    } ?>
                </div>
                <h3 class="person-name"><?php echo wp_kses_post($name_of_team_member); ?></h3>
                <h6 class="person-position"><?php echo wp_kses_post($designation_of_team_member); ?></h6>
                <div class="person-divider"></div>
                <p class="person-text"><?php echo wp_kses_post($item_description); ?></p>
            </div>
        <?php }  } ?>
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
