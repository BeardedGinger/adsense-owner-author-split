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

		// Add the admin page
		add_action( 'after_setup_theme', array( $this, 'load_admin_files' ) );
		add_action( 'after_setup_theme', array( $this, 'get_global_settings' ) );

		// Add the user profile fields
		add_action( 'show_user_profile', array( User_Profile_Setting\Profile_Setting::instance(), 'user_meta' ) );
		add_action( 'edit_user_profile', array( User_Profile_Setting\Profile_Setting::instance(), 'user_meta' ) );

		// Save user profile
		add_action( 'personal_options_update', array( User_Profile_Setting\Profile_Setting::instance(), 'save_meta' ) );
		add_action( 'edit_user_profile_update', array( User_Profile_Setting\Profile_Setting::instance(), 'save_meta' ) );
	}

	/**
	 * Get all the admin files
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	public function load_admin_files() {

		require plugin_dir_path( __FILE__ ) . 'Global_Settings.php';
		require plugin_dir_path( __FILE__ ) . 'User_Profile_Setting.php';

	}

	/**
	 * Get the instance of the Global Settings class
	 *
	 * @since     1.0.0
	 */
	public function get_global_settings () {

		$global_settings = Global_Settings\Global_Settings::instance();

		return $global_settings;
	}

}