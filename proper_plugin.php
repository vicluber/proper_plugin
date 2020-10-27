<?php
/**
 * @package Proper Plugin
 * @version 1.0
 */
/*
/**
 * Plugin Name: Proper Plugin
 * Plugin URI: www.victorwillhuber.com
 * Description: Template para empezar el desarrollo de un plugin para wordpress
 * Version: 1.0
 * Author: Victor Willhuber
 * Author URI: www.victorwillhuber.com
 */
defined('ABSPATH') or die('Hey, what are you trying to do? Go follow the white rabbit.');
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
	require_once dirname(__FILE__).'/vendor/autoload.php';
}
/**
 * The code that runs during plugin activation
 */
function activate_proper_plugin(){
	Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_proper_plugin');
/**
 * The code that runs during plugin deactivation
 */
function deactivate_proper_plugin(){
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_proper_plugin' );

if(class_exists('Inc\\Init')) {
	Inc\Init::register_services();
}

