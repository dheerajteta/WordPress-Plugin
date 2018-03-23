<?php
/*
*@package babyloneplugin
*/
/*
plugin Name: babylone plugin
plugin URI : http//:thebabylone.com
description: just a noob
version:1.0.0.0
Author: Me
Author URI: http://thebabylone.com
Lincence: GPLv2 or later
Text domain: thebabylone
*/

//this caused error
// if(! define('ABSPATH')){
//     die;
// }

// define('ABSPATH') or die ('Hey .Do not enter here');

if (! function_exists( 'add_action' )){
    //this one works 
    echo 'hey , this should cause error';
    exit;
}

 if (file_exists(dirname(__FILE__).'/vendor/autoload.php')){
	 require_once dirname(__FILE__).'/vendor/autoload.php';
 }

//  define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));
//  define('PLUGIN_URL', plugin_dir_path( __FILE__ ));
//  define('PLUGIN',plugin_basename( __FILE__ ));

//  use inc\Base\Activate;
//  use inc\Base\Deactivate;


 function activate_babylone_plugin(){
	 inc\Base\Activate::activate();
 }
 register_activation_hook( __FILE__, 'activate_babylone_plugin' );

 
 function deactivate_babylone_plugin(){
	 inc\Base\Deactivate::deactivate();
 }
 register_deactivation_hook( __FILE__, 'deactivate_babylone_plugin' );

if (class_exists( 'inc\\Init' )){
	inc\Init::register_services();
}

?>
