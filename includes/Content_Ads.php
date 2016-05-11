<?php
/**
 * Generates the adsense ads to be placed at the beginning and
 * end of blog posts
 *
 * @since      1.0.0
 * @package    adsense-owner-author-split
 * @subpackage adsense-owner-author-split/includes
 * @author     Josh Mallard <josh@limecuda.com>
 */

namespace GingerBeard\Adsense_Owner_Author_Split\Content_Ads;

class Ads {

	/**
	 * Author Adsense ID
	 *
	 * @since     1.0.0
	 * @access    private
	 * @var       string     $author_adsense_id     Author Adsense ID.
	 */
	private $author_adsense_id;

	/**
	 * Global Adsense ID
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string      $global_adsense_id     Global Adsense ID.
	 */
	private $global_adsense_id;

	/**
	 * Set the Adsense ID variables
	 *
	 * @since     1.0.0
	 */
	public function __construct() {

		$this->set_global_adsense_id();
		$this->set_author_adsense_id();
	}

	/**
	 * Ad displayed above post content
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public static function above_content_ad() {
		echo 'above content ad';
	}

	/**
	 * Ad displayed below post content
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public static function below_content_ad() {
		echo 'below content ad';
	}

	/**
	 * Set the global Adsense ID
	 *
	 * @since     1.0.0
	 * @access    private
	 * @param     string     $global_adsense_id
	 */
	private function set_global_adsense_id() {

		$global_id = get_site_option( 'aoas_global_adsense_id' );

		$this->global_adsense_id = $global_id;
	}

	/**
	 * Set the author Adsense ID
	 *
	 * @since     1.0.0
	 * @access    private
	 * @param     string     $author_adsense_id
	 */
	private function set_author_adsense_id() {

		global $post;

		$author_id = $post->post_author;
		$adsense_id = get_user_meta( $author_id, 'aoas_author_adsense_id', true );

		if( $adsense_id ) {
			$this->author_adsense_id = $adsense_id;
		} else {
			$this->author_adsense_id = $this->global_adsense_id;
		}
	}
}