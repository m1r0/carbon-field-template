<?php

class Carbon_Field_{{FIELD_NAME}} extends Carbon_Field {
	/*
	 * Properties
	 */
	protected $example_property;

	/**
	 * to_json()
	 * 
	 * Returns an array that holds the field data, suitable for JSON representation.
	 * This data will be available in the Underscore template and the Backbone Model.
	 * 
	 * @param bool $load  Should the value be loaded from the database or use the value from the current instance.
	 * @return array
	 */
	function to_json($load) {
		$field_data = parent::to_json($load); // do not delete

		$field_data = array_merge($field_data, array(
			'example_property' => $this->example_property,
		));

		return $field_data;
	}

	/**
	 * template()
	 *
	 * Prints the main Underscore template
	 **/
	function template() {
		?>
		<input id="{{{ id }}}" type="text" name="{{{ name }}}" value="{{ value }}" class="regular-text" />

		<% if (example_property) { %>
			<p>This is an example.</p>
		<% } %>
		<?php
	}

	/**
	 * admin_enqueue_scripts()
	 * 
	 * This method is called in the admin_enqueue_scripts action. It is called once per field type.
	 * Use this method to enqueue CSS + JavaScript files.
	 * 
	 */
	function admin_enqueue_scripts() {
		$dir = plugin_dir_url(__FILE__);

		# Enqueue JS
		crb_enqueue_script('carbon-field-{{FIELD_NAME}}', $dir . 'js/field.js', array('carbon-app', 'carbon-fields'));

		# Enqueue CSS
		crb_enqueue_style('carbon-field-{{FIELD_NAME}}', $dir . 'css/field.css');
	}

	/**
	 * admin_init()
	 * 
	 * Called when the field is initialized. (back-end)
	 * 
	 */
	/*
	function admin_init() {
		// Add another Underscore template
		// $this->add_template($this->get_type() . '-Description', array($this, 'template_description'));

		parent::admin_init(); // do not delete
	}
	*/

	/**
	 * init()
	 * 
	 * Called when the field is initialized. (back-end, front-end)
	 * Useful for hooking up to front-end hooks. 
	 * 
	 */
	/*
	function init() {
		parent::init(); // do not delete
	}
	*/
}
