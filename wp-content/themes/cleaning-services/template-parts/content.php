<div class="blog-post contant-main">	
    <div class="post-image">
        <?php
        if (is_sticky()) {
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__('Sticky Post', 'cleaning-services') . '"><span class="icon icon-target" aria-hidden="true"></span></div>';
        }
        ?>
        <?php echo the_post_thumbnail('full'); ?>
    </div>
    <?php cleaning_services_posted_on(); ?>
    <?php get_template_part('template-parts/content/content'); ?>
</div>