<?php
class cleaning_ccalc_calculator {
	public $rowsize = 0;
	public $idsize  = 0;

	public function __construct() {
		add_shortcode( 'cleaning_ccalc_container', array( $this, 'cleaning_cost_calculator_container' ) );
		add_shortcode( 'cleaning_ccalc_items', array( $this, 'cleaning_cost_calculator_func' ) );
	}

	function cleaning_cost_calculator_container( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'sub_heading'      => '',
					'heading'          => '',
					'cart'             => 'disable',
					'form_top_heading' => '',
					'extra_class'      => '',
					'form_currency'    => '$',
					'calc_form'        => '',
				),
				$atts
			)
		);
			$valuessubmitForm = vc_param_group_parse_atts( $calc_form );
		ob_start();
		?>
		<div class="container">
			<h2 class="text-center h-lg h-decor"><?php echo $heading; ?></h2>
			<div class="text-center max-800">
				<p class="p-lg"><?php echo $sub_heading; ?></p>
			</div>
			<div class="divider"></div>
			<form id="calculateForm" class="calculate-form" name="calculateForm" method="post" novalidate="novalidate">
				<?php wp_nonce_field( 'costcal_field', 'costcal_nonce' ); ?>
				<?php echo do_shortcode( $content ); ?>
				<div class="divider-lg"></div> 
				<div class="text-center">
					<h3><?php echo esc_html__( 'Final Cost', 'cleaning_services-core' ); ?></h3>
					
					<?php if ( $cart == 'enable' ) { ?>
						<?php if ( class_exists( 'woocommerce' ) ) { ?>
						<span class="final-price"><?php echo get_woocommerce_currency_symbol(); ?><span class="price">379.60</span></span>
						<?php } else { ?>
							<p><?php esc_html_e( 'Please active woocommerce plugin to cart calculat cost.', 'cleaing-services-core' ); ?></p>
						<?php } ?>
						<input type="hidden" class="value_price" name="value_of_price" >
						<div class="divider-lg"></div>
						<img src="<?php echo CLEANING_SERVICES_IMG_URL; ?>/h-decor.png" class="img-responsive" alt="">
						<div class="divider-xl"></div>
						<div class="service-cart-btn">
						<a href="javascript:void(0)" class="btn service-cart" data-product_id="999999999" data-service-title="Cleaning Cost Calculator"><?php echo esc_html( 'Order Now', 'cleaing-services-core' ); ?></a>
						</div>
					<?php } else { ?>
						<span class="final-price"><?php echo get_woocommerce_currency_symbol(); ?><span class="price">379.60</span></span>
						<input type="hidden" class="value_price" name="value_of_price" >
						<div class="divider-lg"></div>
						<img src="<?php echo CLEANING_SERVICES_IMG_URL; ?>/h-decor.png" class="img-responsive" alt="">
						<div class="divider-xl"></div>
						<p class="p-lg"><?php echo $form_top_heading; ?> </p>
						<div class="divider-lg"></div>
				</div>
				<div class="inputs-col">
					<div class="row">
						<?php
						foreach ( $valuessubmitForm as $submitFormvalues ) {
							?>
						<div class="col-md-<?php echo $submitFormvalues['form_div_css_type']; ?>">
							<?php
							$form_list_items = vc_param_group_parse_atts( $submitFormvalues['form_list_item'] );
							foreach ( $form_list_items as $form_list_item ) {
								if ( $form_list_item['form_input_type'] == 1 ) {
									?>
									<div class="input-wrapper">
										<input class="input-custom input-custom--sm input-full" name="<?php echo str_replace( ' ', '_', $form_list_item['form_text'] ) . '_text'; ?>" placeholder="<?php echo $form_list_item['form_text']; ?>" type="text">
									</div>
									<?php
								}
								if ( $form_list_item['form_input_type'] == 4 ) {
									?>
									<div class="input-wrapper">
										<input class="input-custom input-custom--sm input-full" name="<?php echo str_replace( ' ', '_', $form_list_item['form_text'] ) . '_email'; ?>" placeholder="<?php echo $form_list_item['form_text']; ?>" type="email">
									</div>
									<?php
								}
								if ( $form_list_item['form_input_type'] == 2 ) {
									?>
									<div class="input-wrapper">
										<textarea class="textarea-custom input-full" name="<?php echo str_replace( ' ', '_', $form_list_item['form_text'] ) . '_massage'; ?>" placeholder="<?php echo $form_list_item['form_text']; ?>"></textarea>
									</div>
									<?php
								}
								if ( $form_list_item['form_input_type'] == 3 ) {
									?>
									<div class="text-center">
										<div class="divider-lg"></div>
										<?php
										$style = '';
										if ( $form_list_item['terms_switch_field'] == 1 ) {
											$style = "disabled='disabled'";
											?>
										<div class="d-flex">
											<div>
												<label class="control control-checkbox">
													<input id="term_checkbox" type="checkbox">
													<div class="control-indicator"></div>
												</label>
											</div>
											<div>
											<?php echo $form_list_item['terms_switch_link']; ?></div>
										</div>
											<?php
										}
										?>
										<div class="divider-md"></div>
										<div class="send-after-success-massage"></div>
										
										<button id="calc_submit" name="name_submit" <?php echo $style; ?> type="submit" class="btn btn-lg"><?php echo $form_list_item['form_text']; ?></button>
									</div>
									<?php
								}
							}
							?>
						</div>
							<?php
						}

						?>
					</div>
					<?php } ?>
				</div>
			</form>
		</div>
		<?php
		$output = ob_get_clean();
		return $output;
	}

	function cleaning_cost_calculator_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'extra_class'   => '',
					'heading1_list' => '',
					'div_css_type'  => '',
				),
				$atts
			)
		);
		$valuesForm = vc_param_group_parse_atts( $heading1_list );
		ob_start();
		if ( $this->rowsize == 0 ) {
			echo '<div class="row">';
		}
		$this->rowsize = $this->rowsize + $div_css_type;
		?>
		<div class="col-sm-<?php echo $div_css_type; ?>">
		<?php
		foreach ( $valuesForm as $value ) {
			if ( $value['input_type'] == 3 ) {
				?>
					<div class="form-wrapper-grey">
						<div class="label"><?php echo $value['heading1_title']; ?></div>
						<div class="slider-with-input">
							<div class="rslider" data-min="<?php echo $value['min_slider_val']; ?>" data-max="<?php echo $value['max_slider_val']; ?>" data-step="<?php echo $value['step_slider_val']; ?>" data-price="<?php echo $value['slider_price_field']; ?>"  data-start="<?php echo $value['start_slider_val']; ?>"  ></div>
							<?php
							$type = 'text';
							if ( isset( $value['slider_text_field'] ) ) {
								if ( $value['slider_text_field'] == 1 ) {
									$type = 'text';
								} else {
									$type = 'hidden';
								}
							}

							?>
							<input class="slidernumber" name="rangeSlider_calcinput<?php echo $this->idsize; ?>" type="<?php echo $type; ?>">
							<input  value="<?php echo $value['heading1_title']; ?>" name="rangeSlider_title<?php echo $this->idsize; ?>" type="hidden">
						</div>
					</div>
				<?php
				$this->idsize = $this->idsize + 1;
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
					<div class="form-wrapper-grey">
						<div class="label"><?php echo $value['heading1_title']; ?></div>
						<input value="<?php echo $value['heading1_title']; ?>" name="calcselect_title<?php echo $this->idsize; ?>" type="hidden">
						<div class="select-wrapper select-wrapper--sm select-wrapper--full">
							<select name="calcselect_calcinput<?php echo $this->idsize; ?>" class="input-custom input-custom--sm calc_selectbox">
							<option value="" data-price="0" selected><?php echo esc_html__( 'Choose...', 'cleaning_services-core' ); ?></option>
							<?php
							$sec_list_items = vc_param_group_parse_atts( $value['sec_list_item'] );
							foreach ( $sec_list_items as $sec_list_item ) {
								$secprice = 0;
								if ( isset( $sec_list_item['sec_list_item_price_field'] ) ) {
									$secprice = $sec_list_item['sec_list_item_price_field'];
								}

								?>
							
								<option value="<?php echo $sec_list_item['sec_list_item_heading_title']; ?>" data-price="<?php echo $secprice; ?>" ><?php echo $sec_list_item['sec_list_item_heading_title']; ?></option>
							<?php } ?>
							</select>
						</div>
					</div>
				<?php
				$this->idsize = $this->idsize + 1;
			}
			if ( $value['input_type'] == 4 ) {
				?>
					<div class="form-wrapper-grey calc_checkbox">
						<div class="label"><?php echo $value['heading1_title']; ?></div>
						<input  value="<?php echo $value['heading1_title']; ?>" name="calccheckbox_title<?php echo $this->idsize; ?>" type="hidden">
						<label class="switch" for="calculateForm_checkbox<?php echo $this->idsize; ?>">
							<input value="yes" data-price="<?php echo $value['chk_price_field']; ?>" type="checkbox" id="calculateForm_checkbox<?php echo $this->idsize; ?>" name="calccheckbox_calcinput<?php echo $this->idsize; ?>">
							<div class="switchslider round"></div>
						</label>
					</div>
				<?php
				$this->idsize = $this->idsize + 1;
			}
			if ( $value['input_type'] == 5 ) {
				?>
					<div class="form-wrapper-grey">
						<div class="label"><?php echo $value['heading1_title']; ?></div>
						<input value="<?php echo $value['heading1_title']; ?>" name="calccheckboxgroup_title<?php echo $this->idsize; ?>" type="hidden">
						<div class="button-group-pills" data-toggle="buttons">
						<?php
						$chk_list_items = vc_param_group_parse_atts( $value['chk_list_item'] );
						foreach ( $chk_list_items as $chk_list_item ) {
							?>
							<label class="btn btn-checkbox">
								<input type="checkbox" id="calculateForm_checkbox<?php echo $this->idsize; ?>" name="calccheckboxgroup_calcinput<?php echo $this->idsize; ?>[]"  data-price="<?php echo $chk_list_item['chk_list_item_price_field']; ?>" value="<?php echo $chk_list_item['chk_list_item_heading_title']; ?>" >
								<div><?php echo $chk_list_item['chk_list_item_heading_title']; ?></div>
							</label>

						<?php } ?>
						</div>
					</div>
				<?php
				$this->idsize = $this->idsize + 1;
			}
		}
		?>
		</div>
		<?php
		if ( $this->rowsize == 12 ) {
			echo '</div>';
			$this->rowsize = 0;
		}
		$output = ob_get_clean();
		return $output;
	}


}

new cleaning_ccalc_calculator();
/*
[rangeSlider_calcinput0] => 1000
	[rangeSlider_title0] => What is the total square footage to be cleaned:
	[rangeSlider_input1] => 2
	[rangeSlider_title1] => How many bathrooms do you want cleaned?
	[rangeSlider_input2] => 2
	[rangeSlider_title2] => How many bedrooms do you want cleaned?
	[rangeSlider_input3] => 3
	[rangeSlider_title3] => How many living rooms do you want cleaned?
	[calcselect_title4] => What type of kitchen do you have?
	[calcselect_input4] => 15
	[calccheckbox_title5] => Do you have a laundry room that needs cleaning?
	[calccheckbox_input5] => 25
	[calcselect_title6] => Your bathroom includes:
	[calcselect_input6] => 10
	[calccheckbox_title7] => Do you have pets?
	[calccheckbox_input7] => 3
	[calcselect_title8] => Choose your cleaning supplies:
	[calcselect_input8] => 22
	[calcselect_title9] => How often would you like us to clean?
	[calcselect_input9] => 0
	[calccheckboxgroup_title10] => Check additional rooms you would like us to clean:
	[calccheckboxgroup_input10] => Array
		(
			[0] => 30
			[1] => 30
			[2] => 30
		)

	[Your_Name] => jonny
	[Your_phone] => 1111
	[Your_e-mail] => a@b.c
	[Message] => adsdcsdcsdcx
	[action] => send_mail_with_cl_service_data */
