<?php
/*
Plugin Name: Woocommerce Tweaks
Description: https://github.com/wpi-pw/app
Author: Dima Minka, CDK, WPI
Version: 1.0
Author URI: https://dima.mk
*/

/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
