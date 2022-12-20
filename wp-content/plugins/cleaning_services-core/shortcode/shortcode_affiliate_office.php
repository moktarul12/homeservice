<?php
add_shortcode('affiliate_office', 'cleaning_item_func');

function cleaning_item_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => 'Affiliate Office',
        'location' => '',
        'place' => '',
        'fax' => '',
        'email' => '',
        'google_plus' => '',
        'facebook' => '',
        'twitter' => '',
        'instagram' => '',
        'extra_class' => '',
                    ), $atts));
    ob_start();
    ?>
    <div class="address-box">
        <h3><?php echo esc_html($title) ?></h3>
        <div class="contact-info-sm">
            <i class="icon icon-map-marker"></i>
            <?php if (!empty($place)): ?>
            <b><?php echo esc_html($place) ?></b>
            <br>
            <?php endif; ?>
            <?php   if(isset($location)&& !empty( $location))  {?>
            <?php echo esc_html__('Phone', 'cleaning-services')?>: <?php echo esc_html($location) ?>
            <?php }
             if(isset($fax)&& !empty( $fax)){?>
            <br> <?php echo esc_html__('Fax', 'cleaning-services')?>: <?php echo esc_html($fax) ?>
            <?php } ?>
            <?php if(isset($email)&& !empty( $email))   {?>
            <br> <?php echo esc_html__('Email', 'cleaning-services')?>: <a href="mailto:<?php echo esc_attr($email) ?>"><?php echo esc_html($email) ?></a>
            <?php } ?>
            <?php if($content != ""){?>
            <br><?php echo wp_kses_post($content) ?>
            <br>
            <?php } ?>
            <ul class="social-list social-list-sm">

                <?php if (!empty($google_plus)): ?>
                    <li>
                        <a href="<?php echo esc_url($google_plus); ?>"><i class="icon-google-plus-logo"></i></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($facebook)): ?>
                    <li>
                        <a href="<?php echo esc_url($facebook); ?>"><i class="icon-facebook-logo"></i></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($twitter)): ?>
                    <li>
                        <a href="<?php echo esc_url($twitter); ?>"><i class="icon-twitter-logo"></i></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($instagram)): ?>
                    <li>
                        <a href="<?php echo esc_url($instagram); ?>"><i class="icon-instagram-logo"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <?php
    $content = ob_get_clean();
    return $content;
}
