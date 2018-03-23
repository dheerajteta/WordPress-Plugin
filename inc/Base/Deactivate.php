<?php
/**
 * 
 *@package babylonePLugin
 */
namespace inc\Base ;

class Deactivate{
    
    public static function deactivate(){
        flush_rewrite_rules();

    }
}


?>