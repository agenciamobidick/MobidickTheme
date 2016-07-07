<?php

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'plugins_list' );

function plugins_list() {
	$plugins = array(
		array(
			'name'         => 'Advanced Custom Fields',
			'slug'         => 'advanced-custom-fields-pro',
			'source'       => 'https://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=b3JkZXJfaWQ9NjE5MDl8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE1LTA4LTE0IDE3OjQ5OjU5',
			'required'     => true,
			'force_activation'   => true,
			'force_deactivation' => true,
		),
		array(
			'name'      => 'Custom Post Type UI',
			'slug'      => 'custom-post-type-ui',
			'force_activation'   => true,
			'force_deactivation' => true,
			'required'  => true,
		),
		array(
			'name'      => 'iThemes Security',
			'slug'      => 'better-wp-security',
			'force_activation'   => true,
			'force_deactivation' => true,
			'required'  => true,
		),
		array(
			'name'      => 'TinyPNG',
			'slug'      => 'tinypng-for-wp',
			'force_activation'   => true,
			'force_deactivation' => true,
			'required'  => true,
		),
		array(
			'name'      => 'BackWPup',
			'slug'      => 'backwpup',
			'force_activation'   => true,
			'force_deactivation' => true,
			'required'  => true,
		),
		array(
			'name'      => 'YoImages',
			'slug'      => 'yoimages',
			'force_activation'   => true,
			'force_deactivation' => true,
			'required'  => true,
		),
		array(
			'name'      => 'WP Sync DB',
			'slug'      => 'wp-sync-db',
			'source'    => 'https://github.com/wp-sync-db/wp-sync-db/archive/master.zip',
			'force_activation'   => true,
			'force_deactivation' => true,
			'required'  => true,
		),
		array(
			'name'      => 'WP Sync DB Media Files',
			'slug'      => 'wp-sync-db-media-files',
			'source'    => 'https://github.com/wp-sync-db/wp-sync-db-media-files/archive/master.zip',
			'force_activation'   => true,
			'force_deactivation' => true,
			'required'  => true,
		),
	);
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}
