<?php
/**
 * Adds the global setting for adding a site adsense ID that is the default
 * for ads displayed on the site
 *
 * @since      1.0.0
 * @package    adsense-owner-author-split
 * @subpackage adsense-owner-author-split/admin
 * @author     Josh Mallard <josh@limecuda.com>
 */

namespace GingerBeard\Adsense_Owner_Author_Split\Admin\Global_Settings;

class Global_Settings {

	protected static $instance;

	/**
	 * Used for getting an instance of this class
	 *
	 * @since 2.0.0
	 */
	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Set default values for the New Genesis settings
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public static function defaults( $defaults ) {

		$defaults[ 'global_adsense_id' ] = '';
		$defaults[ 'show_content_ads' ] = 1;
		$defaults[ 'above_content_owner_weight' ] = '';
		$defaults[ 'below_content_owner_weight' ] = '';
		$defaults[ 'shortcode_owner_weight' ] = '';

		return $defaults;
	}

	/**
	 * Sanitize our options
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public static function sanitize_content() {

		// Sanitize the number/text fields
		$new_fields = array(
			'global_adsense_id',
			'above_content_owner_weight',
			'below_content_owner_weight',
			'shortcode_owner_weight'
		);

		genesis_add_option_filter( 'no_html', GENESIS_SETTINGS_FIELD, $new_fields );

		// Sanitize the boolean
		$true_false = array(
			'show_content_ads'
		);

		genesis_add_option_filter( 'one_zero', GENESIS_SETTINGS_FIELD, $true_false );
	}

	/**
	 * Register the metabox for our settings
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function metabox( $_genesis_theme_settings_pagehook ) {

		add_meta_box(
			'aoas_global_settings',
			__( 'Adsense Owner/Author Split', 'adsense_owner_author_split' ),
			array( $this, 'metabox_fields' ),
			$_genesis_theme_settings_pagehook,
			'main'
		);
	}

	/**
	 * Build the fields for the metabox
	 *
	 * @since     1.0.0
	 * @access    public
	 */
	public function metabox_fields() {

		ob_start();
		?>

		<table class="form-table">
			<tbody>

				<tr valign="top">
					<th scope="row"><label for="global_adsense_id"><?php _e( 'Global Adsense ID', 'adsense_owner_author_split' ); ?></label></th>
					<td>
						<p><input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[global_adsense_id]" class="regular-text" id="global_adsense_id" value="<?php echo esc_attr( genesis_get_option( 'global_adsense_id' ) ); ?>" /></p>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="above_content_owner_weight"><?php _e( 'Above Content Ad Weight', 'adsense_owner_author_split' ); ?></label></th>
					<td>
						<p><input type="number" min="1" max="100" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[above_content_owner_weight]" class="regular-text" id="above_content_owner_weight" value="<?php echo esc_attr( genesis_get_option( 'above_content_owner_weight' ) ); ?>" /></p>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="below_content_owner_weight"><?php _e( 'Below Content Ad Weight', 'adsense_owner_author_split' ); ?></label></th>
					<td>
						<p><input type="number" min="1" max="100" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[below_content_owner_weight]" class="regular-text" id="below_content_owner_weight" value="<?php echo esc_attr( genesis_get_option( 'below_content_owner_weight' ) ); ?>" /></p>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="shortcode_owner_weight"><?php _e( 'Shortcode Ad Weight', 'adsense_owner_author_split' ); ?></label></th>
					<td>
						<p><input type="number" min="1" max="100" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[shortcode_owner_weight]" class="regular-text" id="shortcode_owner_weight" value="<?php echo esc_attr( genesis_get_option( 'shortcode_owner_weight' ) ); ?>" /></p>
					</td>
				</tr>

				<tr valign="top">
				<th scope="row"></th>
				<td>
					<p><span class="description"><?php echo __( 'These weights represent the percentage for which the Global Adsense ID will be used compared to the Author Adsense ID when on a post and the author has their ID set. For example, if each of these is set to 65, then the Global Adsense ID will be used for the ads 65% of the time and the Author ID will be used 35% of the time.', 'adsense_owner_author_split' ); ?></span></p>
				</td>
			</tr>


			</tbody>
		</table>

	<?php
		echo ob_get_clean();
	}
}