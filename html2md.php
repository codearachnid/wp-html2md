<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://github.com/codearachnid
 * @since             1.0.0
 * @package           Html2md
 *
 * @wordpress-plugin
 * Plugin Name:       html2md
 * Plugin URI:        https://github.com/codearachnid/wp-html2md
 * Description:       Convert HTML 2 Markdown with the league https://github.com/thephpleague/html-to-markdown
 * Version:           1.0.0
 * Author:            Timothy Wood @codearachnid
 * Author URI:        https://https://github.com/codearachnid
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       html2md
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HTML2MD_VERSION', '1.0.0' );

require 'vendor/autoload.php';
use League\HTMLToMarkdown\HtmlConverter;


class HTML2MD {
    public static function convert( $s ){
        $regex = "/<[^>]+>/";
        if (preg_match($regex, $s)) {
            $converter = new HtmlConverter();
            $s = $converter->convert( $s );
        }
        return $s;
    }
}
