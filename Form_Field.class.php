<?php

class Form_Field extends Form_Element {

	protected $_validators;

	/**
	 * Add a validator for the field
	 */
	public function __call($validator, $options) {
		$validator = sprintf('Form_Validator_%s', ucfirst($validator));
		if (class_exists($validator)) {
			// $reflection = new ReflectionClass($validator);
			// $object = $reflection->newInstanceArgs($options);
			$object = new $validator($options);
			$this->$_validators[] = $object;
		}
		return $this;
	}

	/**
	 * Set or changes one attribute of the field
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