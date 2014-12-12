<?php
/**
 * Plugin Name: Outbound Link Tracking
 * Description: Open outbound links in a new window and track using GA
 * Version:     0.1.0
 * Author:      mmcachran
 * License:     GPLv2+
 * Text Domain: outbound_link_tracking
 * Domain Path: /languages
 */

/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 
if( ! class_exists( 'Outbound_Link_Tracking' ) ):

class Outbound_Link_Tracking {
	const VERSION = '0.1.0';
	public static $url  = '';
	public static $path = '';
	public static $name = '';

	/**
	 * Sets up our plugin
	 * @since  0.1.0
	 */
	public function __construct() {
		// Useful variables
		self::$url  = trailingslashit( plugin_dir_url( __FILE__ ) );
		self::$path = trailingslashit( dirname( __FILE__ ) );
		self::$name = __( 'Outbound Link Tracking', 'outbound_link_tracking' );
	}
	
	public function hooks() {
		add_action( 'init', array( $this, 'init' ) );

		// Add JS to head
		add_action( 'wp_head', array( $this, 'do_outbound_link_tracking' ), 1 );
	}

	/**
	 * Init hooks
	 * @since  0.1.0
	 * @return null
	 */
	public function init() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'outbound_link_tracking' );
		load_textdomain( 'outbound_link_tracking', WP_LANG_DIR . '/outbound-link-tracking/outbound-link-tracking-' . $locale . '.mo' );
		load_plugin_textdomain( 'outbound_link_tracking', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	
	/**
	 * Add Outbound Link Tracking JS to wp_head()
	 * @since  0.1.0
	 * @return null
	 */
	public function do_outbound_link_tracking() {
		wp_enqueue_script( 'outbound-link-tracking', plugins_url( '/outbound-link-tracking.js', __FILE__ ), array( 'jquery' ) );
	}
}

// init our class
$outbound_link_tracking = new Outbound_Link_Tracking();
$outbound_link_tracking->hooks();

endif;