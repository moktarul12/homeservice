<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Contact_Info extends Widget_Base
{
    public function get_name()
    {
        return 'cleaning_contact_info';
    }

    public function get_title()
    {
        return esc_html__('Contact Info', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-certificate';
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
                'label' => esc_html__('Info Item', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('General Office', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('General Office', 'cleaning_service-core'),
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
            'item_icon',
            [
                'label' => esc_html__('Icon', 'cleaning_service-core'),
                'type' => Controls_Manager::ICONS,
            ]
        );


        $repeater->add_control(
            'item_info_text',
            [
                'label' => esc_html__('Info Text', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('3261 Anmoore Road <br>Brooklyn, NY 11230', 'cleaning_service-core'),
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),

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
            'social_item',
            [
                'label' => esc_html__('Social Item', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'item_social_title',
            [
                'label' => esc_html__('Social Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'item_social_icon',
            [
                'label' => esc_html__('Social Icon', 'cleaning_service-core'),
                'type' => Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'custom_icon_class',
            [
                'label' => esc_html__('Icon Class', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'item_social_link',
            [
                'label' => esc_html__('Social Link', 'cleaning_service-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'cleaning_service-core'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],

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
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $sub_heading = $settings["sub_heading"];
        $heading = $settings["heading"];
        $item_social_title = $settings["item_social_title"];
?> 
    <h2><?php echo $heading;?></h2>
    <div id="cleaning_contact_box-1" class="widget widget_cleaning_contact_box">
        <h4><?php echo $sub_heading;?></h4>
        <div class="col-md-12">
            <?php
            $i = 1;
            foreach ($settings["items"] as $item) {
                $item_title = $item["item_title"];
                $item_icon = $item["item_icon"];
                $item_info_text = $item["item_info_text"];
            
            ?> 
                <div class="contact-info-sm">
                    <h5><?php echo $item_title; ?></h5>
                    <?php \Elementor\Icons_Manager::render_icon(($item_icon), array('aria-hidden' => 'true','class' => 'icon')); 
                    echo $item_info_text; ?>
                </div> 
                <?php $i++;
                    } 
                ?>
            <div class="divider"></div>
            <h5><?php echo $item_social_title;?></h5>
            <ul class="social-list">
            <?php
                $i = 1;
                foreach ($settings["items_two"] as $item) {
                    $item_social_icon = $item["item_social_icon"];
                    $custom_icon_class = $item["custom_icon_class"];
                    $item_social_link = $item["item_social_link"]["url"];
                    $item_social_link_external = $item["item_social_link"]["is_external"] ? 'target="_blank"' : '';
                    $item_social_link_nofollow = $item["item_social_link"]["nofollow"] ? 'rel="nofollow"' : '';
                ?> 
                <li><a href="<?php echo esc_url($item_social_link); ?>" <?php echo $item_social_link_external; ?>  <?php echo $item_social_link_nofollow; ?>>
                <?php if($custom_icon_class !== '') : ?>
                    <i class="<?php echo $custom_icon_class;?>"></i>
                    <?php else : 
                    \Elementor\Icons_Manager::render_icon(($item_social_icon), array('aria-hidden' => 'true')); endif;?>
                </a></li>
                <?php $i++;
                    } 
                ?>
            </ul>
        </div>
    </div>
<?php
    }
}