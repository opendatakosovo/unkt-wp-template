<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'sample_options', 'unkt_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'unkttheme' ), __( 'Theme Options', 'unkttheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'unkttheme' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'unkttheme' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'unkttheme' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'unkttheme' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'unkttheme' )
	),
	'5' => array(
		'value' => '5',
		'label' => __( 'Five', 'unkttheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'unkttheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'unkttheme' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'unkttheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'unkttheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'unkttheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'unkt_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * Homepage slides(number)
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Site offline:', 'unkttheme' ); ?></th>
					<td>
						<input id="unkt_theme_options[site_under_construction]" name="unkt_theme_options[site_under_construction]" type="checkbox" value="1" <?php checked( '1', $options['site_under_construction'] ); ?> />
						<label class="description" for="unkt_theme_options[site_under_construction]"><?php _e( 'Check only if you want to put your site offline and display under construction message.', 'unkttheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Title of the Website:', 'unkttheme' ); ?></th>
					<td>
						<input id="unkt_theme_options[page_title]" class="regular-text" type="text" name="unkt_theme_options[page_title]" value="<?php esc_attr_e( $options['page_title'] ); ?>" />
						<label class="description" for="unkt_theme_options[page_title]"><?php _e( '', 'unkttheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample select input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select number of slides(HomePage):', 'unkttheme' ); ?></th>
					<td>
						<select name="unkt_theme_options[number_of_slides]">
							<?php
								$selected = $options['number_of_slides'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="unkt_theme_options[number_of_slides]"><?php _e( '', 'unkttheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample of radio buttons
				 */
				?>
				<!-- <tr valign="top"><th scope="row"><?php _e( 'Radio buttons', 'unkttheme' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Radio buttons', 'unkttheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="unkt_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr> -->

				<?php
				/**
				 * A sample textarea option
				 */
				?>
				<!-- <tr valign="top"><th scope="row"><?php _e( 'A textbox', 'unkttheme' ); ?></th>
					<td>
						<textarea id="unkt_theme_options[page_titlearea]" class="large-text" cols="50" rows="10" name="unkt_theme_options[page_titlearea]"><?php echo esc_textarea( $options['page_titlearea'] ); ?></textarea>
						<label class="description" for="unkt_theme_options[page_titlearea]"><?php _e( 'Sample text box', 'unkttheme' ); ?></label>
					</td>
				</tr> -->
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'unkttheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['site_under_construction'] ) )
		$input['site_under_construction'] = null;
	$input['site_under_construction'] = ( $input['site_under_construction'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['page_title'] = wp_filter_nohtml_kses( $input['page_title'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['number_of_slides'], $select_options ) )
		$input['number_of_slides'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['page_titlearea'] = wp_filter_post_kses( $input['page_title_area'] );

	return $input;
}
