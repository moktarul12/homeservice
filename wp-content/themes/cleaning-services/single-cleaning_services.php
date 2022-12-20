<?php
/**
 * Template Name: Single Service
 * Template Post Type: cleaning_services
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Cleaning_Services
 */

get_header();
$show_breadcrumb = get_post_meta(get_the_ID(), 'framework_show_breadcrumb', true);
$show_title = get_post_meta(get_the_ID(), 'framework_show_page_title', true);
?>
<main class="page-main">
    <!-- Breadcrumbs Block -->
    <?php
        if ($show_breadcrumb != 'off') {
            do_action('cleaning_services_breadcrumb');
        }
    ?>
    <!-- //Breadcrumbs Block -->
    <div class="block">
        <?php if($show_title != 'off') {?>
            <?php the_title( '<h1 class="text-center h-decor">', '</h1>' ); ?>
        <?php } ?>
        <div class="container">
            <div class="row">
            <?php if(is_active_sidebar('servicesidebar')){?>
                <div class="col-md-8 col-lg-9 aside">
            <?php }else{ ?>
                <div class="col-md-12 col-lg-12 aside">
            <?php } ?>
                    <?php the_post_thumbnail('cleaning-services-service-full', array('class' => 'img-responsive')) ?>
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile; // End of the loop.
                    ?>
                </div>
                <?php if(is_active_sidebar('servicesidebar')){?>
                <div class="col-md-4 col-lg-3 aside">
                    <?php get_sidebar('services'); ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
