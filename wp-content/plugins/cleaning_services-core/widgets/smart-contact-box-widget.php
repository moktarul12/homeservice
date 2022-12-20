<?php
class CleaningContactBox extends WP_Widget {

	public $defaults;

	public function __construct() {
		$this->defaults = array(
			'title'         => esc_html__( 'Contacts', 'cleaning_services' ),
			'address'       => '3261 Anmoore Road
                <br>Brooklyn, NY 11230',
			'phone'         => '800-123-4567, Fax: 718-724-3312',
			'hours'         => 'Mon-Fri: 9:00 am – 5:00 pm
                <br>Sat-Sun: 11:00 am – 16:00 pm',
			'social_title'  => 'Look for us on',
			'googleplus'    => '#',
			'facebook'      => '#',
			'twitter'       => '#',
			'instagram'     => '#',
			'yelp'          => '#',
			'linkedIn'      => '#',
			'address_title' => 'Address',
			'phone_title'   => 'Phone 24/7',
			'hours_title'   => 'Operating Hours',
		);
		parent::__construct(
			'cleaning_contact_box', // Base ID
			esc_html__( 'Cleaning Contact Box', 'cleaning_services' ), // Name
			array(
				'description' => esc_html__( 'Side Bar Contact Box.', 'cleaning_services' ),
			)
		);
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<strong><?php esc_html_e( 'Title', 'cleaning_services' ); ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address_title' ) ); ?>"><?php esc_html_e( 'Address Title', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'address_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address_title' ) ); ?>" value="<?php echo esc_attr( $instance['address_title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address', 'cleaning_services' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"><?php echo wp_kses_post( $instance['address'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone_title' ) ); ?>"><?php esc_html_e( 'Phone Title', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'phone_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_title' ) ); ?>" value="<?php echo esc_attr( $instance['phone_title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone', 'cleaning_services' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>"><?php echo wp_kses_post( $instance['phone'] ); ?></textarea>
		</p>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'hours_title' ) ); ?>"><?php esc_html_e( 'Hours Title', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'hours_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hours_title' ) ); ?>" value="<?php echo esc_attr( $instance['hours_title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'hours' ) ); ?>"><?php esc_html_e( 'Hours', 'cleaning_services' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hours' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hours' ) ); ?>"><?php echo wp_kses_post( $instance['hours'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<strong><?php esc_html_e( 'Social Title', 'cleaning_services' ); ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'social_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_title' ) ); ?>" value="<?php echo esc_attr( $instance['social_title'] ); ?>" />
			</label>
		</p> 

		<!-- googleplus-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'googleplus' ) ); ?>"><?php esc_html_e( 'Googleplus', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'googleplus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'googleplus' ) ); ?>" value="<?php echo esc_attr( $instance['googleplus'] ); ?>" />
		</p>
		<!-- facebook-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" />
		</p>
		<!-- twiiter-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" />
		</p>

		<!-- instagram-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>" />
		</p>

		<!-- Yelp-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'yelp' ) ); ?>"><?php esc_html_e( 'Yelp', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'yelp' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'yelp' ) ); ?>" value="<?php echo esc_attr( $instance['yelp'] ); ?>" />
		</p>

		<!-- LinkedIn-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedIn' ) ); ?>"><?php esc_html_e( 'LinkedIn', 'cleaning_services' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'linkedIn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedIn' ) ); ?>" value="<?php echo esc_attr( $instance['linkedIn'] ); ?>" />
		</p>

		<?php
	}

	function widget( $args, $instance ) {

		extract( $args );
		echo wp_kses_post( $before_widget );
		if ( ! empty( $instance['title'] ) ) {
			$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
			echo wp_kses_post( $before_title . $title . $after_title );
		};
		?>
		<div class="col-md-12">
			<div class="contact-info-sm">
				<h5><?php echo esc_html( $instance['address_title'] ); ?></h5>
				<i class="icon icon-map-marker"></i>
				<?php if ( ! empty( $instance['address'] ) ) : ?>
					<div>  <?php echo wp_kses_post( $instance['address'] ); ?> 
					</div>
				<?php endif; ?>
			</div>
			<div class="contact-info-sm">
				<h5><?php echo esc_html( $instance['phone_title'] ); ?></h5>
				<i class="icon icon-technology"></i>
				<?php if ( ! empty( $instance['phone'] ) ) : ?>
					<div>  <?php echo wp_kses_post( $instance['phone'] ); ?> 
					</div>
				<?php endif; ?>
			</div>
			<div class="contact-info-sm">
				<h5><?php echo esc_html( $instance['hours_title'] ); ?></h5>
				<i class="icon icon-clock"></i>
				<?php if ( ! empty( $instance['hours'] ) ) : ?>
					<div>  <?php echo wp_kses_post( $instance['hours'] ); ?> 
					</div>
				<?php endif; ?>
			</div>
			<div class="divider"></div>
			<h5>
				<?php if ( ! empty( $instance['social_title'] ) ) : ?>
					<?php echo wp_kses_post( $instance['social_title'] ); ?> 
				<?php endif; ?>
			</h5>
			<ul class="social-list">
				<!--googleplus-->
				<?php if ( ! empty( $instance['googleplus'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $instance['googleplus'] ); ?>"><i class="icon-google-plus-logo"></i></a>
					</li>
				<?php endif; ?>

				<?php if ( ! empty( $instance['facebook'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $instance['facebook'] ); ?>"><i class="icon-facebook-logo"></i></a>
					</li>
				<?php endif; ?>

				<?php if ( ! empty( $instance['twitter'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $instance['twitter'] ); ?>"><i class="icon-twitter-logo"></i></a>
					</li>
				<?php endif; ?>

				<?php if ( ! empty( $instance['instagram'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $instance['instagram'] ); ?>"><i class="icon-instagram-logo"></i></a>
					</li>
				<?php endif; ?>

				<?php if ( ! empty( $instance['yelp'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $instance['yelp'] ); ?>"><i class="icon-yelp"></i></a>
					</li>
				<?php endif; ?>

				<?php if ( ! empty( $instance['linkedIn'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $instance['linkedIn'] ); ?>"><i class="icon-linkedin"></i></a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php
		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		$instance                  = $old_instance;
		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['phone']         = $new_instance['phone'];
		$instance['address']       = $new_instance['address'];
		$instance['hours']         = $new_instance['hours'];
		$instance['social_title']  = $new_instance['social_title'];
		$instance['facebook']      = $new_instance['facebook'];
		$instance['twitter']       = $new_instance['twitter'];
		$instance['googleplus']    = $new_instance['googleplus'];
		$instance['instagram']     = $new_instance['instagram'];
		$instance['yelp']          = $new_instance['yelp'];
		$instance['linkedIn']      = $new_instance['linkedIn'];
		$instance['address_title'] = strip_tags( $new_instance['address_title'] );
		$instance['phone_title']   = strip_tags( $new_instance['phone_title'] );
		$instance['hours_title']   = strip_tags( $new_instance['hours_title'] );
		return $instance;
	}

}

function cleaning_service_CleaningContactBox() {
	register_widget( 'CleaningContactBox' );
}

add_action( 'widgets_init', 'cleaning_service_CleaningContactBox' );
