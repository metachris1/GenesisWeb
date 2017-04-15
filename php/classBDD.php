<?php

/*






*/

class BDD {
	
	public function __construct() {
		
	}
	
	public function connect() {
		
	}
	
	public function getUserData($email, $password) {
		return null;
	}
	
	public function getUserInfo($id) {
		return null;
	}
	
	
}

$currentBDD = null;

function getCurrentBDD() {
	if($currentBDD === null) {
		$currentBDD = new BDD();
		$currentBDD->connect();
	}
	return $currentBDD;
}

?>
