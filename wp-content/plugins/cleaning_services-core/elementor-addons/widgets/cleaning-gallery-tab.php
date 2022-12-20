<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Pestico\Helper\Elementor\Settings\Header;
use Elementor\Core\Schemes;
class Cleaning_Gallery_Tab extends Widget_Base
{


    public function get_name()
    {
        return 'tab_gallery';
    }

    public function get_title()
    {
        return esc_html__('Gallery Tab', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'sds-widget-ico';
    }

    public function get_categories()
    {
        return array('cleaning_service');
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'item',
            array(
                'label' => esc_html__('ITEM', 'cleaning_service-core'),
            )
        );
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Get started with your <b>free estimate', 'cleaning_service-core')
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Get started with your <b>free estimate', 'cleaning_service-core')
            ]
        );
        $this->add_control(
            'all_type',
            array(
                'label'       => __('All Type', 'cleaning_service-core'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT
            )
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'category_list',
            array(
                'label'       => __('Category name', 'cleaning_service-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Appartment'),
                'placeholder' => __('Category name', 'cleaning_service-core')
            )
        );
        $repeater->add_control(
            'item_image',
            array(
                'label'   => esc_html__('Before Image', 'cleaning_service-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                )

            )
        );
        $repeater->add_control(
            'after_image',
            array(
                'label'   => esc_html__('After Image', 'cleaning_service-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                )

            )
        );
        $this->add_control(
            'items',
            array(
                'label'   => esc_html__('Repeater List', 'cleaning_service-core'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'list_title'   => esc_html__('Title #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core')
                    ),
                    array(
                        'list_title'   => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core')
                    )
                )
            )
        );

        $this->end_controls_section();

        // color_section
        $this->start_controls_section(
            'color_section',
            array(
                'label' => __('Color Section', 'cleaning_service-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE
            )
        );

        $this->add_control(
            'activebutton',
            array(
                'label'     => __('Button', 'cleaning_service-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .gallery-section .filter-tabs li.active' => 'background: {{VALUE}}'

                )
            )
        );
        $this->add_control(
            'activeborderbutton',
            array(
                'label'     => __('Button Border', 'cleaning_service-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .gallery-section .filter-tabs li.active' => 'border-color: {{VALUE}}'

                )
            )
        );
        $this->add_control(
            'activetextbutton',
            array(
                'label'     => __('Button Active Text', 'cleaning_service-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .gallery-section .filter-tabs li.active' => 'color: {{VALUE}}'

                )
            )
        );
        $this->add_control(
            'zoombtnhover',
            array(
                'label'     => __('Zoom Button', 'cleaning_service-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .gallery-block .zoom-btn' => 'background: {{VALUE}}'

                )
            )
        );
        
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings     = $this->get_settings_for_display();

        $all_type = $settings['all_type'];
        $heading = $settings['heading'];
        $content = $settings['content'];

?>
    <div class="block">
	<div class="container">
		<h2 class="text-center h-lg h-decor"><?php echo $heading;?></h2>
		<div class="text-center max-800">
			<p class="p-lg"><?php echo $content;?></p>
		</div>
		<div class="filters-by-category text-center">
			<ul class="option-set justify-content-center" data-option-key="filter">
                <?php 
                    if(!empty($all_type) ){ ?>
                        <li>
                            <a href="#filter" data-option-value="*" class="selected"><?php echo $all_type;?></a>
                        </li>
                        <?php }
                        $category_arr       = array();
                        $category_arr_class = array();
                        foreach ($settings['items'] as $key => $item) {

                            $cat                 = $item['category_list'];
                            $child_categories_ex = preg_replace('/\n$/', '', preg_replace('/^\n/', '', preg_replace('/[\r\n]+/', "\n", $cat)));
                            $child_categories_ex = explode(' ', $child_categories_ex);

                            foreach ($child_categories_ex as $child_category) {

                                $category_arr_class[] = str_replace(' ', '_', strtolower($child_category));
                            }
                        }
                        $category_arr1 = array();
                        foreach ($settings['items'] as $item) {
                            $category_list = $item['category_list'];
                            $arrayGetCode  = preg_replace('/\n$/', '', preg_replace('/^\n/', '', preg_replace('/[\r\n]+/', "\n", $category_list)));
                            $arrayGet      = explode("\n", $arrayGetCode);
                            $category_arr1 = array_merge($category_arr1, $arrayGet);
                        }
                        $category_arr1 = array_map('trim', $category_arr1);
                        $category_arr1 = array_unique($category_arr1);
                        $i = 1;
                        foreach ($category_arr1 as $category) {
                            $key = str_replace(' ', '_', $category);
                            $selected = '';
                            $filter_item = $key;
                            if ($i == 1 && $all_type == '') {
                                $selected = "selected";
                            }

                            $tab_category = strtolower(".".$category);
                        
                            echo '<li><a href="#filter" data-option-value="' . $tab_category . '" class="'. $selected .'">' . $category . '</a></li>';
                            $i++;
                        } ?>
			</ul>
		</div>
		<div class="gallery-wrap loaded">
			<div class="loading-content">
				<div class="inner-circles-loader"></div>
			</div>
			<div class="gallery-cleaning gallery-isotope" id="gallery" style="position: relative; height: 1520px;">
            <?php
                $i = 1;
                foreach ($settings['items'] as $key => $item) {

                    $item_image_url     = ($item['item_image']['id'] != '') ? wp_get_attachment_image_url($item['item_image']['id'], 'full') : $item['item_image']['url'];
                    $after_image_url     = ($item['after_image']['id'] != '') ? wp_get_attachment_image_url($item['after_image']['id'], 'full') : $item['after_image']['url'];
                    
                ?>
				<div class="gallery-item <?php echo esc_attr($category_arr_class[$key]); ?>">
					<div class="twentytwenty-wrapper twentytwenty-horizontal">
						<div class="twentytwenty-container" style="height: 350px;">
							<img src="<?php echo $item_image_url;?>" alt="" class="twentytwenty-before">
							<img src="<?php echo $after_image_url;?>" alt="" class="twentytwenty-after">
							<div class="twentytwenty-overlay">
								<div class="twentytwenty-before-label" data-content="before"></div>
								<div class="twentytwenty-after-label" data-content="after"></div>
							</div>
							<div class="twentytwenty-handle" style="left: 285px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div>
						</div>
					</div>
				</div>
                <?php } ?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php
    }
}