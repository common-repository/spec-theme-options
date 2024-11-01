<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.spec-india.com/
 * @since      1.0.0
 *
 * @package    Spec_Theme_Options
 * @subpackage Spec_Theme_Options/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Spec_Theme_Options
 * @subpackage Spec_Theme_Options/includes
 * @author     Vishal Valand <vishal.valand@spec-india.com>
 */
class Spec_Theme_Options_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'spec-theme-options',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
