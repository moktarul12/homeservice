<?php
$cleaning_services = cleaning_services_options();
if ( isset( $cleaning_services['cleaning_services-social-new-tab-open'] ) && $cleaning_services['cleaning_services-social-new-tab-open'] == 1 ) {
	$target = 'target="_blank"';
} else {
	$target = '';
}
?>
<!-- Header -->
<?php if ( ( isset( $cleaning_services['cleaning_services-is_sticky_header'] ) && $cleaning_services['cleaning_services-is_sticky_header'] == 1 ) ) { ?>
<header class="page-header header-sticky">
	<?php } else { ?>
	<header class="page-header">
		<?php } ?>
		<?php
		if ( isset( $cleaning_services['cleaning_services-page-header-mobile'] ) && $cleaning_services['cleaning_services-page-header-mobile'] == 1 ) {
			?>
		<div class="page-header-mobile-info">
			<div class="page-header-mobile-info-content">
				<?php
				if ( isset( $cleaning_services['cleaning_services-page-header-mobile-location'] ) && $cleaning_services['cleaning_services-page-header-mobile-location'] != '' ) {
					?>
				<div class="page-header-info"><i class="icon icon-map-marker"></i>
					<?php echo wp_kses( $cleaning_services['cleaning_services-page-header-mobile-location'], 'cleaning_kses' ); ?>
				</div>
					<?php
				}
				if ( isset( $cleaning_services['cleaning_services-page-header-mobile-phone'] ) && $cleaning_services['cleaning_services-page-header-mobile-phone'] != '' ) {
					?>
				<div class="page-header-info"><i class="icon icon-technology"></i>
					<?php echo wp_kses( $cleaning_services['cleaning_services-page-header-mobile-phone'], 'cleaning_kses' ); ?>
				</div>
					<?php
				}
				if ( isset( $cleaning_services['cleaning_services-page-header-mobile-hour'] ) && $cleaning_services['cleaning_services-page-header-mobile-hour'] != '' ) {
					?>
				<div class="page-header-info"><i class="icon icon-clock"></i>
					<?php echo wp_kses( $cleaning_services['cleaning_services-page-header-mobile-hour'], 'cleaning_kses' ); ?>
				</div>
					<?php
				}
				if ( isset( $cleaning_services['cleaning_services-page-header-mobile-email'] ) && $cleaning_services['cleaning_services-page-header-mobile-email'] != '' ) {
					?>
					<div class="page-header-info"><i class="icon icon-speech-bubble"></i>
						<?php echo wp_kses( $cleaning_services['cleaning_services-page-header-mobile-email'], 'cleaning_kses' ); ?>
					</div>
				<?php } ?>
				<ul class="social-list">
					<?php if ( isset( $cleaning_services['cleaning_services-header-youtube-social'] ) && ! empty( $cleaning_services['cleaning_services-header-youtube-social'] ) ) { ?>
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-youtube-social'] ); ?>" <?php wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-youtube"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-google-plus'] ) && ! empty( $cleaning_services['cleaning_services-header-google-plus'] ) ) { ?>
						<li><a class="icon icon-google-plus-logo" href="<?php echo esc_url( $cleaning_services['cleaning_services-header-google-plus'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-facebook'] ) && ! empty( $cleaning_services['cleaning_services-header-facebook'] ) ) { ?>
						<li><a class="icon icon-facebook-logo" href="<?php echo esc_url( $cleaning_services['cleaning_services-header-facebook'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-twitter'] ) && ! empty( $cleaning_services['cleaning_services-header-twitter'] ) ) { ?>
						<li><a class="icon icon-twitter-logo" href="<?php echo esc_url( $cleaning_services['cleaning_services-header-twitter'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-instagram'] ) && ! empty( $cleaning_services['cleaning_services-header-instagram'] ) ) { ?>
						<li><a class="icon icon-instagram-logo" href="<?php echo esc_url( $cleaning_services['cleaning_services-header-instagram'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-yelp'] ) && ! empty( $cleaning_services['cleaning_services-header-yelp'] ) ) { ?>
						<li><a class="icon icon-yelp" href="<?php echo esc_url( $cleaning_services['cleaning_services-header-yelp'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-linkedin'] ) && ! empty( $cleaning_services['cleaning_services-header-linkedin'] ) ) { ?>
						<li><a class="icon icon-linkedin-logo" href="<?php echo esc_url( $cleaning_services['cleaning_services-header-linkedin'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-pinterest'] ) && ! empty( $cleaning_services['cleaning_services-header-pinterest'] ) ) { ?>
						<li><a class="icon icon-pinterest-logo" href="<?php echo esc_url( $cleaning_services['cleaning_services-header-pinterest'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-tiktok'] ) && ! empty( $cleaning_services['cleaning_services-header-tiktok'] ) ) { ?>
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-tiktok'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="fab fa-tiktok"></i></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php } ?>
		<div class="page-header-top">
			<div class="container">
				<div class="page-header-mobile-info-toggle"></div>
				<?php if ( isset( $cleaning_services['cleaning_services-logo']['url'] ) && $cleaning_services['cleaning_services-logo']['url'] ) { ?>
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $cleaning_services['cleaning_services-logo']['url'] ); ?>" alt="<?php esc_html_e( 'Logo', 'cleaning-services' ); ?>">
					</a>
					<div class="shine"></div>
				</div>     
				<?php } ?>        
				<?php
				if ( isset( $cleaning_services['cleaning_services-page-header-top-middle'] ) && $cleaning_services['cleaning_services-page-header-top-middle'] == 1 ) {
					?>
				<div class="page-header-top-middle hidden-xs">
					<div class="page-header-slogan visible-lg">
						<?php
						if ( isset( $cleaning_services['cleaning_services-page-header-slogan'] ) && $cleaning_services['cleaning_services-page-header-slogan'] != '' ) {
							echo wp_kses_post( $cleaning_services['cleaning_services-page-header-slogan'] );
						}
						?>
					</div>
					<div class="page-header-shedule hidden-xs">
						<?php
						if ( isset( $cleaning_services['cleaning_services-page-header-shedule-header'] ) && $cleaning_services['cleaning_services-page-header-shedule-header'] != '' ) {
							?>
							<i class="icon icon-clock"></i>
							<?php
							echo wp_kses( $cleaning_services['cleaning_services-page-header-shedule-header'], 'cleaning_kses' );
						}
						?>
					</div>
					<div class="page-header-phone text-right">
						<span class="visible-lg visible-md visible-sm">
							<?php
							if ( isset( $cleaning_services['cleaning_services-phone-caption-header'] ) && $cleaning_services['cleaning_services-phone-caption-header'] != '' ) {
								echo wp_kses( $cleaning_services['cleaning_services-phone-caption-header'], 'cleaning_kses' );
							}
							?>
						</span>
						<span class="phone-number">
							<?php
							if ( isset( $cleaning_services['cleaning_services-phone-number-header'] ) && $cleaning_services['cleaning_services-phone-number-header'] != '' ) {
								echo wp_kses( $cleaning_services['cleaning_services-phone-number-header'], 'cleaning_kses' );
							}
							?>
						</span>
					</div>
				</div>
					<?php
					if ( isset( $cleaning_services['cleaning_services-quote-url'] ) && $cleaning_services['cleaning_services-quote-url'] != '' ) {
						$url = wp_kses_post( $cleaning_services['cleaning_services-quote-url'] );
					} else {
						$url = '#';
					}
					?>
					<?php if ( isset( $cleaning_services['cleaning_services-get-a-quote'] ) && $cleaning_services['cleaning_services-get-a-quote'] != '' ) { ?>
				<div class="quote-button-wrap">
					<a href="<?php echo esc_url( $url ); ?>" class="btn"><i class="icon icon-bell"></i><?php echo wp_kses_post( $cleaning_services['cleaning_services-get-a-quote'] ); ?></a>
				</div>
				<?php } ?>
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>    
						<div class="header-cart">
								<?php
								$count            = WC()->cart->cart_contents_count;
								$conditionarray   = array();
								$conditionarray[] = ( $count > 0 );
								$conditionarray[] = is_shop();
								$conditionarray[] = is_product_category();
								$conditionarray[] = is_product();
								$conditionarray[] = is_cart();
								if ( wp_is_mobile() && count( array_unique( $conditionarray ) ) === 1 ) {
								} else {
									?>
							<a class="cart-contents icon icon-market" href="javascript:void(0)" title="<?php esc_html_e( 'View your shopping cart', 'cleaning-services' ); ?>">
									<?php if ( $count > 0 ) { ?>
								<span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
							<?php } ?>
							</a>
							<div class="header-cart-dropdown">
									<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
							</div>
						</div>
									<?php
								}
					endif;
				}
				?>
			</div>
		</div>
		<a href="<?php echo esc_js( 'javascript:void(0);' ); ?>" class="menu-toggle"><i class="icon-line-menu"></i><i class="icon-cancel"></i></a>
		<div class="page-header-menu doubletap">
			<div class="container">     
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_class'     => 'menu navbar-nav',
							'container'      => 'ul',
							'walker'         => new Walker_Cleaning_Services_Menu(), // use our custom walker
						)
					);
				} else {
					wp_nav_menu(
						array(
							'menu_class' => 'menu navbar-nav',
							'container'  => 'ul',
							'walker'     => new Walker_Cleaning_Services_Menu(), // use our custom walker
						)
					);
				}
				?>
			</div>
		</div>
	</header>
