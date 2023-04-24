<?php
/**
 * Spotlight for WordPress
 *
 * @package       SPOTLIGHTF
 * @author        George Nicolaou & Atif Riaz
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Spotlight for WordPress
 * Plugin URI:    https://www.georgenicolaou.me/plugins/spotlight-for-wordpress
 * Description:   Spotlight search for WordPress with quick commands
 * Version:       1.0.0
 * Author:        George Nicolaou & Atif Riaz
 * Author URI:    https://www.georgenicolaou.me/
 * Text Domain:   spotlight-for-wordpress
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Spotlight for WordPress. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function SPOTLIGHTF() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

// Plugin name
define( 'SPOTLIGHTF_NAME',			'Spotlight for WordPress' );

// Plugin version
define( 'SPOTLIGHTF_VERSION',		'1.0.0' );

// Plugin Root File
define( 'SPOTLIGHTF_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'SPOTLIGHTF_PLUGIN_BASE',	plugin_basename( SPOTLIGHTF_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'SPOTLIGHTF_PLUGIN_DIR',	plugin_dir_path( SPOTLIGHTF_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'SPOTLIGHTF_PLUGIN_URL',	plugin_dir_url( SPOTLIGHTF_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once SPOTLIGHTF_PLUGIN_DIR . 'core/class-spotlight-for-wordpress.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  George Nicolaou & Atif Riaz
 * @since   1.0.0
 * @return  object|Spotlight_For_Wordpress
 */
function SPOTLIGHTF() {
	return Spotlight_For_Wordpress::instance();
}

SPOTLIGHTF();
