<?php
/**
 * Adds the user profile setting to add the author's adsense ID
 *
 * @since      1.0.0
 * @package    adsense-owner-author-split
 * @subpackage adsense-owner-author-split/admin
 * @author     Josh Mallard <josh@limecuda.com>
 */

namespace GingerBeard\Adsense_Owner_Author_Split\Admin\User_Profile_Setting;

class Profile_Setting {

	/**
	 * The adsense ID field
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public static function user_meta( $user ) { ?>

		<h3><?php echo __( 'Adsense Owner/Author Split', 'adsense_owner_author_split' ); ?></h3>

		<table class="form-table">
			<tr>
				<th><label for="author_adsense_id"><?php echo __( 'Your Adsense ID', 'adsense_owner_author_split' ); ?></label>
				<td><input type="text" name="author_adsense_id" value="<?php echo esc_attr(get_the_author_meta( 'author_adsense_id', $user->ID )); ?>" class="regular-text" /></td>
			</tr>

			<?php wp_nonce_field( 'aoas_user_save', 'aoas_user_save_nonce' ); ?>
		</table>

	<?php
	}

	/**
	 * Save meta
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function save_meta( $user_id ) {

		// Does user have access
		if( ! current_user_can( 'edit_user', $user_id ) )
			return;

		// Is the nonce set?
		if( ! isset( $_POST['aoas_user_save_nonce'] ) )
			return;

		// Is it right?
		if( ! wp_verify_nonce( $_POST['aoas_user_save_nonce'], 'aoas_user_save' ) )
			return;

		// Sanitize our field before we save it
		$user_adsense_id = sanitize_text_field( $_POST['author_adsense_id'] );

		update_user_meta( $user_id, 'author_adsense_id', $user_adsense_id );
	}
}
