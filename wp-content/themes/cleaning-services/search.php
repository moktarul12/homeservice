<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Cleaning_services
 */

get_header();
do_action('cleaning_services_breadcrumb');     ?>


<div class="page-main">
<header class="blog-page-header">
	<?php if ( have_posts() ) : ?>
		<h1 class="text-center"><?php printf( esc_html__( 'Search Results for: %s', 'cleaning-services' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php else : ?>
		<h1 class="text-centere"><?php esc_html__( 'Nothing Found', 'cleaning-services' ); ?></h1>
	<?php endif; ?>
</header><!-- .page-header --> 


	<div class="container">
				<div class="row">
					<div class="col-md-12 aside blog-post ">
  		<?php
			if ( have_posts() ) : ?>


				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_navigation();

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

      	</div>
      </div>
</div>
<?php
get_footer();
