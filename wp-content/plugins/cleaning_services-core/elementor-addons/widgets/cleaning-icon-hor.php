<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Icon_Hor extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_icon_hor';
    }

    public function get_title()
    {
        return esc_html__('Icon Hor', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-fighter-jet';
    }

    public function get_categories()
    {
        return ['cleaning_service'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Icon box Item', 'cleaning_service-core')
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
					'2' => __( 'Two', 'cleaning_service-core' )
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
					'4' => __( '4', 'cleaning_service-core' )
				]
			]
		);
        $this->add_control(
            'extra_class',
            [
                'label' => esc_html__('Extra Class', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
            ]
        );
        $repeater = new Repeater();


        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Our Mission', 'cleaning_service-core')
            ]
        );


        $repeater->add_control(
            'item_icon',
            [
                'label' => esc_html__('Icon', 'cleaning_service-core'),
                'type' => Controls_Manager::ICONS
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
            'item_link',
            [
                'label' => esc_html__('Link', 'cleaning_service-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'cleaning_service-core'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ]

            ]
        );
        $repeater->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
                
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
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $layout = $settings["layout"];
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
        $extra_class = $settings['extra_class'];
        $sec_class = $extra_class ?? '';

?> 
        <div class="block">
            <div class="container">
                <div class="row <?php echo $sec_class;?>">
                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {
                        $item_title = $item["item_title"];
                        $item_icon = $item["item_icon"];
                        $button_title = $item["button_title"];
                        $item_description = $item["item_description"];
                        $item_link = $item["item_link"]["url"];
                        $item_link_external = $item["item_link"]["is_external"] ? 'target="_blank"' : '';
                        $item_link_nofollow = $item["item_link"]["nofollow"] ? 'rel="nofollow"' : '';
                    ?> 
                        <div class="<?php echo $colclass; ?>">
                            <?php if ($layout == '2') { ?>
                                <div class="text-icon-hor">
                                    <div class="text-icon-hor-icon">
                                        <?php \Elementor\Icons_Manager::render_icon(($item_icon), array('aria-hidden' => 'true','class' => 'icon')); ?>
                                    </div>
                                    <div class="text-icon-hor-text">
                                        <h3><?php echo $item_title; ?></h3>
                                        <?php echo $item_description; 
                                        if (!empty($item_link)) { ?>
                                            <a href="<?php echo esc_url($item_link); ?>" <?php echo $item_link_external; ?>  <?php echo $item_link_nofollow; ?> class="service-box-link"><?php echo $button_title;?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <h2><?php echo $item_title; ?></h2>
                                <div class="text-icon-hor">
                                    <div class="text-icon-hor-icon">
                                        <?php \Elementor\Icons_Manager::render_icon(($item_icon), array('aria-hidden' => 'true','class' => 'icon')); ?>
                                    </div>
                                    <div class="text-icon-hor-text">
                                        <?php echo $item_description; 
                                        if (!empty($item_link)) { ?>
                                            <a href="<?php echo esc_url($item_link); ?>" <?php echo $item_link_external; ?>  <?php echo $item_link_nofollow; ?> class="service-box-link"><?php echo $button_title;?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div> <?php $i++;
                            } ?>
                </div>
            </div>
        </div>
<?php
    }
}
