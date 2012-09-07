<?php
class WP_Meetup_Options extends WP_Meetup_Model {

	private $option_key = 'wp_meetup_options';
	private $default_value = array(
		'api_key' => null,
		'publish_buffer' => '2 weeks',
		'show_plug' => false,
		'show_plug_probability' => 0.1,
		'include_home_page' => true,
		'display_event_info' => true,
		'use_rsvp_button' => false,
		'button_script_url' => false
	);

	function __construct() {
		parent::__construct();
    }

	function get( $option_key ) {
		$options = get_option( $this->option_key, $this->default_value );
		if ( array_key_exists( $option_key, $options ) ) {
			return $options[$option_key];
		} else {
			return $this->default_value[$option_key];
		}
	}

	function set( $key, $value ) {
		$options = get_option( $this->option_key, $this->default_value );
		$options[$key] = $value;
		update_option( $this->option_key, $options );
	}

	function delete_all() {
		delete_option( $this->option_key );
	}

}
