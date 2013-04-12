<?php
/**
 * An extension for adding "Share This" script and style tags to the header
 *
 * @package Extensions
 * @subpackage ShareThis
 * @author Peter Epp
 * @copyright Copyright (c) 2009 Peter Epp (http://teknocat.org)
 * @license GNU Lesser General Public License (http://www.gnu.org/licenses/lgpl.html)
 * @version 1.0 $Id: extension.php 13982 2011-08-08 18:51:55Z teknocat $
 */
class ShareThis extends AbstractExtension {
	/**
	 * Whether or not button can be rendered. This will be set to true on run if publisher ID was found and JS tag could be registered.
	 *
	 * @var string
	 */
	private $_can_render_button = false;
	/**
	 * Register the script and style tags
	 *
	 * @return void
	 * @author Peter Epp
	 */
	public function run() {
		if (defined('SHARE_THIS_PUBLISHER_ID')) {
			$script_attributes = array(
				'src' => 'http://w.sharethis.com/button/sharethis.js#publisher='.SHARE_THIS_PUBLISHER_ID.'&type=website&embeds=true&post_services=email%2Cfacebook%2Ctwitter%2Cgbuzz%2Cmyspace%2Cdigg%2Csms%2Cwindows_live%2Cdelicious%2Cstumbleupon%2Creddit%2Cgoogle_bmarks%2Clinkedin%2Cbebo%2Cybuzz%2Cblogger%2Cyahoo_bmarks%2Cmixx%2Ctechnorati%2Cfriendfeed%2Cpropeller%2Cwordpress%2Cnewsvine&button=false'
			);
			$this->Biscuit->register_header_tag('script',$script_attributes);
			$this->register_css(array('filename' => 'default.css', 'media' => 'screen'));
			$this->_can_render_button = true;
		} else {
			Console::log("ShareThis Extension was unable to register tags because the publisher ID is not defined in the system settings");
		}
	}
	/**
	 * Render buttons from view file
	 *
	 * @return void
	 * @author Peter Epp
	 */
	public function render_button() {
		if ($this->_can_render_button) {
			return Crumbs::capture_include('share_this/views/button.php');
		}
		return '';
	}
	public static function install_migration() {
		DB::query("REPLACE INTO `system_settings` SET `constant_name` = 'SHARE_THIS_PUBLISHER_ID', `friendly_name` = 'Publisher ID', `description` = 'Required in order to display the ShareThis! widget. If left empty the widget will not be shown.', `required` = 0, `group_name` = 'ShareThis!'");
	}
	public static function uninstall_migration() {
		DB::query("DELETE FROM `system_settings` WHERE `constant_name` = 'SHARE_THIS_PUBLISHER_ID'");
	}
}
?>