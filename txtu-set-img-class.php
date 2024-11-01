<?php
/*
	Plugin Name: Set IMG Class
	Plugin URI: http://txtu.com/projects/
	Description: Removes height and width IMG attributes and inserts ID and CLASS attributes in content images.
	Version: 1.0.0
	Author: Gerry Ilagan
	Author URI: http://txtu.com

============================================================================================================

1.0.0 - 2008-01-14 - Initial version

============================================================================================================
This software is provided "as is" and any express or implied warranties, including, but not limited to, the
implied warranties of merchantibility and fitness for a particular purpose are disclaimed. In no event shall
the copyright owner or contributors be liable for any direct, indirect, incidental, special, exemplary, or
consequential damages (including, but not limited to, procurement of substitute goods or services; loss of
use, data, or profits; or business interruption) however caused and on any theory of liability, whether in
contract, strict liability, or tort (including negligence or otherwise) arising in any way out of the use of
this software, even if advised of the possibility of such damage.

For full license details see license.txt
============================================================================================================ */

add_option('txtu_set_imgclass', 1,
			'Enable or disable the insertion of CLASS attributes in content images.');
add_option('txtu_set_imgid', 1,
			'Enable or disable the insertion of ID attributes in content images.');

/**
 * Create the admin page of this plugin on the options menu of wordpress.
 */
function txtu_addAdminPage() {

    // Create a submenu under Options:
    add_options_page( __('Set Image Class Options'), __('Image Class'), 8,
    				'txtu-set-img-class', 'txtu_showAdminPage' );
}

/**
 * Display the options page for the plugin
 */
function txtu_showAdminPage() {

	if (isset($_POST['txtu_set_img_class_save'])) {
		check_admin_referer();
		update_option('txtu_set_imgclass', $_POST['txtu_set_imgclass']);
		update_option('txtu_set_imgid', $_POST['txtu_set_imgid']);

		// display update message
		echo "<div class='updated fade'><p>";
		_e('Options updated.');
		echo "</p></div>";
	}

	?>
	<div class="wrap">
		<h2><?php _e('Set Image Class Options'); ?></h2>

<style type="text/css">
.paypaldonate {	clear:both;}
.paypaldonate p { color:black;float:left;font-size:16px;font-weight:normal;margin:5px; }
.paypaldonate form {padding-bottom:5px;}
</style>
<div class="paypaldonate">
<p>Please
donate thru PayPal to support the continued development of this plugin.</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
</form>
</div>

		<form method="post">
			<fieldset class='options'>
				<table class="editform" cellspacing="2" cellpadding="5" width="100%">
					<tr>
						<th width="30%" valign="top" style="padding-top: 10px;">
							<label for="txtu_set_imgclass">Enable/Disable CLASS Attribute:</label>
						</th>
						<td>
                    		<select name="txtu_set_imgclass">
                    		<option value="0"
                    		<?php echo (get_option('txtu_set_imgclass') == 0 ? "selected" : "" ); ?>>
                    		<?php _e('DON\'T Insert Image CLASS Atrribute'); ?></option>
                    		<option value="1"
                    		<?php echo (get_option('txtu_set_imgclass') == 1 ? "selected" : "" ); ?>>
                    		<?php _e('Insert Image CLASS Atrribute'); ?></option>
                    		</select>
						</td>
					</tr>
					<tr>
						<th width="30%" valign="top" style="padding-top: 10px;">
							<label for="txtu_set_imgid">Enable/Disable ID Attribute:</label>
						</th>
						<td>
                    		<select name="txtu_set_imgid">
                    		<option value="0"
                    		<?php echo (get_option('txtu_set_imgid') == 0 ? "selected" : "" ); ?>>
                    		<?php _e('DON\'T Insert Image ID Atrribute'); ?></option>
                    		<option value="1"
                    		<?php echo (get_option('txtu_set_imgid') == 1 ? "selected" : "" ); ?>>
                    		<?php _e('Insert Image ID Atrribute'); ?></option>
                    		</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<p class="submit"><input type='submit' name='txtu_set_img_class_save'
						value='Update Options' /></p>
						<input type="hidden" name="action" value="update" />
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
	<?php
}

/**
 * Modify the image tags in the content
 */
function txtu_modifyImageTags ($text='') {
	$tag_pattern = '/(<img[^s]+(st[^s]+src=|src=)["\'](.*?)["\'][^>]+>)/i';
    $tag_pattern = '/(<img\s+[^>]+>)/';

    if (preg_match_all ($tag_pattern, $text, $matches)) {
        for ($m=0; $m<count($matches[0]); $m++) {
            $replacementtext = txtu_processImageTag( $matches[0][$m], $m );
           	$text = str_replace($matches[0][$m],$replacementtext,$text);
        }
    }
	return($text);
}

/**
 * Process the IMG tag by removing HEIGHT/WIDTH attributes and INSERTING CLASS/ID attributes
 */
function txtu_processImageTag( $imagetag, $imgnum ) {
    global $post;

    $src_pattern = '/(<img\s+)(.*)(src=)["\'](.*?)["\']([^>]+)>/';
    $height_pattern = '/(<img\s+)(.*)(height=)["\'](.*?)["\']([^>]+)>/';
    $width_pattern = '/(<img\s+)(.*)(width=)["\'](.*?)["\']([^>]+)>/';
    $align_pattern = '/(<img\s+)(.*)(align=)["\'](.*?)["\']([^>]+)>/';
    $class_pattern = '/(<img\s+)(.*)(class=)["\'](.*?)["\']([^>]+)>/';
    $id_pattern = '/(<img\s+)(.*)(id=)["\'](.*?)["\']([^>]+)>/';

    $nummatches = preg_match_all( $height_pattern, $imagetag, $matches );
    if ( $nummatches != 0 && $nummatches !== false )
        $imagetag = $matches[1][0] . $matches[2][0] . $matches[5][0] .">";

    $nummatches = preg_match_all( $width_pattern, $imagetag, $matches );
    if ( $nummatches != 0 && $nummatches !== false )
        $imagetag = $matches[1][0] . $matches[2][0] . $matches[5][0] .">";

    $nummatches = preg_match_all( $align_pattern, $imagetag, $matches );
    if ( $nummatches != 0 && $nummatches !== false )
        $imagetag = $matches[1][0] . $matches[2][0] . $matches[5][0] .">";

    $nummatches = preg_match_all( $class_pattern, $imagetag, $classmatches );
    if ( get_option('txtu_set_imgclass') == 1 && $nummatches == 0 ) {
        if (is_page()) {
            $cat_name = "page";
        } else {
            $categories = get_the_category();
            $cat_name = str_replace( " ", "-", strtolower($categories[0]->cat_name) );
        }

        $nummatches = preg_match_all( $src_pattern, $imagetag, $matches );
        if ( $nummatches != 0 && $nummatches !== false ) {
            $imagetag = $matches[1][0] . 'class="txtu-'. $cat_name . '" ' .
                            $matches[2][0] . $matches[3][0] . '"' . $matches[4][0] . '"' .
                            $matches[5][0] .">";
        }
    }

    $nummatches = preg_match_all( $id_pattern, $imagetag, $classmatches );
    if ( get_option('txtu_set_imgid') == 1 && $nummatches == 0 ) {
        if (is_page()) {
            $cat_name = "page";
        } else {
            $categories = get_the_category();
            $cat_name = str_replace( " ", "-", strtolower($categories[0]->cat_name) );
        }

        $nummatches = preg_match_all( $src_pattern, $imagetag, $matches );
        if ( $nummatches != 0 && $nummatches !== false ) {
            $imagetag = $matches[1][0] . 'id="txtu-'. $cat_name . '-' . $post->ID . '-' . $imgnum . '" ' .
                            $matches[2][0] . $matches[3][0] . '"' . $matches[4][0] . '"' .
                            $matches[5][0] .">";
        }
    }

    return $imagetag;
}

// Create the hooks to Wordpress
add_action('admin_menu', 'txtu_addAdminPage');
add_filter('the_content', 'txtu_modifyImageTags', 1);

?>