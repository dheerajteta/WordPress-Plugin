<?php
/**
 * 
 * @package babylone plugin
 */
namespace inc\Base ;

use \inc\Base\BaseController;

 class Settingslinks extends BaseController{

    public function register(){
        add_filter( "plugin_action_links_$this->plugin", array($this,'settings_links'));
    }

    public function settings_links($links){
        $settings_links='<a href="admin.php?page=babylone_plugin">Settings</a>';
        array_push($links, $settings_links);
        return $links;
    }
 }
 ?>