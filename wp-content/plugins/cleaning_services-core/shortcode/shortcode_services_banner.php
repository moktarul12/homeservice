<?php
class Cleaning_Services_Banner extends WPBakeryShortCode {
    public static $style;
    public function __construct() {
        add_shortcode('cleaning_services_banner_container', array($this, 'cleaning_services_banner_container_func'));
        add_shortcode('cleaning_services_banner', array($this, 'cleaning_services_banner_func'));
    }

    function cleaning_services_banner_container_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'design_select' => '',
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts(array(
            'mobile_first' => 'true',
            'slides_to_show' => '1',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'arrows' => 'false',
            'dots' => 'true'
        ), $atts);

        ob_start();

        self::$style = $design_select;

        if(self::$style == '2'){
            $class = 'services-grid style-2';
        }else{
            $class = 'services-grid'; 
        }

        wp_localize_script( 'cleaning-services-custom', 'ajax_bannercarousel', $changed_atts);
        ?>


        <div class="<?php echo $class;?> services-mobile-carousel">
            <?php echo do_shortcode($content); ?>
        </div>
        <?php
            $output = ob_get_clean();
            return $output;
    }

    function cleaning_services_banner_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'heading' => '',
            'image' => '',
            'call_action' => '',
            'extra_class' => ''
                        ), $atts));

        $attachement = wp_get_attachment_image_src((int) $image, 'cleaning-services-thumbnail-carousel');
        $href = vc_build_link($call_action);
        ob_start();
 
        ?>
<?php if(self::$style == '2'){ ?>
    <div class="col-xs-6 col-sm-4 col-md-4 service-box">
            <?php if (!empty($href['url']) && ( $href['url'] != '')) : ?>
                <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>  class="service-box-img"  rel="<?php echo $href['rel']; ?>"  >   
                <?php endif; ?>  
                <img src="<?php
                if ($attachement != array()) {
                    echo esc_url($attachement[0]);
                }
                ?>" alt="Services Images">
                     <?php if (!empty($href['url']) && ( $href['url'] != '')) : ?>
                </a>
            <?php endif; ?>
            <h4 class="service-box-title"><?php echo $heading;?></h4>
            <div class="service-box-text"><?php echo $content; ?></div>
            <?php if (!empty($href['url']) && ( $href['url'] != '')) : ?>
                <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>    class="service-box-more"  rel="<?php echo $href['rel']; ?>"  >   
                <?php echo $href['title']; ?><i class="icon-play"></i>  
                </a>
            <?php endif; ?>
        </div>
<?php }else{ ?>
        <div class="col-xs-6 col-sm-6 col-md-4 service-box">
            <?php if (!empty($href['url']) && ( $href['url'] != '')) : ?>
                <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>  class="service-box-img"  rel="<?php echo $href['rel']; ?>"  >   
                <?php endif; ?>  
                <img src="<?php
                if ($attachement != array()) {
                    echo esc_url($attachement[0]);
                }
                ?>" alt="Services Images">
                     <?php if (!empty($href['url']) && ( $href['url'] != '')) : ?>
                </a>
            <?php endif; ?>
            <h3 class="service-box-title"><?php echo $heading;?></h3>
            <div class="service-box-text"><?php echo $content; ?></div>
            <?php if (!empty($href['url']) && ( $href['url'] != '')) : ?>
                <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>    class="service-box-link"  rel="<?php echo $href['rel']; ?>"  >   
                    <?php echo $href['title']; ?>   
                </a>
            <?php endif; ?>
        </div>
<?php } ?>

        <?php
        $output = ob_get_clean();
        return $output;
    }



}

new Cleaning_Services_Banner();
