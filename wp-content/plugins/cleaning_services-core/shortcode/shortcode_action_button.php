<?php
add_shortcode( 'cleaning_sevice_action_button', 'cleaning_sevice_action_button_func' );

function cleaning_sevice_action_button_func( $atts, $content = null ) {
	extract(
		shortcode_atts(
			array(
				'title'       => '',
				'icon'        => '',
				'call_action' => '',
				'extra_class' => '',
			),
			$atts
		)
	);
	ob_start();
	?>
	   <?php $href = vc_build_link( $call_action ); ?>
			 <a href="<?php echo $href['url']; ?>"
								 <?php
									if ( ! ( empty( $href['target'] ) ) ) :
										?>
					 target="<?php echo $href['target']; ?>" <?php endif; ?> class="btn <?php echo esc_attr( $extra_class ); ?>">
			 <i class="icon <?php echo apply_filters( 'replace_icon_html', $atts ); ?>"><?php echo $href['rel']; ?></i>
			 <?php echo esc_html( $title ); ?>
			 </a>
		<?php
		$content = ob_get_clean();
		return $content;
}
