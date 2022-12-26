<?php
/**
 * Plugin Name: Elementor ACR Addon
 * Description: Simple title widgets for Elementor.
 * Version:     1.0.0
 * Author:      ACR
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-acr-addon
 */

function register_title_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/title.php' );
	require_once( __DIR__ . '/widgets/title-with-style.php' );
	require_once( __DIR__ . '/widgets/acr-card.php' );
	require_once( __DIR__ . '/widgets/acr-ribbon.php' );

	$widgets_manager->register( new \Elementor_ACR_Ribbon() );
	$widgets_manager->register( new \Elementor_ACR_Title() );
	$widgets_manager->register( new \Elementor_ACR_Title_With_Style() );
	$widgets_manager->register( new \Elementor_ACR_Card() );

	wp_register_style( 'ribbon-widget-style', plugins_url( '/css/style.css', __FILE__ ) );

}
add_action( 'elementor/widgets/register', 'register_title_widget' );