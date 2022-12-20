<?php
namespace CleaningServiceAddons\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class About_Some_Words extends Widget_Base {


	public function get_name() {
		return 'cleaning-about-some-words';
	}

	public function get_title() {
		return esc_html__( 'About Provide List', 'cleaning_service-core' );
	}

	public function get_icon() {
		return 'fa fa-file-audio-o';
	}

	public function get_categories() {
		return array( 'cleaning_service' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item', 'cleaning_service-core' ),
			)
		);

		$this->add_control(
			'per_column',
			array(
				'label'   => esc_html__( 'Per Column', 'orexon-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,

			)
		);
		$this->add_control(
			'heading_area',
			array(
				'label'        => __( 'Display Heading Area?', 'cleaning_service-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'cleaning_service-core' ),
				'label_off'    => __( 'Hide', 'cleaning_service-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'title_heading',
			array(
				'label'     => __( 'Title', 'cleaning_service-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array(
					'heading_area' => 'yes',
				),
			)
		);

		$this->add_control(
			'about_title',
			array(
				'label'       => __( 'Title', 'cleaning_service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'We Provide', 'cleaning_service-core' ),
				'condition'   => array(
					'heading_area' => 'yes',
				),
			)
		);

		$this->add_control(
			'title_html_tag',
			array(
				'label'     => __( 'Title HTML Tag', 'cleaning_service-core' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'h4',
				'options'   => array(
					'h1'   => __( 'H1', 'cleaning_service-core' ),
					'h2'   => __( 'H2', 'cleaning_service-core' ),
					'h3'   => __( 'H3', 'cleaning_service-core' ),
					'h4'   => __( 'H4', 'cleaning_service-core' ),
					'h5'   => __( 'H5', 'cleaning_service-core' ),
					'h6'   => __( 'H6', 'cleaning_service-core' ),
					'div'  => __( 'div', 'cleaning_service-core' ),
					'span' => __( 'span', 'cleaning_service-core' ),
					'p'    => __( 'p', 'cleaning_service-core' ),
				),
				'condition' => array(
					'about_title!' => '',
					'heading_area' => 'yes',
				),
			)
		);
		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'cleaning_service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Online booking and payment', 'cleaning_service-core' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'       => esc_html__( 'List Title', 'cleaning_service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Online booking and payment', 'cleaning_service-core' ),
			)
		);

		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'cleaning_service-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'cleaning_service-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'cleaning_service-core' ),
					),
					array(
						'list_title'   => esc_html__( 'Title #2', 'cleaning_service-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'cleaning_service-core' ),
					),
				),
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings   = $this->get_settings_for_display();
		$per_column = $settings['per_column'];
		$content    = $settings['content'];
		?>
		<p><?php echo $content; ?></p>
		<div class="divider-sm"></div>
		<?php $this->cleaning_about_title(); ?>
		<div class="row">
			<?php
			$i     = 1;
			$count = 1;
			$flag  = 0;
			foreach ( $settings['items'] as $item ) {

				$item_title = $item['item_title'];

				if ( $count == 1 ) {
					?>
					<div class="col-lg-6">
						<ul class="marker-list">
						<?php } ?>
						<li><?php echo $item_title; ?></li>
						<?php
						if ( $count == $per_column ) {
							?>
						</ul>
					</div>
							<?php
							$count = 1;
							$flag  = 0;
						} else {
							$count++;
							$flag = 1;
						}
			}
			if ( $flag ) {
				?>
				</ul>
		</div>
	<?php } ?>
	</div>
		<?php
	}
	/**
	 * Render about title output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	private function cleaning_about_title() {
		$settings = $this->get_settings_for_display();

		if ( $settings['about_title'] ) {
			$this->add_inline_editing_attributes( 'about_title', 'none' );
			$this->add_render_attribute( 'about_title', 'class', 'h-lg' );

			if ( $settings['about_title'] ) {
				$title_tag = $settings['title_html_tag'];
				?>
			<<?php echo esc_html( $title_tag ); ?> <?php echo wp_kses_post( $this->get_render_attribute_string( 'about_title' ) ); ?>>
				<?php echo esc_attr( $settings['about_title'] ); ?>
			</<?php echo esc_html( $title_tag ); ?>>
				<?php
			}
		}
	}
}
