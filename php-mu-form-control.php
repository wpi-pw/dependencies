<?php
/*
Plugin Name: Validate Form At Spam Hidden Field
Description: https://github.com/wpi-pw/app
Author: Dima Minka, CDK, WPI
Version: 1.0
Author URI: https://dima.mk
*/
add_action( 'elementor_pro/forms/validation', function ( $record, $ajax_handler ) {

	$fields = $record->get_field( [
		'id' => 'check_message',
	] );

	if ( empty( $fields ) ) {
		return;
	}

	$field = current( $fields );

	if ( ! empty( $field['value'] ) ) {
		$ajax_handler->add_error( $field['id'], 'Invalid Send' );
	}
}, 10, 2 );

add_action( 'wp_print_scripts', function () {
	?>
    <style>
        .elementor-field-group-check-message,
        .elementor-field-group-check_message,
        .check_message,
        .check-message {
            display: none !important;
        }
    </style>
	<?php
} );
