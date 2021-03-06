<?php

// What's the best name? Form_Element or Form_Base ? Tell me!

abstract class Html_Element {

	protected $_attributes = array();

	# (get|set|remove)Attribute
	# Manipulates 1 attribute
	
	public function getAttribute($attribute) {
		return $this->_attributes[$attribute];
	}

	public function setAttribute($attribute, $value) {
		$this->_attributes[$attribute] = $value;
		return $this;
	}
	public function removeAttribute($attribute) {
		unset($this->_attributes[$attribute]);
		return $this;
	}

	# (get|set|remove)Attributes
	# Manipulates 1 or many attributes using an array
	
	public function getAttributes(array $attributes) {
		$attributes = array();
		foreach($attributes as $attribute) {
			$attributes[$attribute] = $this->getAttribute($attribute);
		}
		return $attributes;
	}

	public function setAttributes(array $attributes) {
		foreach($attributes as $attribute => $value) {
			$this->setAttribute($attribute, $value);
		}
		return $this;
	}
	public function removeAttributes(array $attributes) {
		foreach($attributes as $attribute) {
			$this->removeAttribute($attribute);
		}
		return $this;
	}

	# (has|add|remove)Class
	# Manipulates the "class" attribute
	
	public function hasClass($className) {
		return false !== strpos(" $className ", ' '.$this->getAttribute('class').' ');
	}
	public function addClass($className) {
		if (!$this->hasClass($className)) {
			$this->setAttribute('class', trim($this->getAttribute('class')." $className"));
		}
		return $this;
	}
	public function removeClass($className) {
		$this->setAttribute('class', preg_replace('`(^|\s)'.preg_quote($className).'(?:\s|$)`', '$1', $this->getAttribute('class')));
		return $this;
	}
	/*
	public function toggleClass($className) {
		$this->hasClass($className) ? $this->removeClass($className) : $this->addClass($className);
		return $this;
	} // */
	
	static public function renderAttributes(array $attributes) {
		$str = '';
		foreach($attributes as $attr => $value) {
			$str .= sprintf(' %s="%s"', attr, htmlspecialchars($value));
		}
		return $str;
	}
}

