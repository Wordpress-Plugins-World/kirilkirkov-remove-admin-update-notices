<?php
/*
Plugin Name: Remove Admin Update Notices
Plugin URI: https://github.com/Wordpress-Plugins-World/kirilkirkov-remove-admin-update-notices
Description: This plugin removes all administration update, offers, etc. notices from plugins.
Version: 1.0
Author: Kiril Kirkov
Author URI: https://github.com/kirilkirkov/
*/

if(!class_exists('KirilKirkov_RemoveAdminUpdateNotices')) {
	class KirilKirkov_RemoveAdminUpdateNotices 
	{
		private static $instance;

		private function __construct()
		{
			$this->constants(); // Defines any constants used in the plugin
			$this->init(); // Sets up all the actions and filters
		}

		public static function getInstance()
		{
			if ( !self::$instance ) {
				self::$instance = new KirilKirkov_RemoveAdminUpdateNotices();
			}

			return self::$instance;
		}

		private function constants()
		{
			define( 'KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN', 'Remove Admin Notices' );
			define( 'KIRILKIRKOV_REM_ADM_NOTICES_SETTING_GET_PARAM', 'kirilkirkov-remove-adm-notices-settings');
			define( 'KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_PREFIX', 'kirilkirkov_remove_adm_notices_' );
			define( 'KIRILKIRKOV_REM_ADM_NOTICES_SCRIPTS_PREFIX', 'kirilkirkov_remove_adm_notices_');
			define( 'KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_GROUP', 'kirilkirkov-remove-adm-notices-update-options');
		}

		private function init()
		{
			// Register the options with the settings API
			add_action( 'admin_init', array( $this, 'admin_init' ) );

			// Add the menu page
			add_action( 'admin_menu', array( $this, 'setup_admin' ) );

			// admin scripts
			add_action('admin_enqueue_scripts', array($this, 'load_admin_assets'));
		}

		public function load_admin_assets($hook)
		{
			// hidden notices css for all pages
			if(get_option(KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_PREFIX.'hide_admin_notices') 
			&& get_option(KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_PREFIX.'hide_admin_notices') == '1') {

				wp_enqueue_style(KIRILKIRKOV_REM_ADM_NOTICES_SCRIPTS_PREFIX.'boot_admin_notices_css', plugins_url('Includes/Admin/notices.css', __FILE__ ));
			}

			$current_screen = get_current_screen();
			if (strpos($current_screen->base, KIRILKIRKOV_REM_ADM_NOTICES_SETTING_GET_PARAM) === false) {
				return;
			}
			wp_enqueue_style(KIRILKIRKOV_REM_ADM_NOTICES_SCRIPTS_PREFIX.'boot_core_css', plugins_url('Includes/Admin/core.css', __FILE__ ));
			wp_enqueue_style(KIRILKIRKOV_REM_ADM_NOTICES_SCRIPTS_PREFIX.'boot_admin_css', plugins_url('Includes/Admin/admin.css', __FILE__ ));
			wp_enqueue_script(KIRILKIRKOV_REM_ADM_NOTICES_SCRIPTS_PREFIX.'boot_admin_js', plugins_url('Includes/Admin/admin.js', __FILE__ ), array(), false, true);
		}

		public function admin_init()
		{
			if (!is_admin()) {
				wp_die( __('This code is for admin area only', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN) );
			}
			
			register_setting( KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_GROUP, KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_PREFIX.'hide_admin_notices' );
		}

		public function setup_admin()
		{
			// add settings page
			add_options_page( __( 'Remove Admin Notices Plugin', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN ), __( 'Remove Admin Notices', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN ), 'administrator', KIRILKIRKOV_REM_ADM_NOTICES_SETTING_GET_PARAM, array( $this, 'admin_page' ) );
		}

		/**
		 * Admin settings page
		 */
		public function admin_page() 
		{
			require 'Includes/Admin/SettingsForm.php';
		}
	}

	$s = KirilKirkov_RemoveAdminUpdateNotices::getInstance();
}
