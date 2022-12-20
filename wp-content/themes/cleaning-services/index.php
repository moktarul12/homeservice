<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cleaning_Services
 */
$cleaning_services_opt = cleaning_services_options();
get_header();
$show_title = $cleaning_services_opt['cleaning_services-show-title'] ;
$blog_title = $cleaning_services_opt['cleaning_services-blog-title'] ;
?>

<div class="page-main">
<?php
if ($show_title == 1) :
    ?>
    <h1 class="text-center h-lg h-decor"><?php echo esc_html($blog_title);?></h1>
<?php endif; ?>

	<div class="container">
				<div class="row">
                <?php if (is_active_sidebar('blog_sideber')) { ?>
					<div class="col-md-9 aside blog-post with-sidebar-blog">
                    <?php }else{ ?>
                        <div class="col-md-12 aside blog-post">
                    <?php } ?>
  				<?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                         	get_template_part( 'template-parts/content', get_post_format() ); 
                         endwhile;
                    else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif;  
                    ?>
                    <?php
                
                            // Previous/next page navigation.
                    the_posts_pagination( array(
                        'prev_text'          => esc_html__( '&laquo; Previous', 'cleaning-services' ),
                        'next_text'          => esc_html__( 'Next &raquo;', 'cleaning-services' ),
                        'before_page_number' => '',
                    ) );
            ?>
          </div>
            <?php if (is_active_sidebar('blog_sideber')) { ?>
                <div class="col-md-3 aside">
                <?php get_sidebar(); ?>
                </div>
            <?php } ?>
      	</div>
      </div>
</div>
<?php
get_footer();
