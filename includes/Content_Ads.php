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
	 * Owner Above Ad
	 *
	 * @since     1.0.0
	 * @access    public
	 * @var       string
	 */
	public $owner_above_ad;

	/**
	 * Owner Below Ad
	 *
	 * @since     1.0.0
	 * @access    public
	 * @var       string
	 */
	public $owner_below_ad;

	/**
	 * Author Above Ad
	 *
	 * @since     1.0.0
	 * @access    public
	 * @var       string
	 */
	public $author_above_ad;

	/**
	 * Author Below Ad
	 *
	 * @since     1.0.0
	 * @access    public
	 * @var       string
	 */
	public $author_below_ad;

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
	 * Set the ad variables
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function __construct() {

		$this->owner_adsense_codes();
		$this->author_adsense_codes();
	}

	/**
	 * Set the global Adsense ID
	 *
	 * @since     1.0.0
	 * @access    private
	 * @param     string     $global_adsense_id
	 */
	private function owner_adsense_codes() {


	}

	/**
	 * Set the author Adsense ID
	 *
	 * @since     1.0.0
	 * @access    private
	 * @param     string     $author_adsense_id
	 */
	private function author_adsense_codes() {


	}
}