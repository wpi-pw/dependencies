<?php
/*
Plugin Name: Tablet screen to small desktop replacer
Description: https://github.com/wpi-pw/app
Author: Dima Minka, CDK, WPI
Version: 1.0
Author URI: https://dima.mk
*/

/**
 *  Override tablet css to small desktop.
 */
function elsd_styles() {
    wp_register_style( 'elsd-style', false );
    wp_enqueue_style( 'elsd-style' );
    $custom_css = "
            body.elementor-device-tablet #elementor-preview-responsive-wrapper {
                width: 1366px;
                height: 700px;
            }
            .elementor-panel .elementor-panel-footer-sub-menu-item .eicon-device-tablet + .elementor-title,
            .elementor-panel .elementor-panel-footer-sub-menu-item .eicon-device-tablet + .elementor-title + .elementor-description {
                font-size:0;
            }
            .elementor-panel .elementor-panel-footer-sub-menu-item .eicon-device-tablet + .elementor-title:before {
                content: 'Small Desktop';
                font-size: 13px;
            }
            .elementor-panel .elementor-panel-footer-sub-menu-item .eicon-device-tablet + .elementor-title + .elementor-description:before {
                content: 'Preview for 1366px';
                font-size: 11px;
            }";
    wp_add_inline_style( 'elsd-style', $custom_css );
}
add_action( 'elementor/editor/before_enqueue_styles', 'elsd_styles' );

/**
 * Apply desktop version to tablet.
 */
function elsd_script() {
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var viewPortWidth = 1366;
            var winW = window.innerWidth;
            var initialScale = winW/viewPortWidth;
            var metaViewport = document.querySelectorAll('[name="viewport"]')[0];

            if(winW >=768 && winW <= 1366) {
                metaViewport.setAttribute('content', 'width=' + viewPortWidth + ', initial-scale=' + initialScale);
            }
        });
    </script>
    <?php
}
add_action( 'wp_head', 'elsd_script' );