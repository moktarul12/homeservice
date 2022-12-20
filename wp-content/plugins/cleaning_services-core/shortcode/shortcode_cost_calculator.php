<?php
class cleaning_cost_calculator {
	public $rowsize = 0;

	public function __construct() {
		add_shortcode( 'cleaning_cost_calculator', array( $this, 'cleaning_cost_calculator_func' ) );
	}

	function cleaning_cost_calculator_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'heading'       => '',
					'sub_heading'   => '',
					'extra_class'   => '',
					'heading1_list' => '',
				),
				$atts
			)
		);
		$valuesForm = vc_param_group_parse_atts( $heading1_list );
		// print_r($valuesForm);
		ob_start();
		?>
		<div class="container">
				<h2 class="text-center h-lg h-decor"><?php echo $heading; ?></h2>
				<div class="text-center max-800">
					<p class="p-lg"><?php echo $sub_heading; ?></p>
				</div>
				<div class="divider"></div>
				<form id="calculateForm" class="calculate-form" name="calculateForm" method="post" novalidate="novalidate">
				<?php
				foreach ( $valuesForm as $value ) {

					if ( $this->rowsize == 0 ) {
						echo '<div class="row">';
					}
					$this->rowsize = $this->rowsize + $value['div_css_type'];

					if ( $value['input_type'] == 3 ) {
						?>
					<div class="col-sm-<?php echo $value['div_css_type']; ?>">
						<div class="form-wrapper-grey">
							<div class="label"><?php echo $value['heading1_title']; ?></div>
							<div class="slider-with-input">
								<div class="rslider" data-min="<?php echo $value['min_slider_val']; ?>" data-max="<?php echo $value['max_slider_val']; ?>"  data-step="<?php echo $value['step_slider_val']; ?>" ></div>
								<?php
								if ( $value['slider_text_field'] == 1 ) {
									$type = 'text';
								} else {
									$type = 'hidden';
								}
								?>
								<input type="<?php echo $type; ?>">
							</div>
						</div>
					</div>
						<?php
					}
					if ( $value['input_type'] == 6 ) {
						?>
						<div class="divider-lg"></div>
						<div class="text-center">
							<h4><?php echo $value['heading1_title']; ?></h4>
						</div>
						<div class="divider"></div>
						<?php
					}
					if ( $value['input_type'] == 2 ) {
						?>
						<div class="col-sm-<?php echo $value['div_css_type']; ?>">
							<div class="form-wrapper-grey">
								<div class="label"><?php echo $value['heading1_title']; ?></div>
								<div class="select-wrapper select-wrapper--sm select-wrapper--full">
									<select name="calculateForm_select1" class="input-custom input-custom--sm select-opt-01">
									<option value="" selected>Choose...</option>
									<?php
									$sec_list_items = vc_param_group_parse_atts( $value['sec_list_item'] );
									foreach ( $sec_list_items as $sec_list_item ) {
										echo '<option value="' . $sec_list_item['sec_list_item_price_field'] . '">' . $sec_list_item['sec_list_item_heading_title'] . '</option>';
									}
									?>
									</select>
								</div>
							</div>
						</div>
						<?php
					}
					if ( $value['input_type'] == 4 ) {
						?>
						<div class="col-sm-<?php echo $value['div_css_type']; ?>">
							<div class="form-wrapper-grey switch-two">
								<div class="label"><?php echo $value['heading1_title']; ?></div>
								<label class="switch-lable-area">
									<input type="checkbox" value="<?php echo $value['chk_price_field']; ?>" > 
									<span class="switch-slider round-switch"></span>
								</label>
							</div>
						</div>
						<?php
					}
					if ( $value['input_type'] == 5 ) {
						?>
						<div class="col-sm-<?php echo $value['div_css_type']; ?>">
							<div class="form-wrapper-grey">
								<div class="label"><?php echo $value['heading1_title']; ?></div>
								<div class="button-group-pills" data-toggle="buttons">
								<?php
									$chk_list_items = vc_param_group_parse_atts( $value['chk_list_item'] );
								foreach ( $chk_list_items as $chk_list_item ) {
									?>
									<label class="btn btn-checkbox active">
										<input type="checkbox" id="calculateForm_checkbox2" name="calculateForm_checkbox2" value="<?php echo $chk_list_item['chk_list_item_price_field']; ?>" >
										<div><?php echo $chk_list_item['chk_list_item_heading_title']; ?></div>
									</label>
									<?php
								}
								?>
								</div>
							</div>
						</div>
						<?php
					}
					if ( $this->rowsize == 12 ) {
						echo '<div>';
						$this->rowsize = 0;
					}
				}
				?>
					<div class="divider-lg"></div>
					<div class="text-center">
						<div class="final-cost-area">
							<h3>Final Cost</h3>
							<div class="final-price">$00.00</div>
						</div>
						<div class="divider-lg"></div>
						<img src="images/h-decor.png" class="img-responsive" alt="">
						<div class="divider-xl"></div>
						<p class="p-lg">Enter your contact details. We will give you a call to finish up.</p>
						<div class="divider-lg"></div>
					</div>
					<div class="inputs-col">
						<div class="row">
							<div class="col-md-6">
								<div class="input-wrapper">
									<input type="text" class="input-custom input-custom--sm input-full" name="name" placeholder="Your name">
								</div>
								<div class="input-wrapper">
									<input type="text" class="input-custom input-custom--sm input-full" name="phone" placeholder="Your phone">
								</div>
								<div class="input-wrapper">
									<input type="text" class="input-custom input-custom--sm input-full" name="email" placeholder="Your e-mail">
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-wrapper">
									<textarea class="textarea-custom input-full" name="message" placeholder="Message"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center">
					<div class="divider-lg"></div>
						<div class="d-flex">
							<div>
								<label class="control control-checkbox">
									<input id="calculateForm_checkbox7" type="checkbox">
									<div class="control-indicator"></div>
								</label>
							</div>
							<div>Please accept <a href="about.html" class="color">Terms and Conditions</a></div>
						</div>
						<div class="divider-md"></div>
						<button type="submit" class="btn btn-lg">Submit Now</button>
					</div>
				</form>
			</div>
		<?php
		$output .= ob_get_clean();
		return $output;
	}


}

new cleaning_cost_calculator();


