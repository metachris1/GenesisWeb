<?php

/*

TABLE user (
	userId (int),
	userEmail (str),
	userPassword(str),
	userName(str),
	userAvatar(str),
	userIsPremium(bool),
	userPremiumSince(date),
	userMemberSince(date)
)




*/

class User implements \Serializable {
	public $userIsConnected = false;
	
	public $userEmail = "";
	public $userPassword = "";
	
	public $userId = 0;
	public $userName = "";
	public $userAvatar = "";
	public $userIsPremium = false;
	public $userPremiumSince = 0;
	public $userMemberSince = 0;
	
	public function __construct() {
		
	}
	
	public function serialize() {
		return serialize([
		$this->userEmail,
		$this->userPassword,
		$this->userId,
		$this->userName,
		$this->userAvatar,
		$this->userIsPremium,
		$this->userPremiumSince,
		$this->userMemberSince]);
	}
	
	public function unserialize($data) {
		list(
		$this->userEmail,
		$this->userPassword,
		$this->userId,
		$this->userName,
		$this->userAvatar,
		$this->userIsPremium,
		$this->userPremiumSince,
		$this->userMemberSince) = unserialize($data);
	}
	
	public function connect($email, $password) {
		$this->userEmail = $email;
		$this->userPassword = $password;
		
		$bdd = getCurrentBDD();
		if($bdd === null)
			throw new Exception("Impossible to reach database. Please retry later.");
		
		$data = $bdd->getUserData($this->userEmail, $this->userPassword);
		if($data === null)
			return false;
		
		$this->userIsConnected = true;
		$this->userId = $data[0];
		$this->userName = $data[1];
		$this->userAvatar = $data[2];
		$this->userIsPremium = $data[3];
		$this->userPremiumSince = $data[4];
		$this->userMemberSince = $data[5];
		return true;
	}
	
	public function getInfo($id) {
		$this->userId = $id;
		$bdd = getCurrentBDD();
		if($bdd === null)
			throw new Exception("Impossible to reach database. Please retry later.");
		$data = $bdd->getUserInfo($this->id);
		if($data === null)
			return false;
		
		$this->userEmail = $data[0];
		$this->userId = $data[1];
		$this->userName = $data[2];
		$this->userAvatar = $data[3];
		$this->userIsPremium = $data[4];
		$this->userPremiumSince = $data[5];
		return true;
	}
	
	public function update($email, $password, $name, $avatar) {
		$this->userEmail = $email;
		$this->userPassword = $password;
		$this->userName = $name;
		$this->userAvatar = $avatar;
	}
	
	public function disconnect () {
		$_SESSION["currentUser"] = null;
	}
	
	public function isConnected() {
		return $this->userIsConnected;
	}
	
}



function getCurrentUser() {
	if($_SESSION["currentUser"] === null) {
		$_SESSION["currentUser"] = new User();
	}
	return $_SESSION["currentUser"];
}

?>