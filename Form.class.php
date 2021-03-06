<?php

class Form extends Html_Element {

	protected $_fields;

	/**
	 * Add a field inside the form
	 */
	public function __call($field, $options) {
		$field = sprintf('Form_Field_%s', ucfirst(strtolower($field)));
		if (class_exists($field)) {
			// $reflection = new ReflectionClass($field);
			// $object = $reflection->newInstanceArgs($options);
			$object = new $field($options);
			$this->_fields[] = $object;
			return $object;
		}
	}

	/**
	 * Set or changes one attribute of the form
	 */
	public function __set($attribute, $value) {
		$this->setAttribute($attribute, $value);
	}

	/**
	 * Retrieves the value of an attribute
	 */
	public function __get($attribute) {
		$this->getAttribute($attribute);
	}
}