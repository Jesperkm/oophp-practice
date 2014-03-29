<?php

class person {
	public $name;

	public function __construct($persons_name) {
		$this->name = $persons_name;

	}

	public function set_name($new_name) {
		$this->name = $new_name;

	}

	public function get_name() {
		return $this->name;
	}

}





?>