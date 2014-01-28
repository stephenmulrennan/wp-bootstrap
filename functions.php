<?php 

	require_once('php/megamenu-walker.php');
	
	function get_custom_field_value($szKey, $bPrint = false) 
	{
		global $post;
		$szValue = get_post_meta($post->ID, $szKey, true);
		if ( $bPrint == false ) return $szValue; else echo $szValue;
	}
	
	function wpbootstrap_scripts_with_jquery()
	{
		// Register the script like this for a theme:
		wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
		// For either a plugin or a theme, you can then enqueue the script:
		wp_enqueue_script( 'bootstrap-script' );
	}
	
	function add_custom_scripts()
	{
		wp_register_script('custom_scripts', get_template_directory_uri() . '/scripts/callback.js');
		wp_enqueue_script( 'custom_scripts' );
	}
	
	function add_site_scripts()
	{
		wp_register_script('site_scripts', get_template_directory_uri() . '/scripts/custom.js');
		wp_enqueue_script( 'site_scripts' );	
	}
	
	function add_knockout()
	{
		wp_register_script('knockout_script', get_template_directory_uri() . '/scripts/knockout-2.2.1.js');
		wp_register_script('knockout__validation_script', get_template_directory_uri() . '/scripts/knockout.validation.js');
		wp_enqueue_script('knockout_script');
		wp_enqueue_script('knockout__validation_script');
	}
	
	function add_models()
	{
		wp_register_script('callback_model', get_template_directory_uri() .'/scripts/callback_model.js');
		wp_localize_script( 'callback_model', 'callbackProperties', array( 'enquiryUrl' => get_template_directory_uri() . '/php/enquiry.php'));    
		wp_enqueue_script('callback_model');
	}
	
	function add_google_scripts()
	{
		$apiKey = 'AIzaSyD4bSbLeCF6fkHO8I3-IpGWHVzBWQNwkNo';
		$googleUrl = 'https://maps.googleapis.com/maps/api/js?key=' . $apiKey .'&sensor=true';
		
		wp_register_script('google_scripts', $googleUrl);
		wp_enqueue_script( 'google_scripts' );
	}
	
	function add_addthis_script()
	{
		$url = "http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51ec26755356d3ea";
		wp_register_script('addthis_script', $url);
		wp_enqueue_script( 'addthis_script' );
	}
	
	function add_toastr_script()
	{
		wp_register_script('toastr_script', get_template_directory_uri() .'/scripts/toastr.js');
		wp_enqueue_script( 'toastr_script' );	
	}
	
	function add_spin_script()
	{
		wp_register_script('spin_script', get_template_directory_uri() .'/scripts/spin.js');
		wp_enqueue_script( 'spin_script' );	
	}
	
	add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );
	add_action( 'wp_enqueue_scripts', 'add_google_scripts');
	add_action( 'wp_enqueue_scripts', 'add_addthis_script');
	add_action( 'wp_enqueue_scripts', 'add_knockout');
	add_action( 'wp_enqueue_scripts', 'add_models');
	add_action( 'wp_enqueue_scripts', 'add_site_scripts');
	add_action( 'wp_enqueue_scripts', 'add_toastr_script');
	add_action( 'wp_enqueue_scripts', 'add_spin_script');
	add_action( 'wp_enqueue_scripts', 'add_custom_scripts');
	
	require_once('php/custom_options.php');
	
	function do_widgets_init() {

		register_sidebar( array(
			'name' => 'Services Right Sidebar',
			'id' => 'services_right_1',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="rounded">',
			'after_title' => '</h2>',
		) );
	}

	add_action( 'widgets_init', 'do_widgets_init' );
	
	add_action( 'after_setup_theme', 'register_my_menus' );
 
	function register_my_menus() {
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'WP Mega Menu 1.0' ),
		) );
	}
	
	function add_callback_button($items, $args) {
	  		
			$class = "pull-right";
	  		
			$callbackForm =
					'<form class="navbar-form pull-right">'.
					'<button type="button" class="btn">Request a callback</button>'.
					'</form>';
					
	        $homeMenuItem =
	                '<li ' . $class . '>' .
	                $args->before .
	                '<a href="' . home_url( '/' ) . '" title="Home">' .
	                $args->link_before . 'Home' . $args->link_after .
	                '</a>' .
	                $args->after .
	                '</li>';
	  
	        $items = $items . $callbackForm;
	  		
	    return $items;
	}
?>