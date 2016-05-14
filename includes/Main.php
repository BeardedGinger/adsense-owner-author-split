<?php
/**
 * Main plugin file which puts everything into action and makes
 * the world turn
 *
 * @since      1.0.0
 * @package    adsense-owner-author-split
 * @author     Josh Mallard <josh@limecuda.com>
 */

namespace GingerBeard\Adsense_Owner_Author_Split;

class Adsense_Owner_Author_Split {

 	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 * @var     string
	 */
	const VERSION = '1.0.0';

	/**
	 * The variable name is used as the text domain when internationalizing strings
	 * of text.
	 *
	 * @since    1.0.0
	 * @var      string
	 */
	protected $plugin_slug = 'adsense_owner_author_split';

	/**
	 * Load the necessary files and hook everything up to the appropriate
	 * locations
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function __construct() {

		$this->get_frontend_files();

	}

	/**
	 * Get the necessary files to work with here
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function get_frontend_files() {

		require plugin_dir_path( __FILE__ ) . 'Content_Ads.php';
		require plugin_dir_path( __FILE__ ) . 'Shortcode.php';

	}

 }