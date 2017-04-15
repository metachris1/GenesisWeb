<?php

/*






*/

class BDD {
	
	public $bddPDO = null;
	public $bddAddr = "";
	public $bddUser = "";
	public $bddPassword = "";
	public $bddIsConnected = false;
	
	public function __construct() {
		$bddAddr = "mysql:host=localhost;dbname=GenesisWeb";
		$bddUser = "root";
		$bddPassword = "";
	}
	
	public function connect() {
		try {
			$bddPDO = new PDO($bddAddr, $bddUser, $bddPassword);
			$bddIsConnected = true;
		} catch (PDOException $e) {
			// go to error page
		}
	}
	
	public function createUser($email, $password, $name) {
		$request = $this->bddPDO->prepare("INSERT INTO user"
			." (userEmail, userPassword, userName)"
			." VALUES(:email, :password, :name);");
		$request->execute(array(
			":id" => $id,
			":email" => $email,
			":password" => $password,
			":name" => $name,
			":avatar" => $avatar));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function getUserData($email, $password) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM user"
			." WHERE userEmail = :email"
			." AND userPassword = :password;");
		$request->execute(array(":email" => $email, ":password" => $password));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function getUserInfo($id) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM user"
			." WHERE userId = :id;");
		$request->execute(array(":id" => $id));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function updateUserInfo($id, $email, $password, $name, $avatar) {
		$request = $this->bddPDO->prepare("UPDATE user"
			." SET userEmail = :email,"
				." userPassword = :password,"
				." userName = :name,"
				." userAvatar = :avatar"
			." WHERE userId = :id;");
		$request->execute(array(
			":id" => $id,
			":email" => $email,
			":password" => $password,
			":name" => $name,
			":avatar" => $avatar));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
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
