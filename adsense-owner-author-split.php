<?php
/**
 * @since       1.0.0
 * @package     adsense-owner-author-split
 *
 * Plugin Name:     Adsense Owner/Author Split
 * Plugin URI:      https://github.com/BeardedGinger/adsense-owner-author-split
 * Description:     Allows for site owners and bloggers to split Adsense IDs used when displaying ads in blog posts
 * Version:         1.0.0
 * Author:          Josh Mallard
 * Author URI:      http://joshmallard.com
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     adsense_owner_author_split
 * Domain Path:     /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

include_once( 'includes/Main.php' );
include_once( 'admin/Admin.php' );

function gingerbeard_adsense_owner_author_split() {
	new GingerBeard\Adsense_Owner_Author_Split\Adsense_Owner_Author_Split();
}

gingerbeard_adsense_owner_author_split();

function gingerbeard_adsense_owner_author_split_admin() {
	if( is_admin() ) {
		new GingerBeard\Adsense_Owner_Author_Split\Admin\Admin();
	}
}

gingerbeard_adsense_owner_author_split_admin();