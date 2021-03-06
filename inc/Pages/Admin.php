<?php
/**
 * @package babylone Plugin
 * 
 */
namespace inc\Pages;

use \inc\Base\BaseController;

use \inc\Api\SettingsApi;

class Admin extends BaseController
{

	public $settings;

	public $pages = array();

	public $subpages = array();

	public function __construct()
	{

	 $this->settings = new SettingsApi();

	 $this->pages = array(
		 array(
			 'page_title'=>'babylone plugin',
			 'menu_title'=> 'Babylone',
			 'capability'=> 'manage_options',
			 'menu_slug'=> 'babylone_plugin',
			 'callback'=>function() {echo '<h1>Plugin here</h1>';} ,
			 'icon_url'=>'dashicons-store',
			 'position'=>110
		 )
		);

		$this->subpages = array(
			array(
				'parent_slug' => 'babylone_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'babylone_cpt', 
				'callback' => function() { echo '<h1>CPT Manager</h1>'; }
			),
			array(
				'parent_slug' => 'babylone_plugin', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'babylone_taxonomies', 
				'callback' => function() { echo '<h1>Taxonomies Manager</h1>'; }
			),
			array(
				'parent_slug' => 'babylone_plugin', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'babylone_widgets', 
				'callback' => function() { echo '<h1>Widgets Manager</h1>'; }
			));
	}

    public function register()
	 {
        $this->settings->addPages( $this->pages )->withSubPages('Dashboard')->addSubPages($this->subpages)->register();
     }
 } 
