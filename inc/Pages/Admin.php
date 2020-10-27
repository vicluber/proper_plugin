<?php
/**
* @package  Proper Plugin
*/
namespace Inc\Pages;
use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
	public $settings;
	public $callbacks;
	public $pages = array();
	public $subpages = array();
	public function register()
	{
		$this->settings = new SettingsApi();
		
		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubPages();
		
		$this->settings->addPages( $this->pages )->withSubPages( 'Dashboard' )->addSubPages( $this->subpages )->register();
		//add_action('admin_menu', array($this, 'add_admin_pages'));
	}
	public function setPages()
	{
		$this->pages = [
			[
				'page_title' => 'Proper Plugin',
				'menu_title' => 'Proper',
				'capability' => 'manage_options',
				'menu_slug' => 'proper_plugin',
				'callback' => array($this->callbacks, 'adminDashboard'),
				'icon_url' => 'dashicons-share-alt',
				'position' => 110
			]
		];
	}
	public function setSubPages()
	{
		$this->subpages = [
			[
				'parent_slug' => 'proper_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'proper_cpt',
				'callback' => function(){ return require_once($this->plugin_path.'/templates/AdminSubpages/AdminSubpage.php'); },
			]
		];
	}
	/*public function add_admin_pages(){
		add_menu_page('Proper Plugin', 'Proper', 'manage_options', 'proper_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
	}
	public function admin_index(){
		require_once $this->plugin_path.'templates/admin.php';
	}*/
}