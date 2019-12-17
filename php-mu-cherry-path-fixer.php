<?php
/*
Plugin Name: Cherry path fixer
Description: https://github.com/wpi-pw/app
Author: Dima Minka, CDK, WPI
Version: 1.0
Author URI: https://dima.mk
*/

/**
 * Cherry path fixer for Jet plugins
 *
 * @param $url
 * @return string|string[]
 */
function cherry_path_fix( $url )
{
    return str_replace( WP_CONTENT_DIR, '/../app', $url );
}

add_filter( 'cherry_core_base_url', 'cherry_path_fix', 1 );
add_filter( 'cx_include_module_url', 'cherry_path_fix', 1 );