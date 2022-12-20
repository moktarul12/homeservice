<?php
/**
 * fallback redux class
 */
if ( ! class_exists( 'Redux' ) && ! class_exists( 'ReduxFramework' ) ) {

	global $cleaning_services_opt;

	class Redux {

		public static $hasOptions = false;

		public static function setArgs( $option, $args ) {
			$options = get_option( $option, false );
			if ( ! empty( $options ) ) {
				self::$hasOptions = true;
			}
		}

		public static function setSection( $option, $args ) {
			if ( isset( $args['fields'] ) && ! empty( $args['fields'] ) && ! self::$hasOptions ) {
				foreach ( $args['fields'] as $field ) {
					if ( isset( $field['default'] ) && isset( $field['id'] ) ) {
						$id        = $field['id'];
						$updateArr = get_option( $option, array() );
						if ( is_array( $field['default'] ) ) {
							foreach ( $field['default'] as $key => $val ) {
								$updateArr[ $id ][ $key ] = $val;
							}
							update_option( $option, $updateArr );
						} else {
							$updateArr[ $id ] = $field['default'];
							update_option( $option, $updateArr );
						}
					}
				}
			}
		}

	}

	function cleaning_services_redux_fallback_init_var() {
		global $cleaning_services_opt;
		if ( ! is_admin() && ! isset( $cleaning_services_opt ) ) {
			$cleaning_services_opt = get_option( 'cleaning_services_opt' );
			foreach ( $cleaning_services_opt as $yskey => $ysvalue ) {
				if ( $ysvalue == 'on' ) {
					$cleaning_services_opt[ $yskey ] = true;
				} elseif ( $ysvalue == 'off' ) {
					$cleaning_services_opt[ $yskey ] = false;
				}
			}
		}
	}

	add_action( 'init', 'cleaning_services_redux_fallback_init_var', 1 );
}
function cleaning_services_redux_removeDemoModeLink() {
	// Be sure to rename this function to something more unique

	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
	}
}
add_action( 'init', 'cleaning_services_redux_removeDemoModeLink' );
