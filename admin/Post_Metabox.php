<?php
/**
 * Adds the metabox on posts to control display of content ads
 *
 * @since      1.0.0
 * @package    adsense-owner-author-split
 * @subpackage adsense-owner-author-split/admin
 * @author     Josh Mallard <josh@limecuda.com>
 */

namespace GingerBeard\Adsense_Owner_Author_Split\Admin\Post_Metabox;

class Metabox {

	/**
	 * Instance of this class
	 *
	 * @since     1.0.0
	 */
	protected static $instance;

	/**
	 * Used for getting an instance of this class
	 *
	 * @since 1.0.0
	 */
	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Adds the metabox
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function metabox() {

	}

	/**
	 * Adds the metabox option controls
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function metabox_options( $post ) {

	}

	/**
	 * Save the metabox options
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function save_post( $post_id ) {

	}

}