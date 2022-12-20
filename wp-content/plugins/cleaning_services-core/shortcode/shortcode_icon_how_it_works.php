<?php
class cleaning_IconHowitworks {

	public $col_no;

	public function __construct() {
		add_shortcode( 'cleaning_services_how_it_works_items', array( $this, 'cleaning_services_howitworks_items_func' ) );
		add_shortcode( 'cleaning_services_icon_how_it_works', array( $this, 'cleaning_services_howitworks_func' ) );
	}

	function cleaning_services_howitworks_func( $atts, $content = null ) {

		extract(
			shortcode_atts(
				array(
					'col_no'      => '3',
					'extra_class' => '',
				),
				$atts
			)
		);
		$this->col_no = $col_no;
		ob_start();
		$output  = '';
		$output .= '<div class="row' . $extra_class . '">';
		$output .= do_shortcode( $content );
		$output .= '</div>';
		echo $output;
		$content = ob_get_contents();
		ob_end_clean();
		$this->col_no = 0;
		return $content;
	}

	function cleaning_services_howitworks_items_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'number'      => '1',
					'title'       => '',
					'subtitle'    => '',
					'call_action' => '',
					'extra_class' => '',
				),
				$atts
			)
		);

		$column_no = $this->col_no;

		switch ( (int) $column_no ) {
			case 2:
				$colclass = 'col-sm-6 col-md-6';
				break;
			case 4:
				$colclass = 'col-sm-6 col-md-3';
				break;
			default:
				$colclass = 'col-md-4 col-sm-4 col-xs-12';
				break;
		}
		ob_start();
		?>

		<div class="<?php echo $colclass; ?>">
			<div class="how-works">
				<div class="how-works-number <?php echo esc_attr( $extra_class ); ?>"><?php echo wp_kses_post( $number ); ?></div>
				<h3 class="how-works-title"><?php echo esc_html( $title ); ?><span> <?php echo esc_html( $subtitle ); ?></span></h3>
				<p>
					<?php echo wp_kses_post( $content ); ?>
				</p>
			</div>
		</div>
		<?php
		$content = ob_get_clean();
		return $content;
	}

}

new cleaning_IconHowitworks();

