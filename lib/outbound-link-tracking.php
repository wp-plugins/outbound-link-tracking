<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Outbound_Link_Tracking {
	const VERSION = '0.5.0';

	public static 
		$url,
		$path,
		$name;

	/**
	 * Instance of this class.
	 *
	 * @since   0.4.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Return an instance of this class.
	 *
	 * @since     0.4.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Sets up our plugin
	 * @since  0.1.0
	 */
	private function __construct() {
		// Useful variables
		self::$url  = trailingslashit( plugin_dir_url( __FILE__ ) );
		self::$path = trailingslashit( dirname( __FILE__ ) );
		self::$name = __( 'Outbound Link Tracking', 'outbound_link_tracking' );

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
		wp_enqueue_script( 'outbound-link-tracking', self::$url . 'outbound-link-tracking.js', array( 'jquery' ) );
	}
}