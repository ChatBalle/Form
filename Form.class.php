<?php

class Form extends Form_Element {

	protected $_fields;

	/**
	 * Add a field inside the form
	 */
	public function __call($field, $options) {
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