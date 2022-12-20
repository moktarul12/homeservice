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

get_header();
?>
<div class="page-main block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="no-results not-found error-404 not-found">
					<div class="sec-title centered">
						<h2>
							<?php esc_html_e( 'Oops! That page can’t be found.', 'cleaning-services' ); ?>
						</h2>
						<div class="separator"></div>
					</div>
					<div class="not-found-page-content ">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'cleaning-services' ); ?></p>
						<?php
							get_search_form();
						?>
					</div><!-- .page-content -->
				</div><!-- .no-results -->
			</div>
		  </div>
	</div>
</div>
<?php
get_footer();
