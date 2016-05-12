<?php
/**
 * Sets up and controls the admin display of settings for
 * our plugin
 *
 * @since      1.0.0
 * @package    adsense-owner-author-split
 * @subpackage adsense-owner-author-split/admin
 * @author     Josh Mallard <josh@limecuda.com>
 */

namespace GingerBeard\Adsense_Owner_Author_Split\Admin;

class Admin {

	/**
	 * Hook up the admin functions and make everything run
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function __construct() {

		$this->load_admin_files();

		// Add defaults for our new settings
		add_filter( 'genesis_theme_settings_defaults', array( Global_Settings\Global_Settings::instance(), 'defaults' ) );

		// Sanitize the new fields
		add_action( 'genesis_settings_sanitizer_init', array( Global_Settings\Global_Settings::instance(), 'sanitize_content' ) );

		// Add the metabox for the new settings
		add_action( 'genesis_theme_settings_metaboxes', array( Global_Settings\Global_Settings::instance(), 'metabox' ) );

		// Add the user profile fields
		add_action( 'show_user_profile', array( 'GingerBeard\Adsense_Owner_Author_Split\Admin\User_Profile_Setting\Profile_Setting', 'user_meta' ) );
		add_action( 'edit_user_profile', array( 'GingerBeard\Adsense_Owner_Author_Split\Admin\User_Profile_Setting\Profile_Setting', 'user_meta' ) );

		// Save user profile
		add_action( 'personal_options_update', array( 'GingerBeard\Adsense_Owner_Author_Split\Admin\User_Profile_Setting\Profile_Setting', 'save_meta' ) );
		add_action( 'edit_user_profile_update', array( 'GingerBeard\Adsense_Owner_Author_Split\Admin\User_Profile_Setting\Profile_Setting', 'save_meta' ) );
	}

	/**
	 * Get all the admin files
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function load_admin_files() {

		require plugin_dir_path( __FILE__ ) . 'Global_Settings.php';
		require plugin_dir_path( __FILE__ ) . 'User_Profile_Setting.php';

	}

}