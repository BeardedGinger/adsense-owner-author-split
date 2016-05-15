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

		// Get the shortcode file
		require plugin_dir_path( __FILE__ ) . 'Shortcode.php';

		// place the content ads
		add_action( 'after_setup_theme', array( $this, 'place_content_ads' ) );

	}

	/**
	 * Get the necessary files to work with here
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function get_frontend_files() {

		require plugin_dir_path( __FILE__ ) . 'Content_Ads.php';

	}

	/**
	 * Place the ads
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function place_content_ads() {

		$this->get_frontend_files();

		add_action( 'genesis_entry_content', array( $this, 'before_content_ad' ), 0 );
		add_action( 'genesis_entry_content', array( $this, 'below_content_ad' ), 10 );

	}

	/**
	 * Before content ad
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function before_content_ad(){

		// If we're not running genesis, don't do anything
		if( ! function_exists( 'genesis' ) )
			return;

		$hide_global = genesis_get_option( 'hide_content_ads', 'gingerbeard_adsense_settings_field' );
		$hide_post = get_post_meta( get_the_ID(), 'gb_adsense_hide_content_ads', true );

		$hide_selected = false;
		$show_selected = false;

		// If global default hide & Add screen
		if( $hide_global == 1 && $hide_post != 'show-ads' || $hide_post == 'hide-ads' )
			return;

		echo 'above content ad';
	}

	/**
	 * Below content ad
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function below_content_ad(){

		// If we're not running genesis, don't do anything
		if( ! function_exists( 'genesis' ) )
			return;

		$hide_global = genesis_get_option( 'hide_content_ads', 'gingerbeard_adsense_settings_field' );
		$hide_post = get_post_meta( get_the_ID(), 'gb_adsense_hide_content_ads', true );

		$hide_selected = false;
		$show_selected = false;

		// If global default hide & Add screen
		if( $hide_global == 1 && $hide_post != 'show-ads' || $hide_post == 'hide-ads' )
			return;

		echo 'below content ad';
	}

 }