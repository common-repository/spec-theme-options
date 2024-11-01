<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.spec-india.com/
 * @since             1.0.0
 * @package           Spec_Theme_Options
 *
 * @wordpress-plugin
 * Plugin Name:       SPEC Theme Options
 * Description:       A simple plugin to extend functionalities of SPEC INDIA Themes.
 * Version:           1.0.3
 * Author:            SPEC INDIA
 * Author URI:        https://www.spec-india.com/
 * License:           GNU General Public License v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.en.html 
 * Text Domain:       spec-theme-options
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
define( 'SPEC_THEME_OPTIONS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-spec-theme-options-activator.php
 */
function activate_spec_theme_options() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-spec-theme-options-activator.php';
	Spec_Theme_Options_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-spec-theme-options-deactivator.php
 */
function deactivate_spec_theme_options() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-spec-theme-options-deactivator.php';
	Spec_Theme_Options_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_spec_theme_options' );
register_deactivation_hook( __FILE__, 'deactivate_spec_theme_options' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-spec-theme-options.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_spec_theme_options() {

	$plugin = new Spec_Theme_Options();
	$plugin->run();

}
run_spec_theme_options();
