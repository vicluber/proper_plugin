<?php
/**
*
*/
namespace Inc\Base;

class Book
{
	public function register(){
		add_action( 'init', array($this, 'create_posttype') );
	}
	public function create_posttype(){
		register_post_type( 'book',
	        array(
	            'labels' => array(
	                'name' => __( 'Books' ),
	                'singular_name' => __( 'Book' )
	            ),
	            'public' => true,
	            'has_archive' => false,
	            'rewrite' => array('slug' => 'books'),
	            'show_in_rest' => true,
	        )
	    );
	}

}