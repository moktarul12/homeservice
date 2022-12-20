<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cleaning_Services
 */

get_header();

$show_title = get_post_meta(get_the_ID(), 'framework_show_page_title', true);

if($show_title != 'off') : 
    if ( !is_home() && ! is_front_page() ) : ?>

    	 <header class="entry-header">
            <?php the_title( '<h1 class="text-center h-lg h-decor">', '</h1>' ); ?>
        </header>
    <?php endif;?>
<?php endif;?>    	
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page');
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					echo '<div class="container">'; 
						comments_template();
					echo '</div>'; 
				endif;
			endwhile; 
			?>
		</main>
	</div>
</div>
<?php get_footer();
