<?php

abstract class Form_Validator {

	protected $_options = array();
	protected $_error_message = '';
	static $required_options = array();

	public function __construct(array $options, $error_message) {
	
		$missing_options = array_diff(static::$required_options, array_keys($options));
		if (!empty($missing_options)) {
			throw new Exception(sprintf(%.': the following options are missing: %s',
				get_class($this),
				implode(', ', $missing_options)));
		}
		$this->_options       = $options;
		$this->_error_message = $error_message;
	}
	
	function is_valid($field) {
		return test($field->getAttribute('value'), $this->_options);
	}
	
	abstract static function test($value, $options);
}