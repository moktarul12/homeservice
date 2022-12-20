<?php
class Cleaning_Services_Gallery extends WPBakeryShortCode {

    public function __construct() {

        add_shortcode('cleaning_services_gallery', array($this, 'cleaning_services_banner_func'));
    }

    function cleaning_services_banner_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'call_action' => '',
            'gallery_list' => '',
            'gallery_image' => '',
            'extra_class' => ''
                        ), $atts));

        
        $href = vc_build_link($call_action);
     
        $gallery_list = vc_param_group_parse_atts($gallery_list);
        $gallery_bg = wp_get_attachment_image_src((int) $gallery_image,'full');

        ob_start();
        ?>

        <div class="row service-house-row">
            <div class="col-lg-5 inset-pad">
                <?php echo $content;?>
                <div class="divider-sm"></div>
                <a href="<?php echo esc_url($href['url']);?>" class="btn btn-lg animation animated tada" data-animation="tada"><i class="icon-calc"></i><?php echo esc_html($href['title']);?></a>
            </div>
            <div class="col-lg-7">
                <div class="service-house-wrap">
                    <div class="service-house" style="background: url(<?php echo esc_url($gallery_bg[0]); ?>)">
                   <?php foreach ($gallery_list as $item) { 
                       $image_url = wp_get_attachment_image_src((int) $item['image'],'full');
                       ?>
                        <a href="<?php echo esc_url($item['url']);?>" class="service-house-item">
                            <img src="<?php echo $image_url[0];?>" alt="">
                            <?php if(isset($item['title']) && !empty($item['title'])){?>
                            <span class="service-house-item-title"><?php echo $item['title']; ?></span>
                            <?php } ?>
                        </a>
                   <?php } ?>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $output = ob_get_clean();
        return $output;
    }


}

new Cleaning_Services_Gallery();
