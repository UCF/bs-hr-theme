<?php
/**
 * Handles plugin configuration
 */

if ( !class_exists( 'UCF_RSS_Option' ) ) {

	class UCF_RSS_Option {
		public
			$option_name,
			$default         = null,  // default value for the option
			$format_callback = 'sanitize_text_field',  // function that formats the option value
			$options_page    = false,  // whether the option should be configurable via the plugin options page
			$sc_attr         = true,  // whether the option should be a valid shortcode attribute
			$field_title     = null,
			$field_desc      = null,
			$field_type      = null,
			$field_options   = null,
			$field_options_section = null;

		function __construct( $option_name, $args=array() ) {
			$this->option_name     = $option_name;
			$this->default         = isset( $args['default'] ) ? $args['default'] : $this->default;
			$this->format_callback = isset( $args['format_callback'] ) ? $args['format_callback'] : $this->format_callback;
			$this->options_page    = isset( $args['options_page'] ) ? $args['options_page'] : $this->options_page;
			$this->sc_attr         = isset( $args['sc_attr'] ) ? $args['sc_attr'] : $this->sc_attr;
			$this->field_title     = isset( $args['field_title'] ) ? $args['field_title'] : $this->field_title;
			$this->field_desc      = isset( $args['field_desc'] ) ? $args['field_desc'] : $this->field_desc;
			$this->field_type      = isset( $args['field_type'] ) ? $args['field_type'] : $this->field_type;
			$this->field_options   = isset( $args['field_options'] ) ? $args['field_options'] : $this->field_options;
			$this->field_options_section = isset( $args['field_options_section'] ) ? $args['field_options_section'] : $this->field_options_section;
		}

		/**
		 * Returns the default value for the option, with the Options API value
		 * applied if $apply_configurable_val and $this->options_page are true.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $apply_configurable_val boolean | whether to apply the option's value set on the plugin settings page to the returned value
		 * @return Mixed | the option's default value
		 **/
		function get_default( $apply_configurable_val=true ) {
			$default = $this->default;
			if ( $this->options_page && $apply_configurable_val ) {
				$default = get_option( UCF_RSS_Config::$option_prefix . $this->option_name, $default );
			}
			return $default;
		}

		/**
		 * Returns the formatted value, using the function name passed to
		 * $this->format_callback.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $value Mixed | option value to apply formatting to
		 * @return Mixed | option value with formatting applied
		 **/
		function format( $value ) {
			return call_user_func( $this->format_callback, $value );
		}
	}

}

if ( !class_exists( 'UCF_RSS_Config' ) ) {

	class UCF_RSS_Config {
		public static
			$option_prefix = 'ucf_rss_';


		/**
		 * Returns the plugin's registered layouts.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return array | list of layouts
		 **/
		public static function get_layouts() {
			$layouts = array(
				'default' => 'Default Layout',
				'thumbnail' => 'Thumbnail Layout'
			);

			$layouts = apply_filters( self::$option_prefix . 'get_layouts', $layouts );

			return $layouts;
		}

		/**
		 * Returns a full list of plugin option objects.  Adds additional
		 * options on-the-fly based on registered post types and taxonomies.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return array | array of UCF_RSS_Option objects
		 **/
		public static function get_options() {
			$options = array(
				'layout'              => new UCF_RSS_Option( 'layout', array(
					'default'         => 'default',
					'field_title'     => 'Layout',
					'field_desc'      => 'Layout to use for this RSS feed.',
					'field_type'      => 'select',
					'field_options'   => self::get_layouts()
				) ),
				'list_title'          => new UCF_RSS_Option( 'list_title', array(
					'field_title'     => 'List Title',
					'field_desc'      => 'Title to display above the RSS feed. Leave blank to omit.',
					'field_type'      => 'text'
				) ),
				'include_css'         => new UCF_RSS_Option( 'include_css', array(
					'default'         => true,
					'format_callback' => array( 'UCF_RSS_Config', 'format_option_bool' ),
					'options_page'    => true,
					'sc_attr'         => false,
					'field_title'     => 'Include Default CSS',
					'field_desc'      => 'Include the default css stylesheet for feeds within the theme.<br>Leave this checkbox checked unless your theme provides custom styles for feeds.',
					'field_type'      => 'checkbox',
					'field_options_section' => 'ucf_rss_section_general'
				) ),
				'fallback_image'      => new UCF_RSS_Option( 'fallback_image' , array(
					'default'         => null,
					'format_callback' => array( 'UCF_RSS_Config', 'format_option_int_or_null' ),
					'options_page'    => true,
					'sc_attr'         => false,
					'field_title'     => 'Fallback Image',
					'field_desc'      => '(Optional) Image to display when a feed item doesn\'t have an image. Only used on layouts that can display feed item images.',
					'field_type'      => 'image',
					'field_options_section' => 'ucf_rss_section_general'
				) ),
				'url'                 => new UCF_RSS_Option( 'url', array(
					'field_title'     => 'Feed URL',
					'field_desc'      => 'URL that points to a valid RSS feed.',
					'field_type'      => 'text'
				) ),
				'offset'              => new UCF_RSS_Option( 'offset', array(
					'default'         => 0,
					'format_callback' => array( 'UCF_RSS_Config', 'format_option_offset' ),
					'field_title'     => 'Offset',
					'field_desc'      => 'Number of feed items that should be skipped. Leave blank or set to 0 to start from the first item in the feed.',
					'field_type'      => 'number'
				) ),
				'limit'               => new UCF_RSS_Option( 'limit', array(
					'default'         => 4,
					'format_callback' => array( 'UCF_RSS_Config', 'format_option_limit' ),
					'field_title'     => 'Limit',
					'field_desc'      => 'The maximum number of feed items to return. Note that, for performance reasons, no more than 50 results can be returned at a time.',
					'field_type'      => 'number'
				) ),
				'cache_expiration'    => new UCF_RSS_Option( 'cache_expiration', array(
					'default'         => 3,  // hours
					'format_callback' => 'intval',
					'options_page'    => true,
					'sc_attr'         => false,
					'field_title'     => 'Cache Expiration',
					'field_desc'      => 'Length of time, in hours, that feed data should be cached before fresh results are fetched.',
					'field_type'      => 'number'
				) ),
			);

			return $options;
		}

		/**
		 * Returns an option object or false if it doesn't exist.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $option_name string | name of the object to return
		 * @return Mixed | UCF_RSS_Option object, or False on failure
		 **/
		public static function get_option( $option_name ) {
			$options = self::get_options();
			return isset( $options[$option_name] ) ? $options[$option_name] : false;
		}

		/**
		 * Returns whether or not an option is configurable on the plugin
		 * options page.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $option_obj object | UCF_RSS_Option object
		 * @return boolean
		 **/
		public static function option_is_configurable( $option_obj ) {
			return $option_obj->options_page;
		}

		/**
		 * Returns whether or not an option is a valid shortcode attribute.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $option_obj object | UCF_RSS_Option object
		 * @return boolean
		 **/
		public static function option_is_sc_attr( $option_obj ) {
			return $option_obj->sc_attr;
		}

		/**
		 * Creates options via the WP Options API that are utilized by the
		 * plugin.  Intended to be run on plugin activation.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return void
		 **/
		public static function add_configurable_options() {
			$options = array_filter( self::get_options(), array( 'UCF_RSS_Config', 'option_is_configurable' ) );
			if ( $options ) {
				foreach ( $options as $option ) {
					add_option( self::$option_prefix . $option->option_name, $option->default );
				}
			}
		}

		/**
		 * Deletes options via the WP Options API that are utilized by the
		 * plugin.  Intended to be run on plugin uninstallation.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return void
		 **/
		public static function delete_configurable_options() {
			$options = array_filter( self::get_options(), array( 'UCF_RSS_Config', 'option_is_configurable' ) );
			if ( $options ) {
				foreach ( $options as $option ) {
					delete_option( self::$option_prefix . $option->option_name );
				}
			}
		}

		/**
		 * Returns an array of option name+default key+value pairs for all
		 * valid shortcode attributes.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return array | array of valid shortcode attributes
		 **/
		public static function get_shortcode_atts() {
			$options = array_filter( self::get_options(), array( 'UCF_RSS_Config', 'option_is_sc_attr' ) );
			$sc_atts = array();
			if ( $options ) {
				foreach ( $options as $option_name => $option ) {
					$sc_atts[$option_name] = $option->get_default();
				}
			}
			return $sc_atts;
		}

		/**
		 * Formats $val as a boolean value.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return boolean | formatted boolean value
		 **/
		public static function format_option_bool( $val ) {
			return filter_var( $val, FILTER_VALIDATE_BOOLEAN );
		}

		/**
		 * Formats $val as a boolean value.  Allows null values.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return Mixed | formatted boolean value or null
		 **/
		public static function format_option_bool_or_null( $val ) {
			return is_null( $val ) ? $val : filter_var( $val, FILTER_VALIDATE_BOOLEAN );
		}

		/**
		 * Formats $val as an integer.  Allows null values.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return Mixed | formatted integer value or null
		 **/
		public static function format_option_int_or_null( $val ) {
			return is_null( $val ) ? $val : intval( $val );
		}

		/**
		 * Formats $val as an integer.  Allows null values.
		 *
		 * @author RJ Bruneel
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return int | formatted integer value or 0
		 **/
		public static function format_option_int( $val ) {
			return is_null( $val ) ? 0 : intval( $val );
		}

		/**
		 * Formats $val as an array of integers.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return array | array of integers
		 **/
		public static function format_option_int_array( $val ) {
			if ( is_string( $val ) ) {
				return array_map( 'intval', array_filter( explode( ',', $val ), 'is_numeric' ) );
			}
			else if ( is_array( $val ) ) {
				return array_map( 'intval', $val );
			}
			else {
				return array();
			}
		}

		/**
		 * Formats $val as an array of strings.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return array | array of strings
		 **/
		public static function format_option_str_array( $val ) {
			if ( is_string( $val ) ) {
				return array_map( 'sanitize_text_field', explode( ',', $val ) );
			}
			else if ( is_array( $val ) ) {
				return array_map( 'sanitize_text_field', $val );
			}
			else {
				return array();
			}
		}

		/**
		 * Formats $val as a string or array of strings.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return Mixed | array of strings, or string
		 **/
		public static function format_option_str_or_array( $val ) {
			if ( !is_array( $val ) ) {
				if ( strpos( $val, ',' ) !== false ) {
					return array_map( 'sanitize_text_field', explode( ',', $val ) );
				}
				else {
					return sanitize_text_field( $val );
				}
			}
			else {
				return array_map( 'sanitize_text_field', $val );
			}
		}

		/**
		 * Formats $val as a number.  Allows null values.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return Mixed | formatted number value or null
		 **/
		public static function format_option_num_or_null( $val ) {
			return is_null( $val ) ? $val : $val + 0;
		}

		/**
		 * Custom formatting callback for the 'limit' option. Forces a sane
		 * range of possible values.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return int | formatted number value
		 **/
		public static function format_option_limit( $val ) {
			$option = get_option( 'limit' );
			$val = intval( $val );
			return ( $val > 0 && $val <= 50 ) ? $val : $option->get_default();
		}

		/**
		 * Custom formatting callback for the 'offset' option. Forces a sane
		 * range of possible values (non-negative).
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $val Mixed | value to apply formatting to
		 * @return int | formatted number value
		 **/
		public static function format_option_offset( $val ) {
			$option = self::get_option( 'offset' );
			$val = intval( $val );
			return ( $val > 0 ) ? $val : $option->get_default();
		}

		/**
		 * Applies formatting to a single configurable option. Intended to be
		 * passed to the 'option_{$option}' hook.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $value Mixed | value of the option
		 * @param $option_name string | option name
		 * @return Mixed | formatted option value, or False on failure
		 **/
		public static function format_configurable_option( $value, $option_name ) {
			$option = self::get_option( $option_name );
			if ( $option ) {
				return $option->format( $value );
			}
			return false;
		}

		/**
		 * Applies formatting to an array of shortcode attributes. Intended to
		 * be passed to the 'shortcode_atts_rss-feed' hook.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $out array | The output array of shortcode attributes
		 * @param $pairs array | The supported attributes and their defaults
		 * @param $atts array | The user defined shortcode attributes
		 * @param $shortcode string | The shortcode name
		 * @return array | The filtered output array of shortcode attributes
		 **/
		public static function format_sc_atts( $out, $pairs, $atts, $shortcode ) {
			foreach ( $out as $key=>$val ) {
				if ( $option = self::get_option( $key ) ) {
					$out[$key] = $option->format( $val );
				}
			}
			return $out;
		}

		/**
		 * Adds filters for shortcode and plugin options that apply our
		 * formatting rules to attribute/option values.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return void
		 **/
		public static function add_option_formatting_filters() {
			// Options
			$options = self::get_options();
			foreach ( $options as $option_name => $option ) {
				add_filter( 'option_{$option_name}', array( 'UCF_RSS_Config', 'format_configurable_option' ), 10, 2 );
			}
			// Shortcode atts
			add_filter( 'shortcode_atts_rss-feed', array( 'UCF_RSS_Config', 'format_sc_atts' ), 10, 4 );
		}

		/**
		 * Convenience method for returning an option from the WP Options API
		 * or a plugin option default.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $option_name string | option name
		 * @return mixed | the option value
		 **/
		public static function get_option_or_default( $option_name ) {
			// Handle $option_name passed in with or without self::$option_prefix applied:
			$option_name_no_prefix = str_replace( self::$option_prefix, '', $option_name );
			$option_name           = self::$option_prefix . $option_name_no_prefix;
			$option                = self::get_option( $option_name_no_prefix );

			if ( $option ) {
				return get_option( $option_name, $option->get_default() );
			}
			else {
				return get_option( $option_name );
			}
		}

		/**
		 * Initializes setting registration with the Settings API.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return void
		 **/
		public static function settings_init() {

			// Register setting sections
			add_settings_section(
				'ucf_rss_section_general', // option section slug
				'General Settings', // formatted title
				'', // callback that echoes any content at the top of the section
				'ucf_rss' // settings page slug
			);

			$options = array_filter( self::get_options(), array( 'UCF_RSS_Config', 'option_is_configurable' ) );

			if ( $options ) {
				foreach ( $options as $option ) {
					// Register setting
					register_setting( 'ucf_rss', self::$option_prefix . $option->option_name );

					// Add individual setting field
					if ( $option->field_title && $option->field_options_section ) {
						add_settings_field(
							self::$option_prefix . $option->option_name,
							$option->field_title,  // formatted field title
							array( 'UCF_RSS_Config', 'display_settings_field' ),  // display callback
							'ucf_rss',  // settings page slug
							$option->field_options_section,  // option section slug
							array(  // extra arguments to pass to the callback function
								'label_for'   => self::$option_prefix . $option->option_name,
								'description' => $option->field_desc ?: '',
								'type'        => $option->field_type ?: 'text'
							)
						);
					}
				}
			}
		}

		/**
		 * Displays an individual setting's field markup.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $args array | array of field display arguments
		 * @return string | field input HTML
		 **/
		public static function display_settings_field( $args ) {
			$option_name   = $args['label_for'];
			$description   = $args['description'];
			$field_type    = $args['type'];
			$current_value = self::get_option_or_default( $option_name );
			$markup        = '';

			switch ( $field_type ) {
				case 'checkbox':
					ob_start();
					?>
					<input type="checkbox" id="<?php echo $option_name; ?>" name="<?php echo $option_name; ?>" <?php echo ( $current_value == true ) ? 'checked' : ''; ?>>
					<p class="description">
						<?php echo $description; ?>
					</p>
					<?php
					$markup = ob_get_clean();
					break;

				case 'image':
					ob_start();
					?>
					<img class="<?php echo $option_name; ?>_preview" src="<?php echo wp_get_attachment_url( $current_value ); ?>" height="100" width="100">
					<input class="<?php echo $option_name; ?>" type="hidden" id="<?php echo $option_name; ?>" name="<?php echo $option_name; ?>" value="<?php echo $current_value; ?>">
					<a href="#" class="<?php echo $option_name; ?>_upload button">Upload</a>
					<?php
					$markup = ob_get_clean();
					break;

				case 'number':
					ob_start();
					?>
					<input type="number" id="<?php echo $option_name; ?>" name="<?php echo $option_name; ?>" value="<?php echo $current_value; ?>">
					<p class="description">
						<?php echo $description; ?>
					</p>
					<?php
					$markup = ob_get_clean();
					break;

				case 'text':
				default:
					ob_start();
					?>
					<input type="text" id="<?php echo $option_name; ?>" name="<?php echo $option_name; ?>" value="<?php echo $current_value; ?>">
					<p class="description">
						<?php echo $description; ?>
					</p>
					<?php
					$markup = ob_get_clean();
					break;
			}
			?>

			<?php
			echo $markup;
		}


		/**
		 * Registers the settings page to display in the WordPress admin.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return string | The resulting page's hook_suffix
		 **/
		public static function add_options_page() {
			$page_title = 'UCF RSS Feed Settings';
			$menu_title = 'UCF RSS Feeds';
			$capability = 'manage_options';
			$menu_slug  = 'ucf_rss';
			$callback   = array( 'UCF_RSS_Config', 'options_page_html' );

			return add_options_page(
				$page_title,
				$menu_title,
				$capability,
				$menu_slug,
				$callback
			);
		}


		/**
		 * Displays the plugin's settings page form.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return string | options page form HTML
		 **/
		public static function options_page_html() {
			ob_start();
			?>

			<div class="wrap">
				<h1><?php echo get_admin_page_title(); ?></h1>
				<form method="post" action="options.php">
					<?php
					settings_fields( 'ucf_rss' );
					do_settings_sections( 'ucf_rss' );
					submit_button();
					?>
				</form>
			</div>

			<?php
			echo ob_get_clean();
		}


		/**
		 * Returns an array of field data for the WP-Shortcode-Interface
		 * plugin.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return array | array of WP SCIF field data
		 **/
		public static function get_wp_scif_fields() {
			$options = array_filter( self::get_options(), array( 'UCF_RSS_Config', 'option_is_sc_attr' ) );
			$fields = array();

			if ( $options ) {
				foreach ( $options as $option ) {
					$fields[] = array(
						'param'   => $option->option_name,
						'name'    => $option->field_title,
						'desc'    => $option->field_desc,
						'type'    => $option->field_type,
						'options' => $option->field_options
					);
				}
			}

			return $fields;
		}

	}

	// Register settings and options.
	add_action( 'admin_init', array( 'UCF_RSS_Config', 'settings_init' ) );
	add_action( 'admin_menu', array( 'UCF_RSS_Config', 'add_options_page' ) );

	// Apply custom formatting to shortcode attributes and options.
	UCF_RSS_Config::add_option_formatting_filters();
}
