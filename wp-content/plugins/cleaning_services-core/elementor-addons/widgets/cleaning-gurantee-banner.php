<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Guarantee_Banner extends Widget_Base
{

    public function get_name()
    {
        return 'guarantee_banner';
    }

    public function get_title()
    {
        return esc_html__('Guarantee Banner', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-fire-extinguisher';
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
            'banner_title',
            [
                'label' => esc_html__('Banner Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Satisfaction Guaranteed!', 'cleaning_service-core')
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core')

            ]
        );
        $this->add_control(
            'picture_of_team_member',
            [
                'label' => esc_html__('Picture Of Team Member', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $banner_title = $settings["banner_title"];
        $description = $settings["description"];
        $picture_of_team_member = ($settings["picture_of_team_member"]["id"] != "") ? wp_get_attachment_image($settings["picture_of_team_member"]["id"], "full") : $settings["picture_of_team_member"]["url"];
        $picture_of_team_member_alt = get_post_meta($settings["picture_of_team_member"]["id"], "_wp_attachment_image_alt", true);
?> 
        <div class="block">
            <div class="container">
                <div class="banner-guarantee">
                    <div class="banner-guarantee-img banner-guarantee-img--topnegative">
                        <?php
                        if (wp_http_validate_url($picture_of_team_member)) {
                        ?>
                            <img src="<?php echo esc_url($picture_of_team_member); ?>" alt="<?php esc_url($picture_of_team_member_alt); ?>">
                        <?php
                        } else {
                            echo $picture_of_team_member;
                        }
                        ?>
                    </div>
                    <div class="banner-guarantee-text">
                        <h2><?php echo $banner_title; ?></h2>
                        <p> <?php echo $description; ?> </p>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
