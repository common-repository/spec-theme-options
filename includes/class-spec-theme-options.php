<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.spec-india.com/
 * @since      1.0.0
 *
 * @package    Spec_Theme_Options
 * @subpackage Spec_Theme_Options/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Spec_Theme_Options
 * @subpackage Spec_Theme_Options/includes
 * @author     Vishal Valand <vishal.valand@spec-india.com>
 */
class Spec_Theme_Options
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Spec_Theme_Options_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('SPEC_THEME_OPTIONS_VERSION')) {
			$this->version = SPEC_THEME_OPTIONS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'spec-theme-options';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Spec_Theme_Options_Loader. Orchestrates the hooks of the plugin.
	 * - Spec_Theme_Options_i18n. Defines internationalization functionality.
	 * - Spec_Theme_Options_Admin. Defines all hooks for the admin area.
	 * - Spec_Theme_Options_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-spec-theme-options-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-spec-theme-options-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-spec-theme-options-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-spec-theme-options-public.php';
		//Add Dashboard
		require_once(plugin_dir_path(dirname(__FILE__)) . '/extensions/dashboard/dashboard.php');
		// Include the Redux theme options Framework
		if (!class_exists('ReduxFramework')) {
			require_once(plugin_dir_path(dirname(__FILE__)) . '/extensions/redux/ReduxCore/framework.php');
		}
		// Include the One click demo plugin
		if (!class_exists('OCDI_Plugin')) {
			require_once(plugin_dir_path(dirname(__FILE__)) . '/extensions/one-click-demo-import/one-click-demo-import.php');
		}
		/**
		 * Get the bootstrap!
		 * (Update path to use cmb2 or CMB2, depending on the name of the folder.
		 * Case-sensitive is important on some systems.)
		 */
		require_once(plugin_dir_path(dirname(__FILE__)) . '/extensions/cmb2/init.php');

		//Add Plugin activation
		// require_once(plugin_dir_path(dirname(__FILE__)) . '/extensions/plugin-install/class-tgm-plugin-activation.php');

		//fontawesome for icons
		require_once(plugin_dir_path(dirname(__FILE__)) . '/extensions/font-awesome/font-awesome.php');

		//Add custom post type
		require_once(plugin_dir_path(dirname(__FILE__)) . '/extensions/custom-post/custom-post.php');

		$this->loader = new Spec_Theme_Options_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Spec_Theme_Options_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale()
	{

		$plugin_i18n = new Spec_Theme_Options_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{

		$plugin_admin = new Spec_Theme_Options_Admin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{

		$plugin_public = new Spec_Theme_Options_Public($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Spec_Theme_Options_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
