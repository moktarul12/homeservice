<?php
$cleaning_services = cleaning_services_options();
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cleaning_Services
 */
get_header(); ?>
    <div id="pageContent">
		<div class="container">
			<?php if ( is_home() && ! is_front_page() ){ ?>
                <h1 class="text-center decor color">
                    <?php  single_post_title(); ?>
                </h1>
            <?php } ?>
			<div class="row">
			<?php if (is_active_sidebar('blog_sideber')) { ?>
					<div class="col-md-9 column-center primary with-sidebar-blog">
				<?php }else{ ?>
					<div class="col-md-12 column-center primary">
				<?php } ?>
					<div class="blog-post single single_pg_cont">
						<?php
							while ( have_posts() ) : the_post();
								?>
									<div class="post-image">
										<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
									</div>
								<?php 
								echo '<div class="divider-line"></div>';
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile; // End of the loop.
						?>
					</div>
				</div>
				<?php if (is_active_sidebar('blog_sideber')) { ?>
				<div class="col-md-3">
					<?php get_sidebar();?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php
get_footer();