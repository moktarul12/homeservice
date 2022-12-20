<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;

class Service_Gallery extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_service_gallery';
    }

    public function get_title()
    {
        return esc_html__('Service Gallery', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-filter';
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
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('We Offer Free In-Home Estimates, So Why Wait?', 'cleaning_service-core'),
            ]
        );


        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Ready for a cleaner facility', 'cleaning_service-core'),
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
        $this->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Calculate Now', 'cleaning_service-core'),
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
                    'url' => 'url',
                    'is_external' => false,
                    'nofollow' => false,
                ],

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
                'type' => Controls_Manager::TEXT,
                
            ]
        );

        $repeater->add_control(
            'item_image',
            [
                'label' => esc_html__('Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

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
                    'url' => 'url',
                    'is_external' => false,
                    'nofollow' => false,
                ]

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
        $this->start_controls_section(
            'section_container_style',
            [
                'label' => __('Background', 'cleaning_service-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'ebtr_contact_form_background',
                'label' => __('Background', 'cleaning_service-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .service-house',
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $heading = $settings["heading"];
        $sub_heading = $settings["sub_heading"];
        $description = $settings["description"];
        $button_title = $settings["button_title"];
        $button_link = $settings["button_link"]["url"];
        $button_link_external = $settings["button_link"]["is_external"] ? 'target="_blank"' : '';
        $button_link_nofollow = $settings["button_link"]["nofollow"] ? 'rel="nofollow"' : '';
?>
    <div class="block fullwidth-bg block-bg-grey">
		<div class="container">
            <div class="row service-house-row">
                <div class="col-lg-5 inset-pad">
                    <h2><?php echo $heading;?></h2>
					<h5><?php echo $sub_heading;?></h5>
                    <div class="divider-sm"></div>
                    <?php echo $description;
                    if(!empty($button_link)) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" <?php echo $button_link_external; ?>  <?php echo $button_link_nofollow; ?> class="btn btn-lg animation animated tada" data-animation="tada"><i class="icon-calc"></i><?php echo esc_html($button_title); ?></a>
                    <?php endif;?>
                </div>
                <div class="col-lg-7">
                    <div class="service-house-wrap">
                        <div class="service-house">
                            <?php
                            $i = 1;
                            foreach ($settings["items"] as $item) {
                                $item_image = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                                $item_image_alt = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                                $item_link = $item["item_link"]["url"];
                                $item_link_external = $item["item_link"]["is_external"] ? 'target="_blank"' : '';
                                $item_link_nofollow = $item["item_link"]["nofollow"] ? 'rel="nofollow"' : '';
                            ?> 
                                <a href="<?php echo esc_url($item_link); ?>" <?php echo $item_link_external; ?>  <?php echo $item_link_nofollow; ?> class="service-house-item">
                                <?php
                                    if ( wp_http_validate_url( $item_image ) ) {
                                        ?>
                                            <img src="<?php echo esc_url( $item_image ); ?>" alt="<?php esc_url( $item_image_alt ); ?>">
                                            <?php
                                    } else {
                                        echo $item_image;
                                    }
                                    ?>
                                    <?php if (isset($item['item_title']) && !empty($item['item_title'])) { ?>
                                        <span class="service-house-item-title"><?php echo $item['item_title']; ?></span>
                                    <?php } ?>
                                </a>
                            <?php $i++;
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
}