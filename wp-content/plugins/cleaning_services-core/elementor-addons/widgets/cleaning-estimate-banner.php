<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Estimate_Banner extends Widget_Base
{

    public function get_name()
    {
        return 'estimate_banner';
    }

    public function get_title()
    {
        return esc_html__('Estimate Banner', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-hard-of-hearing';
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
					'2' => __( 'Two', 'cleaning_service-core' ),
				)
			)
		);
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Get started with your <b>free estimate', 'cleaning_service-core'),
            ]
        );


        $this->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('GET free estimate', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'cleaning_service-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'cleaning_service-core'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ]

            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $heading = $settings["heading"];
        $layout = $settings["layout"];
        $button_title = $settings["button_title"];
        $button_link = $settings["button_link"]["url"];
        $button_link_external = $settings["button_link"]["is_external"] ? 'target="_blank"' : '';
        $button_link_nofollow = $settings["button_link"]["nofollow"] ? 'rel="nofollow"' : '';
?> 
    <?php if($layout == '1'){ ?>
        <div class="block fullwidth-bg bg-gradient inset-35 home-block-1">
            <div class="container">
                <div class="get-banner text-center">
                    <h2><?php echo $heading; ?></b></h2>
                    <a href="<?php echo esc_url($button_link); ?>" <?php echo $button_link_external; ?> <?php echo $button_link_nofollow; ?> class="btn btn-white"><i class="icon icon-bell"></i><?php echo $button_title; ?></a>
                </div>
            </div>
        </div> 
        <?php } elseif($layout == '2'){ ?>
        <div class="block fullwidth-bg bg-gradient-1 inset-35">
			<div class="container">
				<div class="get-banner text-center">
					<h2><?php echo $heading; ?></b></h2>
					<a href="<?php echo esc_url($button_link); ?>" <?php echo $button_link_external; ?> <?php echo $button_link_nofollow; ?> class="btn about-pages-btn btn-white"><i class="icon icon-technology"></i><?php echo $button_title; ?></a></div>
			</div>
		</div>
    <?php
            }
        }
    }
