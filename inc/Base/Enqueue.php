<?php
/**
*
*/
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
	public function register(){
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}
	public function enqueue(){
		wp_enqueue_style('bootstrap-css', $this->plugin_url.'assets/bootstrap.min.css');
		wp_enqueue_script('bootstrap-js', $this->plugin_url.'assets/bootstrap.min.js');
	}

}