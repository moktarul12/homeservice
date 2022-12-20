<?php
$link_title = get_post_meta(get_the_ID(), 'framework-link-title', true);
$link = get_post_meta(get_the_ID(), 'framework-link', true);?>
<div class="blog-post contant-main contant-for-link">
<?php
if ($link) {
    ?>
    <a class="link-images" href="<?php the_permalink() ?>">
        <?php the_post_thumbnail('full') ?>
    </a>
    <div class="post-link-wrapper">
        <div class="vert-wrapper">
            <div class="vert"> <a href="<?php echo esc_url($link) ?>" class="post-link"><?php echo esc_html($link_title) ; ?></a> </div>
        </div>
    </div>
<?php } ?>
		
    <div class="post-image">
        <?php
        if (is_sticky()) {
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__('Sticky Post', 'cleaning-services') . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
        }
        ?>
    </div>
    <?php cleaning_services_posted_on(); ?>
    <?php get_template_part('template-parts/content/content'); ?>					 
</div>