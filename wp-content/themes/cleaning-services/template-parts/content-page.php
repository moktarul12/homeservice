<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cleaning_Services
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post_class'); ?>>
    <div class="container">
       
        <div class="entry-content">
            <?php
                the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleaning-services' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div>
    </div>
</div>
