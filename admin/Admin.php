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

	}

	/**
	 * Get all the admin files
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function load_admin_files() {

		require plugin_dir_path( __FILE__ ) . 'Global_Setting.php';
		require plugin_dir_path( __FILE__ ) . 'User_Profile_Setting.php';

	}

}