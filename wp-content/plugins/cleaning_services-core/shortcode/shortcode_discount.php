<?php
class cleaning_ServiceDiscount {
    public static $style;
    public function __construct() {
        add_shortcode('cleaning_services_discount_items', array($this, 'cleaning_services_discount_items_func'));
        add_shortcode('cleaning_services_discount', array($this, 'cleaning_services_discount_func'));
    }

    function cleaning_services_discount_func($atts, $content = null) {

        extract(shortcode_atts(array(
            //'design_select' => '',
            'extra_class' => '',
                        ), $atts));

       // self::$style = $design_select; 

        ob_start();
        $output = '';
        $output .= '<div class="discount-box-row">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        echo $output;
        $outputcontent = ob_get_contents();
        ob_end_clean();
        return $outputcontent;
    }

    function cleaning_services_discount_items_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'design_select' => '1',
            'color' => '1',
            'text_color' => '1',
            'discount_type' => '',
                        ), $atts));
        ob_start();
        ?>
        <?php if($design_select == '2'){ ?>
            <div class="discount-box discount-box-2 discount-box--color<?php echo $text_color; ?>">
                <div class="discount-box-sale"><?php echo wp_kses_post($content); ?></div>
                <h4><?php echo wp_kses_post($discount_type); ?></h4>
            </div>
       <?php }else{?>
        <div class="discount-box discount-box--color<?php echo $color; ?>">
            <div class="discount-box-sale"><?php echo wp_kses_post($content); ?></div>
            <div><?php echo wp_kses_post($discount_type); ?></div>
        </div>
       <?php } ?>
        <?php
        $outcontent = ob_get_clean();
        return $outcontent;
    }

}

new cleaning_ServiceDiscount();

