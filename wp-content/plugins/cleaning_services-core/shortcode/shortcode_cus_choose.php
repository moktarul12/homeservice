<?php
class cleaning_customerChooseUs
{

	public  $colno, $hax_image, $divCounter, $col_no;

	public function __construct()
	{
		add_shortcode('cleaning_cus_choose', array($this, 'cleaning_customer_choose_func'));
		add_shortcode('cleaning_cus_choose_items', array($this, 'cleaning_cus_choose_items_func'));
	}

	public function cleaning_customer_choose_func($atts, $content = null)
	{


		extract(shortcode_atts(array(
			'image' => '',
			'col_no' => '',
			'extra_class' => '',
		), $atts));

		$this->col_no = $col_no;
		$this->colno = 0;
		$this->divCounter = 0;
		$attachement = wp_get_attachment_image_src((int) $image, 'full');
		$this->hax_image = esc_url($attachement[0]);
		$output = '';
		$output .= '<div class="row feature-wrapper feature-wrapper-flex">';
		$output .= do_shortcode($content);
		$output .= '  <div class="col-sm-4 feature-image"><img src="' . $this->hax_image . '" class="img-responsive" alt=""></div>';
		$output .= '</div>';
		$this->col_no = 0;
		$this->colno = 0;
		$this->divCounter = 0;
		return $output;
	}

	public function cleaning_cus_choose_items_func($atts, $content = null)
	{

		extract(shortcode_atts(array(
			'title' => '',
		), $atts));


		// $column_no = $this->col_no;
		// switch ((int) $column_no) {
		//     case 2:
		//         $colclass = 'col-sm-6 col-xs-12';
		//         break;
		//     case 4:
		//         $colclass = 'col-md-3 col-sm-4 col-xs-12';
		//         break;
		//     default:
		//         $colclass = 'col-md-4 col-sm-4 col-xs-12';
		//         break;
		// }

		$this->colno++;
		$this->divCounter++;
		$count = $this->colno;
		$div_ounter = $this->divCounter;

		if ($count == 1 || $count == 2) {
			$css = 'text-right';
		} else {
			$css = '';
		}
		$css_counter = "";
		if ($div_ounter == 3) {
			$css_counter = 'order-change';
		}

		ob_start();

		if ($div_ounter == 1 || $div_ounter == 3) {
			echo ' <div class="col-sm-4 ' . $css_counter . '" >';
		}
?>
		<div class="feature-text <?php echo $css; ?>">
			<h5><?php echo wp_kses_post($title); ?></h5>
			<p class="font-sm"><?php echo wp_kses_post($content); ?></p>
		</div>
<?php
		if ($div_ounter == 2 || $div_ounter == 4) {
			echo ' </div>';
		}

		$content = ob_get_clean();
		return $content;
	}
}

new cleaning_customerChooseUs();
