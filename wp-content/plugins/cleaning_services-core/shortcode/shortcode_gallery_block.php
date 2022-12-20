<?php
add_shortcode( 'gallaries', 'cleaning_gallaries_cb' );

function cleaning_gallaries_cb( $atts = array() ) {
	extract(
		shortcode_atts(
			array(
				'layout_type' => '1',
				'title'       => '',
				'showposts'   => '-1',
				'orderby'     => 'date',
				'order'       => 'DESC',
			),
			$atts
		)
	);

	$changed_atts = shortcode_atts(
		array(
			'mobile_first'     => 'true',
			'slides_to_show'   => '2',
			'slides_to_scroll' => '1',
			'infinite'         => 'true',
			'autoplay'         => 'true',
			'autoplay_speed'   => '2000',
			'dots'             => 'true',
			'arrows'           => 'true',
		),
		$atts
	);

		wp_localize_script( 'cleaning-services-custom', 'ajax_gallery', $changed_atts );

	$filter_content_class = '';
	ob_start();
	$test_query = new WP_Query( "post_type=gallery&showposts={$showposts}&orderby={$orderby}&order={$order}" );
	?>

	<div id="isotopeGalleryFilters" class="filters-by-category hidden-xs">
		<ul class="option-set" data-option-key="filter">
			<li>
				<a href="#filter" data-option-value="*" class="selected"><?php echo wp_kses_post( __( 'All', 'cleaning_services-core' ) ); ?></a>
			</li>
			<?php
			$taxonomy = 'gallery-cat';
			$terms    = get_terms(
				$taxonomy,
				array(
					'orderby' => $orderby,
					'order'   => $order,
				)
			);
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$filters = array( '' );
				foreach ( $terms as $term ) {
					$filters[] = $term->slug;
					echo '<li><a href="#filter" data-option-value=".' . $term->slug . '" class="">' . $term->name . '</a></li>';
				}
			}
			?>
		</ul>
	</div>

	<?php
	if ( $test_query->have_posts() ) :
		$prefix = 'framework';
		echo '<div id="isotopeGallery" class="gallery gallery-isotope hidden-xs">';
		while ( $test_query->have_posts() ) :
			$test_query->the_post();
			$post_id      = get_the_ID();
			$terms        = get_the_terms( $post_id, 'gallery-cat' );
			$filter_class = '';
			if ( $terms && ! is_wp_error( $terms ) ) :
				$filter = array();
				foreach ( $terms as $term ) {
					$filter[] = $term->slug;
				}
				$filter_class = join( ' ', $filter );
			endif;
			?>
			<div class="gallery-item  <?php echo esc_attr( $filter_class ); ?>">
				<div class="gallery-item-image">
					<?php
					the_post_thumbnail( 'cleaning-services-gallery-thumbnail' );
					$image_url = wp_get_attachment_url( get_post_thumbnail_id() );
					?>
				</div>
				<div class="gallery-item-caption">
					<?php the_title(); ?>
				</div>
				<a href="<?php echo esc_url( $image_url ); ?>" class="gallery-item-zoom" data-lightbox="projects">
					<i class="icon icon-night"></i>
				</a>
			</div>
			<?php
		endwhile;
		echo '</div>';
		echo '<div id="slickGalleryFilters" class="filters-by-category visible-xs"></div>';
		echo '<div id="slickGallery" class="gallery-slick visible-xs"></div>';
	endif;
	wp_reset_postdata();
	return ob_get_clean();
}
