<?php
/**
 * @package babylone Plugin
 * 
 */
namespace inc\Base ;

use \inc\Base\BaseController;

class Enqueue extends BaseController{

    public function register(){
        add_action( 'admin_enqueue_scripts', array($this,'enqueue'));
    }

    function enqueue(){
        //enqueue all scripts
        wp_enqueue_style( 'mypluginstyle', $this->plugin_url.'assets/style.css');
        wp_enqueue_script( 'mypluignscript', $this->plugin_url.'assets/scripts.js');
    }
}