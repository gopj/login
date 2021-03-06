<?php
 /* ===========================

  FlavorPHP - because php should have a better taste
  homepage: http://www.flavorphp.com/
  git repository: https://github.com/Axloters/FlavorPHP

  FlavorPHP is a free software licensed under the MIT license
  Copyright (C) 2008 by Pedro Santana <contacto at pedrosantana dot mx>
  
  Team:
  	Pedro Santana
	Victor Bracco
	Victor de la Rocha
	Jorge Condom�
	Aaron Munguia

  =========================== */
?>
<?php

class registry extends singleton implements ArrayAccess {

	private $vars = array();

	public function __construct() { }
	
	public static function getInstance($class = NULL) {
		return parent::getInstance(get_class());
	}
	
	public function __set($key, $value){
		if (isset($this->vars[$key]) == true) {
                        if ($key == "datos") {
                            unset($this->vars[$key]);
                        } else {
                            throw new Exception("Unable to set var '".$key."'. Already set aaaa.");
                        }
		}

		$this->vars[$key] = $value;
		return true;
	}
	
	public function modify($key, $value){
		if (isset($this->vars[$key]) == false) {
			throw new Exception("The var '".$key."' does not exist.");
		}
		$this->vars[$key] = $value;
		return true;
	}
	
	public function __get($key){
		if (isset($this->vars[$key]) == false) {
			return null;
		}

		return $this->vars[$key];
	}

	public function remove($var) {
		unset($this->vars[$key]);
	}

	public function offsetExists($offset) {
		return isset($this->vars[$offset]);
	}

	public function offsetGet($offset) {
		if (isset($this->vars[$offset]) == false) {
			return null;
		}

		return $this->vars[$offset];
	}

	public function offsetSet($offset, $value) {
		if (isset($this->vars[$offset]) == true) {
			throw new Exception("Unable to set var '".$offset."'. Already set.");
		}

		$this->vars[$offset] = $value;
		return true;
	}

	public function offsetUnset($offset) {
		unset($this->vars[$offset]);
	}
	
}
?>