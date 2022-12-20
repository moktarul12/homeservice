<?php
$cleaning_services = cleaning_services_options();
?>

<!-- Footer -->
<footer class="page-footer">

     <?php  if( has_nav_menu ( 'footer-menu') ){ ?>
        <div class="page-footer-menu">
            <div class="container">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'menu navbar-nav',
                            'container' => 'ul',
                            'walker' => new Walker_Cleaning_Services_Menu() //use our custom walker
                        )
                );
                ?>
                <div class="footer-ribbon">
                    <?php if (isset($cleaning_services['cleaning_services-footer-ribbon']['url']) && $cleaning_services['cleaning_services-footer-ribbon']['url']) { ?>
                        <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($cleaning_services['cleaning_services-footer-ribbon']['url']) ?>" alt="<?php esc_html_e('Footer Ribbon', 'cleaning-services') ?>">
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="container">
        <?php if (isset($cleaning_services['cleaning_services-footer-contact-info']) && ($cleaning_services['cleaning_services-footer-contact-info'] == 1)) { ?>
            <div class="page-footer-bot">
                <div class="logo">
                    <?php if (isset($cleaning_services['cleaning_services-footer-logo']['url']) && $cleaning_services['cleaning_services-footer-logo']['url']) { ?>
                        <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($cleaning_services['cleaning_services-footer-logo']['url']) ?>" alt="<?php esc_html_e('Logo', 'cleaning-services') ?>">
                        </a>
                    <?php } ?>
                </div>
                <div class="page-footer-col-1">
                    <h4><?php
                            if (isset($cleaning_services['cleaning_services-page-footer-title']) && $cleaning_services['cleaning_services-page-footer-title'] != '') {
                                echo wp_kses_post($cleaning_services['cleaning_services-page-footer-title']);
                            }
                        ?>
                    </h4>
                    <div class="page-footer-info"><i class="icon icon-map-marker"></i>
                        <?php
                            if (isset($cleaning_services['cleaning_services-phone-caption']) && $cleaning_services['cleaning_services-phone-caption'] != '') {
                                echo wp_kses($cleaning_services['cleaning_services-phone-caption'],'cleaning_kses');
                            }
                        ?>
                    </div>
                    <div class="page-footer-info"><i class="icon icon-technology"></i>
                        <?php
                            if (isset($cleaning_services['cleaning_services-phone-number']) && $cleaning_services['cleaning_services-phone-number'] != '') {
                                echo wp_kses($cleaning_services['cleaning_services-phone-number'],'cleaning_kses');
                            }
                        ?>
                    </div>
                </div>
                <div class="page-footer-col-2">
                    <div class="page-footer-info"><i class="icon icon-clock"></i>
                        <?php
                        if (isset($cleaning_services['cleaning_services-page-header-shedule']) && $cleaning_services['cleaning_services-page-header-shedule'] != '') {
                            echo wp_kses($cleaning_services['cleaning_services-page-header-shedule'],'cleaning_kses');
                        }
                        ?>
                    </div>
                    <div class="page-footer-info"><i class="icon icon-speech-bubble"></i>
                        <?php
                        if (isset($cleaning_services['cleaning_services-page-email-text']) && $cleaning_services['cleaning_services-page-email-text'] != '') {
                            echo wp_kses($cleaning_services['cleaning_services-page-email-text'],'cleaning_kses');
                        }
                        ?>
                    </div>
                </div>
                <div class="page-footer-col-3">
                    <ul class="social-list">
                        <?php if (isset($cleaning_services['cleaning_services-footer-google-plus']) && !empty($cleaning_services['cleaning_services-footer-google-plus'])) { ?>
                            <li> 
                                <a class="icon icon-google-plus-logo" href="<?php echo esc_url($cleaning_services['cleaning_services-footer-google-plus']); ?>"></a>
                            </li>
                        <?php } ?>
                        <?php if (isset($cleaning_services['cleaning_services-footer-facebook']) && !empty($cleaning_services['cleaning_services-footer-facebook'])) { ?>
                            <li> 
                                <a class="icon icon-facebook-logo" href="<?php echo esc_url($cleaning_services['cleaning_services-footer-facebook']); ?>"></a>
                            </li>
                        <?php } ?>
                        <?php if (isset($cleaning_services['cleaning_services-footer-twitter']) && !empty($cleaning_services['cleaning_services-footer-twitter'])) { ?>
                            <li> 
                                <a class="icon icon-twitter-logo" href="<?php echo esc_url($cleaning_services['cleaning_services-footer-twitter']); ?>"></a>
                            </li>
                        <?php } ?>
                        <?php if (isset($cleaning_services['cleaning_services-footer-instagram']) && !empty($cleaning_services['cleaning_services-footer-instagram'])) { ?>
                            <li> 
                                <a class="icon icon-instagram-logo" href="<?php echo esc_url($cleaning_services['cleaning_services-footer-instagram']); ?>"></a>
                            </li>
                        <?php } ?>
                        <?php if (isset($cleaning_services['cleaning_services-footer-linkedin']) && !empty($cleaning_services['cleaning_services-footer-linkedin'])) { ?>
                            <li> 
                                <a class="icon icon-linkedin-logo" href="<?php echo esc_url($cleaning_services['cleaning_services-footer-linkedin']); ?>"></a>
                            </li>
                        <?php } ?>
                        <?php if (isset($cleaning_services['cleaning_services-footer-yelp']) && !empty($cleaning_services['cleaning_services-footer-yelp'])) { ?>
                            <li> 
                                <a class="icon icon-yelp" href="<?php echo esc_url($cleaning_services['cleaning_services-footer-yelp']); ?>"></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <div class="footer-copyright">
            <?php echo wp_kses($cleaning_services['cleaning_services-footer_copyright'],'cleaning_kses'); ?>
        </div>
        <div class="backToTop js-backToTop">
            <i class="icon icon-right-arrow"></i>
        </div>
    </div>
</footer>