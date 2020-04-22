<?php
/*
Plugin Name: Override Hello Elementor theme
Description: https://github.com/wpi-pw/app
Author: Dima Minka, CDK, WPI
Version: 1.0
Author URI: https://dima.mk
*/

// Unload default theme styles
add_filter( 'hello_elementor_enqueue_style', '__return_false', 1 );
add_filter( 'hello_elementor_enqueue_theme_style', '__return_false', 1 );
