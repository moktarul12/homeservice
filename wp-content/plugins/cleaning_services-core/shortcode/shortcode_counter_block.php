<?php
add_shortcode( 'cleaning_services_counterbox_item', 'cleaning_services_counterbox_item_func' );
function cleaning_services_counterbox_item_func( $atts, $content = null ) {

	extract(
		shortcode_atts(
			array(
				'title'                  => '',
				'icon'                   => '',
				'count_number'           => '',
				'number_scrolling_speed' => '',
				'after_count_number'     => '',
				'extra_class'            => '',
			),
			$atts
		)
	);

	ob_start();
	?>
	<!-- product-total -->
	<div class="product-total-box <?php echo esc_attr( $extra_class ); ?>">
		<div class="stat-box">
			<div>
				<span class="number">
					<span data-to="
					<?php
					if ( $count_number != '' ) {
						echo esc_html( $count_number ); }
					?>
					" 
						<?php
						if ( $number_scrolling_speed != '' ) {
							echo 'data-speed="' . intval( $number_scrolling_speed ) . '"'; }
						?>
						>
	<?php
	if ( $content ) {
							echo $content; }
	?>
					</span>
				</span>
					<span class="icon 
					<?php
					if ( $icon != '' ) {
						echo esc_attr( $icon ); }
					?>
					">
					</span>
			</div>
			<div class="text">
				<h5>
				<?php
				if ( $title != '' ) {
					echo esc_attr( $title ); }
				?>
				</h5>
			</div>
		</div>
		<!-- /product-total -->
	</div>
	<!-- /product-total-box -->
	<?php
		$content = ob_get_clean();
		return $content;
}
