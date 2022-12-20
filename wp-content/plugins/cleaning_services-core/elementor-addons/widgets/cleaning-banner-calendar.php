<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Banner_Calendar extends Widget_Base
{

    public function get_name()
    {
        return 'banner_calendar';
    }

    public function get_title()
    {
        return esc_html__('Banner Calendar', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-suitcase';
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
            'picture_of_cover_front',
            [
                'label' => esc_html__('Picture Of Cover Front', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

            ]
        );

        $this->add_control(
            'picture_of_cover_back',
            [
                'label' => esc_html__('Picture Of Cover Back', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

            ]
        );

        $this->add_control(
            'picture_of_calendar_img',
            [
                'label' => esc_html__('Picture Of Calendar Img', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'banner_paragraph',
            [
                'label' => esc_html__('Banner Paragraph', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'action_button_title',
            [
                'label' => esc_html__('Action Button Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'action_button',
            [
                'label' => esc_html__('Action Button', 'cleaning_service-core'),
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


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $picture_of_cover_front = ($settings["picture_of_cover_front"]["id"] != "") ? wp_get_attachment_image($settings["picture_of_cover_front"]["id"], "full") : $settings["picture_of_cover_front"]["url"];
        $picture_of_cover_front_alt = get_post_meta($settings["picture_of_cover_front"]["id"], "_wp_attachment_image_alt", true);
        $picture_of_cover_back = ($settings["picture_of_cover_back"]["id"] != "") ? wp_get_attachment_image($settings["picture_of_cover_back"]["id"], "full") : $settings["picture_of_cover_back"]["url"];
        $picture_of_cover_back_alt = get_post_meta($settings["picture_of_cover_back"]["id"], "_wp_attachment_image_alt", true);
        $picture_of_calendar_img = ($settings["picture_of_calendar_img"]["id"] != "") ? wp_get_attachment_image($settings["picture_of_calendar_img"]["id"], "full") : $settings["picture_of_calendar_img"]["url"];
        $picture_of_calendar_img_alt = get_post_meta($settings["picture_of_calendar_img"]["id"], "_wp_attachment_image_alt", true);
        $title = $settings["title"];
        $banner_paragraph = $settings["banner_paragraph"];
        $action_button_title = $settings["action_button_title"];
        $action_button = $settings["action_button"]["url"];
        $action_button_external = $settings["action_button"]["is_external"] ? 'target="_blank"' : '';
        $action_button_nofollow = $settings["action_button"]["nofollow"] ? 'rel="nofollow"' : '';
?> 
<div class="block inset-35 fullwidth-sm no-pad">
	<div class="container">
        <div class="get-banner-2">
            <div class="get-banner-calendar">
                <div class="calendar-cover">
                    <div class="calendar-cover-front">
                        <?php
                        if (wp_http_validate_url($picture_of_cover_front)) {
                        ?>
                            <img src="<?php echo esc_url($picture_of_cover_front); ?>" alt="<?php esc_url($picture_of_cover_front_alt); ?>">
                        <?php
                        } else {
                            echo $picture_of_cover_front;
                        }
                        ?>
                    </div>
                    <div class="calendar-cover-back">
                        <?php
                        if (wp_http_validate_url($picture_of_cover_back)) {
                        ?>
                            <img src="<?php echo esc_url($picture_of_cover_back); ?>" alt="<?php esc_url($picture_of_cover_back_alt); ?>">
                        <?php
                        } else {
                            echo $picture_of_cover_back;
                        }
                        ?>
                    </div>
                </div>
                <?php
                if (wp_http_validate_url($picture_of_calendar_img)) {
                ?>
                    <img src="<?php echo esc_url($picture_of_calendar_img); ?>" alt="<?php esc_url($picture_of_calendar_img_alt); ?>">
                <?php
                } else {
                    echo $picture_of_calendar_img;
                }
                ?>
            </div>
            <div class="get-banner-content">
                <div class="get-banner-text">
                    <h2><?php echo $title; ?></h2>
                    <p><?php echo $banner_paragraph; ?></p>
                </div>
                <div class="get-banner-button">
                    <?php if($action_button !== '') : ?>
                    <a href="<?php echo esc_url($action_button); ?>" <?php echo $action_button_external; ?> <?php echo $action_button_nofollow; ?> class="btn btn-white btn-lg">
                        <i class="icon icon-bell"></i><?php echo $action_button_title; ?>
                    </a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
