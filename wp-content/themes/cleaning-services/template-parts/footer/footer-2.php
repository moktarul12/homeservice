<?php
$cleaning_services = cleaning_services_options();
?>
<footer class="page-footer page-footer--style2">
		<div class="container">
			<div class="page-footer-content row">
				<div class="col-sm-4">
				<?php if ( isset( $cleaning_services['cleaning_services-footer-ribbon']['url'] ) && $cleaning_services['cleaning_services-footer-ribbon']['url'] ) { ?>
						<div class="footer-ribbon"><img src="<?php echo esc_url( $cleaning_services['cleaning_services-footer-ribbon']['url'] ); ?>" alt="<?php esc_html_e( 'Footer Ribbon', 'cleaning-services' ); ?>"></div>
				<?php } ?>
				<?php
				if ( is_active_sidebar( 'footer_col_1' ) ) {
					dynamic_sidebar( 'footer_col_1' );

				}
				?>
				</div>
				<?php if ( is_active_sidebar( 'footer_col_2' ) ) { ?>
				<div class="col-sm-4">
					<?php dynamic_sidebar( 'footer_col_2' ); ?>
				</div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer_col_3' ) ) { ?>
				<div class="col-sm-4">
					<?php dynamic_sidebar( 'footer_col_3' ); ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="page-footer-bottomline">
			<div class="container">
				<div class="page-footer-bottomline-left">
					<div class="footer-copyright"><?php echo wp_kses_post( $cleaning_services['cleaning_services-footer_copyright'] ); ?></div>
				</div>
				<div class="page-footer-bottomline-right">
					<ul class="social-list">
					<?php if ( isset( $cleaning_services['cleaning_services-footer-facebook'] ) && ! empty( $cleaning_services['cleaning_services-footer-facebook'] ) ) { ?>
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-footer-facebook'] ); ?>"><i class="icon-facebook-logo1"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-footer-twitter'] ) && ! empty( $cleaning_services['cleaning_services-footer-twitter'] ) ) { ?>
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-footer-twitter'] ); ?>"><i class="icon-twitter-logo1"></i></a></li>
					<?php } ?>  
					<?php if ( isset( $cleaning_services['cleaning_services-footer-instagram'] ) && ! empty( $cleaning_services['cleaning_services-footer-instagram'] ) ) { ?> 
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-footer-instagram'] ); ?>"><i class="icon-instagram-logo1"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-footer-yelp'] ) && ! empty( $cleaning_services['cleaning_services-footer-yelp'] ) ) { ?> 
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-footer-yelp'] ); ?>"><i class="icon-yelp"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-footer-linkedin'] ) && ! empty( $cleaning_services['cleaning_services-footer-linkedin'] ) ) { ?> 
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-footer-linkedin'] ); ?>"><i class="icon-linkedin2"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-footer-pinterest'] ) && ! empty( $cleaning_services['cleaning_services-footer-pinterest'] ) ) { ?> 
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-footer-pinterest'] ); ?>"><i class="icon-pinterest2"></i></a></li>
					<?php } ?>
					<?php if ( isset( $cleaning_services['cleaning_services-footer-tiktok'] ) && ! empty( $cleaning_services['cleaning_services-footer-tiktok'] ) ) { ?> 
						<li><a href="<?php echo esc_url( $cleaning_services['cleaning_services-footer-tiktok'] ); ?>"><i class="fab fa-tiktok"></i></a></li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="backToTop js-backToTop visible">
			<i class="icon icon-right-arrow"></i>
		</div>
	</footer>
