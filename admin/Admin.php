<?php
/**
 * Sets up and controls the admin display of settings for
 * our plugin
 *
 * @since      1.0.0
 * @package    owner-author-ad-split
 * @subpackage owner-author-ad-split/admin
 * @author     Josh Mallard <josh@limecuda.com>
 */

namespace LimeCuda\Owner_Author_Ad_Split\Admin;

class Admin {

	/**
	 * Hook up the admin functions and make everything run
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function __construct() {

		// Add the admin page
		add_action( 'after_setup_theme', array( $this, 'load_after_theme' ) );
		add_action( 'after_setup_theme', array( $this, 'get_global_settings' ) );

		// Add the user profile fields
		require plugin_dir_path( __FILE__ ) . 'User_Profile_Setting.php';
		add_action( 'show_user_profile', array( User_Profile_Setting\Profile_Setting::instance(), 'user_meta' ) );
		add_action( 'edit_user_profile', array( User_Profile_Setting\Profile_Setting::instance(), 'user_meta' ) );

		// Save user profile fields
		add_action( 'personal_options_update', array( User_Profile_Setting\Profile_Setting::instance(), 'save_meta' ) );
		add_action( 'edit_user_profile_update', array( User_Profile_Setting\Profile_Setting::instance(), 'save_meta' ) );

		// Add the post metabox
		require plugin_dir_path( __FILE__ ) . 'Post_Metabox.php';
		add_action( 'add_meta_boxes', array( Post_Metabox\Metabox::instance(), 'metabox' ) );

		// Save the post metabox
		add_action ( 'save_post', array( Post_Metabox\Metabox::instance(), 'save_post' ) );
	}

	/**
	 * Get the admin files that must be called after theme is setup
	 * Associated class is extension of class created in Genesis
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	public function load_after_theme() {

		if( ! class_exists( 'Genesis_Admin_Boxes' ) )
			return;

		require plugin_dir_path( __FILE__ ) . 'Global_Settings.php';

	}

	/**
	 * Get the instance of the Global Settings class
	 *
	 * @since     1.0.0
	 */
	public function get_global_settings () {

		if( ! class_exists( 'Genesis_Admin_Boxes' ) )
			return;

		$global_settings = Global_Settings\Global_Settings::instance();

		return $global_settings;
	}

}
