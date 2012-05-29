<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'kickstart-theme', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load scripts and styles
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery'); //jQuery
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
				wp_enqueue_script('jquery');
				
				wp_deregister_script('prettify'); //prettify
				wp_register_script('prettify', (get_bloginfo('template_directory')."/_/js/prettify.js"), false);
				wp_enqueue_script('prettify');
				
				wp_deregister_script('kickstart'); //kickstart
				wp_register_script('kickstart', (get_bloginfo('template_directory')."/_/js/kickstart.js"), false);
				wp_enqueue_script('kickstart');
				
				wp_register_style('kickstart-css', (get_bloginfo('template_directory')."/_/css/kickstart.css"), false);
				wp_enqueue_style('kickstart-css'); //base style kickstart
				
				wp_register_style('style-css', (get_bloginfo('template_directory')."/style.css"), false);
				wp_enqueue_style('style-css'); //base style 
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','kickstart-theme' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','kickstart-theme' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.
    
    // This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'kickstart-theme' ) );
	
	include_once( TEMPLATEPATH."/_/inc/shortcodes.php");

?>