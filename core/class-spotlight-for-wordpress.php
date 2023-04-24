<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This is the main class that is responsible for registering
 * the core functions, including the files and setting up all features. 
 * 
 * To add a new class, here's what you need to do: 
 * 1. Add your new class within the following folder: core/includes/classes
 * 2. Create a new variable you want to assign the class to (as e.g. public $helpers)
 * 3. Assign the class within the instance() function ( as e.g. self::$instance->helpers = new Spotlight_For_Wordpress_Helpers();)
 * 4. Register the class you added to core/includes/classes within the includes() function
 * 
 * HELPER COMMENT END
 */

if ( ! class_exists( 'Spotlight_For_Wordpress' ) ) :

	/**
	 * Main Spotlight_For_Wordpress Class.
	 *
	 * @package		SPOTLIGHTF
	 * @subpackage	Classes/Spotlight_For_Wordpress
	 * @since		1.0.0
	 * @author		George Nicolaou & Atif Riaz
	 */
	final class Spotlight_For_Wordpress {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Spotlight_For_Wordpress
		 */
		private static $instance;

		/**
		 * SPOTLIGHTF helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Spotlight_For_Wordpress_Helpers
		 */
		public $helpers;

		/**
		 * SPOTLIGHTF settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Spotlight_For_Wordpress_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'spotlight-for-wordpress' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'spotlight-for-wordpress' ), '1.0.0' );
		}

		/**
		 * Main Spotlight_For_Wordpress Instance.
		 *
		 * Insures that only one instance of Spotlight_For_Wordpress exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Spotlight_For_Wordpress	The one true Spotlight_For_Wordpress
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Spotlight_For_Wordpress ) ) {
				self::$instance					= new Spotlight_For_Wordpress;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Spotlight_For_Wordpress_Helpers();
				self::$instance->settings		= new Spotlight_For_Wordpress_Settings();

				//Fire the plugin logic
				new Spotlight_For_Wordpress_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'SPOTLIGHTF/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once SPOTLIGHTF_PLUGIN_DIR . 'core/includes/classes/class-spotlight-for-wordpress-helpers.php';
			require_once SPOTLIGHTF_PLUGIN_DIR . 'core/includes/classes/class-spotlight-for-wordpress-settings.php';

			require_once SPOTLIGHTF_PLUGIN_DIR . 'core/includes/classes/class-spotlight-for-wordpress-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'spotlight-for-wordpress', FALSE, dirname( plugin_basename( SPOTLIGHTF_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.