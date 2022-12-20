<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Service_Faq extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_service_faq';
    }

    public function get_title()
    {
        return esc_html__('Cleaning Service Faq', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-dashboard';
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
                'label' => esc_html__('Faq Content', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('General Questions', 'cleaning_service-core'),
            ]
        );

        $repeater = new Repeater();


        $repeater->add_control(
            'item_faq_question',
            [
                'label' => esc_html__('Faq Question', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                
            ]
        );
        $repeater->add_control(
            'item_faq_answer',
            [
                'label' => esc_html__('Faq Answer', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                
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
        $heading = $settings["heading"];

       $unique_id = $this->get_id();
?> 	
    <h2 class="text-center custom-headingfaq"><?php echo $heading; ?></h2>
        <div class="panel-group">
            <?php
            $i = 1;
            foreach ($settings["items"] as $item) {
                $item_faq_question = $item["item_faq_question"];
                $item_faq_answer = $item["item_faq_answer"];
                $collapse = '';
                $collapsed = 'collapsed';
                if($i == '1') {
                    $collapse = 'in';
                    $collapsed = '';
                }
            ?> 
                <div class="faq-item">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#faq<?php echo $unique_id;?><?php echo $i; ?>" class="<?php echo $collapsed;?>"><?php echo $item_faq_question; ?><span class="caret-toggle closed">–</span><span class="caret-toggle opened">+</span></a></h4>
                        </div>
                        <div id="faq<?php echo $unique_id;?><?php echo $i; ?>" class="panel-collapse collapse <?php echo $collapse;?>">
                            <div class="panel-body">
                               <?php echo $item_faq_answer; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++;
                    } ?>
        </div>
        <div class="divider"></div>
<?php
    }
}
