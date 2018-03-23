<?php
 /**
 * 
 *@package babylonePLugin
 */
namespace inc ;

final class Init{

    /**
     * store all the classes inside array
     * @return array full class list
     * 
     */

    public static function get_services(){

        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }
    /**
     * loop through classes,initialize them
     * and call the register() method if it exists
     * @return 
     * 
     */
    
    public static function register_services(){
        foreach( self::get_services() as $class){
            $service = self::instantiate( $class );
            if ( method_exists($service,'register')){
                $service->register();
            }
        }

    }
    /**
     * initialize the class
     * @param class $class    class from the service array
     * @return class instance new instance of the class
     */

    private static function instantiate($class){

        $service = new $class();

        return $service ;
    }
}

// use inc\Activate ;
// use inc\Deactivate ;
// use inc\Pages\AdminPages ;

// // require_once plugin_dir_path( __FILE__ ). '/inc/Admin/Admin-pages.php';//instead of this

// if ( !class_exists( 'BabylonePlugin' ) ) {
// 	class BabylonePlugin
// 	{

// 		public $plugin;

// 		function __construct(){
// 			$this->plugin= plugin_basename( __FILE__);
// 		}

// 		function register() {
// 			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

// 			add_action( 'admin_menu', array($this,'add_admin_pages') );

// 			// add_filter( "plugin_action_links$this->plugin",array($this,'settings_link'));
// 		}

// 		public function settings_link(){
// 		   //add something
// 		   $setting_link='<a href="admin.php?page=babylone_plugin">Settings</a>';
// 		   array_push($links,$setting_link);
// 		   return $links ;
// 		}

// 		public function add_admin_pages(){
// 			add_menu_page( 'babylone plugin', 'Babylone', 'manage_options', 'babylone_plugin', array($this,'admin_index'),'dashicons-store',110 );
// 		}

// 		public function admin_index(){
// 			require_once plugin_dir_path( __FILE__ ). 'templates/admin.php';
// 		}

// 		protected function create_post_type() {
// 			add_action( 'init', array( $this, 'custom_post_type' ) );
// 		}

// 		function custom_post_type() {
// 			register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
// 		}

// 		function enqueue() {
// 			// enqueue all our scripts
// 			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/style.css', __FILE__ ) );
// 			wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/scripts.js', __FILE__ ) );
// 		}

// 		function activate() {
// 			require_once plugin_dir_path( __FILE__ ) . 'inc/babylone-plugin-activate.php';
// 		    Activate::activate();
// 		}
// 	}
// 	$babylonePlugin = new BabylonePlugin();
// 	$babylonePlugin->register();
// 	// activation
// 	register_activation_hook( __FILE__, array( $babylonePlugin, 'activate' ) );
// 	// deactivation
// 	// require_once plugin_dir_path( __FILE__ ) . 'inc/babylone-plugin-deactivate.php';
// 	register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );
// }