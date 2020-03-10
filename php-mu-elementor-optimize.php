<?php
/*
Plugin Name: Elementor Optimize
Description: https://github.com/wpi-pw/app
Author: Dima Minka, CDK, WPI
Version: 1.0
Author URI: https://dima.mk
*/

/**
 * Deregister frontend google fonts.
 *
 * Filters whether to enqueue Google fonts in the frontend.
 *
 * @since 1.0.0
 *
 * @param bool print_google_fonts Whether to enqueue Google fonts. Default is true.
 */
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

/**
 * Deregister styles.
 *
 * Deregister the frontend styles.
 *
 * Fired by `wp_enqueue_scripts` action.
 *
 * @since 1.0.0
 * @access public
 */
function remove_default_stylesheet() {
    if ( class_exists( '\Elementor\Plugin' ) && ! \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
        wp_deregister_style( 'elementor-icons' );
        wp_deregister_style( 'font-awesome' );
    }
}
add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 );

/**
 * Deregister Elementor icons.
 *
 * Elementor icons manager handler class
 *
 * @since 2.4.0
 */
function remove_default_elementor_icons() {
    foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
        wp_deregister_style( 'elementor-icons-fa-' . $style );
    }
}
add_action( 'elementor/frontend/after_register_styles', 'remove_default_elementor_icons', 20 );

/**
 * Deregister Theme Scripts & Styles.
 *
 * @return void
 */
add_filter( 'hello_elementor_enqueue_style', '__return_false' );
add_filter( 'hello_elementor_enqueue_theme_style', '__return_false' );

/**
 * Deregister block scripts and styles that are common to front-end.
 *
 * @since 5.0.0
 */
function remove_default_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'remove_default_wp_block_library_css' );
