<?php
/**
 * @since       1.0.0
 * @package     adsense-owner-author-split
 *
 * Plugin Name:     Owner/Author Ad Split for Genesis
 * Plugin URI:      https://github.com/BeardedGinger/adsense-owner-author-split
 * Description:     Built specifically for use with the Genesis Framework, split ad space with post author and set how often your ad displays vs the post author's ad
 * Version:         1.1.0
 * Author:          Josh Mallard
 * Author URI:      http://gingercult.com
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