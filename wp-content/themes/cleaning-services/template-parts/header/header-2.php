<?php
$cleaning_services = cleaning_services_options();

if ( isset( $cleaning_services['cleaning_services-social-new-tab-open'] ) && $cleaning_services['cleaning_services-social-new-tab-open'] == 1 ) {
	$target = 'target="_blank"';
} else {
	$target = '';
}
?>
<?php if ( ( isset( $cleaning_services['cleaning_services-is_sticky_header'] ) && $cleaning_services['cleaning_services-is_sticky_header'] == 1 ) ) { ?>
<header class="page-header page-header--style2 header-sticky">
	<?php } else { ?>
	<header class="page-header page-header--style2">
		<?php } ?>
<div class="page-header-mobile-info">
	<div class="page-header-mobile-info-content">
		<?php
		if ( isset( $cleaning_services['cleaning_services-page-header-mobile-location'] ) && $cleaning_services['cleaning_services-page-header-mobile-location'] != '' ) {
			?>
		<div class="page-header-info">
			<i class="icon icon-location"></i><?php echo wp_kses( $cleaning_services['cleaning_services-page-header-mobile-location'], 'cleaning_kses' ); ?>
		</div>
		<?php } ?>
			<?php
			if ( isset( $cleaning_services['cleaning_services-page-header-shedule-header'] ) && $cleaning_services['cleaning_services-page-header-shedule-header'] != '' ) {
				?>
		<div class="page-header-info">
			<i class="icon icon-clock1"></i><?php echo wp_kses( $cleaning_services['cleaning_services-page-header-shedule-header'], 'cleaning_kses' ); ?>
		</div>
			<?php } ?>
			<?php
			if ( isset( $cleaning_services['cleaning_services-phone-number-header'] ) && $cleaning_services['cleaning_services-phone-number-header'] != '' ) {
				?>
		<div class="page-header-info">
			<i class="icon icon-phone"></i><?php echo wp_kses( $cleaning_services['cleaning_services-phone-number-header'], 'cleaning_kses' ); ?>
		</div>
				<?php
			}
			if ( isset( $cleaning_services['cleaning_services-page-header-mobile-email'] ) && $cleaning_services['cleaning_services-page-header-mobile-email'] != '' ) {
				?>
		<div class="page-header-info">
			<i class="icon icon-speech-bubble"></i> <?php echo wp_kses( $cleaning_services['cleaning_services-page-header-mobile-email'], 'cleaning_kses' ); ?>
		</div>
			<?php } ?>
		<ul class="social-list">
			<?php if ( isset( $cleaning_services['cleaning_services-header-youtube-social'] ) && ! empty( $cleaning_services['cleaning_services-header-youtube-social'] ) ) { ?>
				<li> <a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-youtube-social'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-youtube"></i></a> </li>
			<?php } ?>
			<?php if ( isset( $cleaning_services['cleaning_services-header-facebook'] ) && ! empty( $cleaning_services['cleaning_services-header-facebook'] ) ) { ?>
			<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-facebook'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-facebook-logo1"></i></a></li>
			<?php } ?>
			<?php if ( isset( $cleaning_services['cleaning_services-header-twitter'] ) && ! empty( $cleaning_services['cleaning_services-header-twitter'] ) ) { ?>
			<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-twitter'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-twitter-logo1"></i></a></li>
			<?php } ?>
			<?php if ( isset( $cleaning_services['cleaning_services-header-instagram'] ) && ! empty( $cleaning_services['cleaning_services-header-instagram'] ) ) { ?>                         
			<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-instagram'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-instagram-logo1"></i></a></li>
			<?php } ?>
			<?php if ( isset( $cleaning_services['cleaning_services-header-yelp'] ) && ! empty( $cleaning_services['cleaning_services-header-yelp'] ) ) { ?>                         
			<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-yelp'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-yelp"></i></a></li>
			<?php } ?>
			<?php if ( isset( $cleaning_services['cleaning_services-header-linkedin'] ) && ! empty( $cleaning_services['cleaning_services-header-linkedin'] ) ) { ?>                         
			<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-linkedin'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-linkedin"></i></a></li>
			<?php } ?>
			<?php if ( isset( $cleaning_services['cleaning_services-header-pinterest'] ) && ! empty( $cleaning_services['cleaning_services-header-pinterest'] ) ) { ?>                         
			<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-pinterest'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-pinterest"></i></a></li>
			<?php } ?>
			<?php if ( isset( $cleaning_services['cleaning_services-header-tiktok'] ) && ! empty( $cleaning_services['cleaning_services-header-tiktok'] ) ) { ?>                         
			<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-tiktok'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="fab fa-tiktok"></i></a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="page-header-topline">
	<div class="container">
		<div class="page-header-mobile-info-toggle"></div>
		<div class="page-header-topline-left">
					<?php
					if ( isset( $cleaning_services['cleaning_services-page-header-mobile-location'] ) && $cleaning_services['cleaning_services-page-header-mobile-location'] != '' ) {
						?>
			<div class="page-header-info">
				<i class="icon icon-location"></i><?php echo wp_kses( $cleaning_services['cleaning_services-page-header-mobile-location'], 'cleaning_kses' ); ?>
			</div>
					<?php } ?>
					<?php
					if ( isset( $cleaning_services['cleaning_services-page-header-shedule-header'] ) && $cleaning_services['cleaning_services-page-header-shedule-header'] != '' ) {
						?>
			<div class="page-header-info">
				<i class="icon icon-clock1"></i><?php echo wp_kses( $cleaning_services['cleaning_services-page-header-shedule-header'], 'cleaning_kses' ); ?>
			</div>
					<?php } ?>
					<?php
					if ( isset( $cleaning_services['cleaning_services-phone-number-header'] ) && $cleaning_services['cleaning_services-phone-number-header'] != '' ) {
						?>
			<div class="page-header-info">
				<i class="icon icon-phone"></i><?php echo wp_kses( $cleaning_services['cleaning_services-phone-number-header'], 'cleaning_kses' ); ?>
			</div>
					<?php } ?>
		</div>
		<div class="page-header-topline-right">
			<ul class="social-list">
					<?php if ( isset( $cleaning_services['cleaning_services-header-youtube-social'] ) && ! empty( $cleaning_services['cleaning_services-header-youtube-social'] ) ) { ?>
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-youtube-social'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-youtube"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-facebook'] ) && ! empty( $cleaning_services['cleaning_services-header-facebook'] ) ) { ?>
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-facebook'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-facebook-logo1"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-twitter'] ) && ! empty( $cleaning_services['cleaning_services-header-twitter'] ) ) { ?>
					<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-twitter'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-twitter-logo1"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-instagram'] ) && ! empty( $cleaning_services['cleaning_services-header-instagram'] ) ) { ?>                         
					<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-instagram'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-instagram-logo1"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-yelp'] ) && ! empty( $cleaning_services['cleaning_services-header-yelp'] ) ) { ?>          
					<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-yelp'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-yelp"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-linkedin'] ) && ! empty( $cleaning_services['cleaning_services-header-linkedin'] ) ) { ?>          
					<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-linkedin'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-linkedin2"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-pinterest'] ) && ! empty( $cleaning_services['cleaning_services-header-pinterest'] ) ) { ?>                         
					<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-pinterest'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="icon-pinterest2"></i></a></li>
				<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-header-tiktok'] ) && ! empty( $cleaning_services['cleaning_services-header-tiktok'] ) ) { ?>                         
					<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-header-tiktok'] ); ?>" <?php echo wp_kses( $target, 'cleaning_kses' ); ?>><i class="fab fa-tiktok"></i></a></li>
				<?php } ?>
			</ul>
					<?php
					if ( isset( $cleaning_services['cleaning_services-quote-url'] ) && $cleaning_services['cleaning_services-quote-url'] != '' ) {
						$url = wp_kses_post( $cleaning_services['cleaning_services-quote-url'] );
					} else {
						$url = '#';
					}
					?>
					<?php if ( isset( $cleaning_services['cleaning_services-get-a-quote'] ) && $cleaning_services['cleaning_services-get-a-quote'] != '' ) { ?>
			<div class="quote-button-wrap">
				<a href="<?php echo esc_url( $url ); ?>" class="btn"><i class="icon icon-bell"></i><?php echo wp_kses( $cleaning_services['cleaning_services-get-a-quote'], 'cleaning_kses' ); ?></a>
			</div>
					<?php } ?>
		</div>
	</div>
</div>
<div class="page-header-top">
	<div class="container">
			<?php if ( isset( $cleaning_services['cleaning_services-logo']['url'] ) && $cleaning_services['cleaning_services-logo']['url'] ) { ?>
		<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $cleaning_services['cleaning_services-logo']['url'] ); ?>" alt="<?php esc_html_e( 'Logo', 'cleaning-services' ); ?>">
						</a>
			<div class="shine"></div>
		</div>
			<?php } ?>   
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
		<div class="page-header-top-right">
	
			<div class="header-search">
				<div class="header-search-toggle"><i class="icon-search"></i></div>
				<div class="header-search-drop">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>                        
			<div class="header-cart">
					<?php
							$count            = WC()->cart->cart_contents_count;
							$conditionarray   = array();
							$conditionarray[] = $count > 0;
							$conditionarray[] = is_shop();
							$conditionarray[] = is_product_category();
							$conditionarray[] = is_product();
							$conditionarray[] = is_cart();
					?>
				<a href="<?php echo esc_js( 'javascript:void(0);' ); ?>" class="cart-contents icon icon-cart" title="<?php esc_html_e( 'View your shopping cart', 'cleaning-services' ); ?>">
						<?php
						if ( $count > 0 ) {
							?>
							<span class="badge"><?php echo esc_html( $count ); ?></span>
						<?php } ?>
				</a>
				<div class="header-cart-dropdown">
					<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
				</div>
			</div>
			<?php endif; ?>
			<a href="<?php echo esc_js( 'javascript:void(0);' ); ?>" class="menu-toggle"><i class="icon-menu"></i><i class="icon-cancel2"></i></a>
		</div>
	</div>
</div>
</header>
