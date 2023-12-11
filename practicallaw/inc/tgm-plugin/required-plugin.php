<?php

require_once get_template_directory() . '/inc/tgm-plugin/class-tgm-plugin-activation.php';

if( ! function_exists( 'Practicallaw_register_required_plugins' ) ){

	add_action( 'tgmpa_register', 'Practicallaw_register_required_plugins' );

	function Practicallaw_register_required_plugins() {

		$plugins = array(

			array(
				'name'               => esc_html( 'Redux Framework' ),
				'slug'               => sanitize_title( 'Redux Framework' ),
				'required'           => true,
			),

		);

		$config = array(
			'id'           => 'practicallaw',           // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}
