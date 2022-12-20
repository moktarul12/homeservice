<?php
trait pluginlist {
	public $plugin_list           = array( 'js_composer', 'cleaning-services-demo-installer', 'cleaning_services-core' );
	public $dashboard_Name        = 'Cleaning Services';
	public $dashboard_slug        = 'cleaning-services';
	public $menu_slug_dashboard   = 'envato-theme-license-dashboard';
	public $menu_slug             = 'envato-theme-license-';
	public $plugin_list_with_file = array(
		'js_composer'                      => 'js_composer.php',
		'cleaning-services-demo-installer' => 'cleaning-services-demo-installer.php',
		'cleaning_services-core'           => 'cleaning-services-core.php',
	);
	public $plugin_org_name       = array(
		'js_composer'                      => 'WPBakery Page Builder',
		'cleaning-services-demo-installer' => 'Cleaning Services Demo Installer',
		'cleaning_services-core'           => 'Cleaning Services Core',
	);
	public $doc_url               = 'https://smartdatasoft.com/docs/cleaning-services/';
	public $update_url            = 'https://my.smartdatasoft.com/';
	public $themeitem_id          = '20283498';

}
