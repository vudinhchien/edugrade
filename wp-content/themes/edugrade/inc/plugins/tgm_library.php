<?php

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';

 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
	if(!class_exists('TGM_Plugin_Activation')){
		require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
	}


add_action( 'tgmpa_register', 'gramotech_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function gramotech_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'     				=> esc_attr__('GramoTech Core','edugrade'),
			'slug'               => 'gramotech-core', // The plugin slug (typically the folder name).
			'source'             => 'http://gramotech.com/wp/edugrade/plugins/gramotech-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'     				=> esc_attr__('Revolution Slider','edugrade'),
			'slug'               => 'revslider', // The plugin slug (typically the folder name).
			'source'             => 'http://gramotech.com/wp/edugrade/plugins/revslider.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'     			=> esc_attr__('Learnpress','edugrade'),
			'slug'        => 'learnpress',
			'required'    => true, 
			'is_callable' => '',
		),
		array(
			'name'     			=> esc_attr__('Events Manager','edugrade'),
			'slug'        => 'events-manager',
			'required'    => true, 
			'is_callable' => '',
		),
		array(
			'name'     			=> esc_attr__('Unyson','edugrade'),
			'slug'        => 'unyson',
			'required'    => true, 
			'is_callable' => '',
		),
		array(
			'name' => esc_attr__('Contact Form 7','edugrade'), 
			'slug' => 'contact-form-7', 
			'required' => false
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
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

		
		'strings'      => array(
			'page_title'                      => esc_attr__( 'Install Required Plugins', 'edugrade' ),
			'menu_title'                      => esc_attr__( 'Install Plugins', 'edugrade' ),
			/* translators: %s: plugin name. */
			'installing'                      => esc_attr__( 'Installing Plugin: %s', 'edugrade' ),
			/* translators: %s: plugin name. */
			'updating'                        => esc_attr__( 'Updating Plugin: %s', 'edugrade' ),
			'oops'                            => esc_attr__( 'Something went wrong with the plugin API.', 'edugrade' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'edugrade'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'edugrade'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'edugrade'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). */
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'edugrade'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'edugrade'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'edugrade'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'edugrade'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'edugrade'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'edugrade'
			),
			'return'                          => esc_attr__( 'Return to Required Plugins Installer', 'edugrade' ),
			'plugin_activated'                => esc_attr__( 'Plugin activated successfully.', 'edugrade' ),
			'activated_successfully'          => esc_attr__( 'The following plugin was activated successfully:', 'edugrade' ),
			/* translators: 1: plugin name. */
			'plugin_already_active'           => esc_attr__( 'No action taken. Plugin %1$s was already active.', 'edugrade' ),
			/* translators: 1: plugin name. */
			'plugin_needs_higher_version'     => esc_attr__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'edugrade' ),
			/* translators: 1: dashboard link. */
			'complete'                        => esc_attr__( 'All plugins installed and activated successfully. %1$s', 'edugrade' ),
			'dismiss'                         => esc_attr__( 'Dismiss this notice', 'edugrade' ),
			'notice_cannot_install_activate'  => esc_attr__( 'There are one or more required or recommended plugins to install, update or activate.', 'edugrade' ),
			'contact_admin'                   => esc_attr__( 'Please contact the administrator of this site for help.', 'edugrade' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);

	tgmpa( $plugins, $config );
}