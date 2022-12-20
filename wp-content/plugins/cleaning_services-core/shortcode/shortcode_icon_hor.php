<?php
class cleaning_IconHor {

    public $col_no, $style;

    public function __construct() {
        add_shortcode('cleaning_services_icon_hor_items', array($this, 'cleaning_services_icon_hor_carousel_items_func'));
        add_shortcode('cleaning_services_icon_hor', array($this, 'cleaning_services_icon_hor_carousel_func'));
    }

    function cleaning_services_icon_hor_carousel_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'col_no' => '2',
            'style' => '',
            'extra_class' => '',
                        ), $atts));

        $this->col_no = $col_no;
        $this->style = $style;
        ob_start();
        $output = '';
        $output .= '<div class="row' . $extra_class . '">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        echo $output;
        $content = ob_get_contents();
        ob_end_clean();
        $this->col_no = 0;
        return $content;
    }

    function cleaning_services_icon_hor_carousel_items_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'icon' => '',
            'heading' => '',
            'call_action' => '',
                        ), $atts));

        $href = vc_build_link( $call_action ) ; 

        $column_no = $this->col_no;
        switch ((int) $column_no) {
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

        ob_start();
        ?>
        <div class="<?php echo $colclass; ?>">
            <?php if($this->style == '2'){?>
            <div class="text-icon-hor">
                <div class="text-icon-hor-icon">
                    <i class="icon <?php echo  apply_filters('replace_icon_html',$atts) ;?>"></i>
                </div>
                <div class="text-icon-hor-text">
                    <h3><?php echo wp_kses_post($heading); ?></h3>
                    <?php echo wp_kses_post($content); ?>
                    <?php if($href['url'] != ''){?>
                    <a href="<?php echo $href['url'];?>"<?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?> class="service-box-link"><?php echo $href['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php }else{?>
            <h2><?php echo wp_kses_post($heading); ?></h2>
            <div class="text-icon-hor">
                <div class="text-icon-hor-icon">
                    <i class="icon <?php echo  apply_filters('replace_icon_html',$atts) ;?>"></i>
                </div>
                <div class="text-icon-hor-text">
                    <?php echo wp_kses_post($content); ?>
                    <?php if($href['url'] != ''){?>
                    <a href="<?php echo $href['url'];?>"<?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?> class="service-box-link"><?php echo $href['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php }?>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }

}
new cleaning_IconHor();
