<?php
/**
 * @package   Outbound Link Tracking
 * @author    mmcachran
 * @license   GPL-2.0+
 *
 * Plugin Name: Outbound Link Tracking
 * Description: Open outbound links in a new window and track using GA
 * Version:           0.5.0
 * Author:            mmcachran
 * Text Domain:       outbound_link_tracking
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WP_OUTBOUND_LINK_TRACKING_VERSION', '0.5.0' );

// Are we in DEV mode?
if ( ! defined( 'WP_OUTBOUND_LINK_TRACKING' ) ) {
	define( 'WP_OUTBOUND_LINK_TRACKING', true );
}

// load the plugin
require_once( plugin_dir_path( __FILE__ ) . 'lib/outbound-link-tracking.php' );	
add_action( 'plugins_loaded', array( 'Outbound_Link_Tracking', 'get_instance' ) );