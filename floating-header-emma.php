<?php

/**
 * Plugin Name:       Floating Header Emma
 * Description:       Floating Header Emma Widget is created by Zain Hassan.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hz-widgets
*/

if(!defined('ABSPATH')){
    exit;
}


/**
 * Register Floating Header Emma.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_fhe_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/floating-header.php' );

	$widgets_manager->register( new \Elementor_Fhe_Widget() );

}
add_action( 'elementor/widgets/register', 'register_fhe_widget' );


function fhe_register_dependencies_scripts() {

	/* Scripts */
	wp_register_script( 'floating-nav-emma', plugins_url( 'inc/assets/js/floating-nav-emma.js', __FILE__ ));

}
add_action( 'wp_enqueue_scripts', 'fhe_register_dependencies_scripts' );

