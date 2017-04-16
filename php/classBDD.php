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
		$this->bddAddr = "mysql:host=localhost;dbname=GenesisWeb";
		$this->bddUser = "root";
		$this->bddPassword = "warcraft23";
	}
	
	public function connect() {
		try {
			$this->bddPDO = new PDO($this->bddAddr, $this->bddUser, $this->bddPassword);
			$this->bddIsConnected = true;
		} catch (PDOException $e) {
			// go to error page
			echo "IMPOSSIBLE TO CONENCT TO BDD";
		}
	}
	
	/* USER */
	
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
	
	public function getUserDataFromId($id) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM user"
			." WHERE userId = :id;");
		$request->execute(array(":id" => $id));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function updateUserData($id, $email, $password, $name, $avatar) {
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
	
	public function getUserList($limit, $offset, $order, $dir) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM user"
			." LIMIT = :id OFFSET;"
			." ORDER BY :order :dir;");
		$request->execute(array(":limit" => $limit,":offset" => $offset,":order" => $order,":dir" => $dir));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/* SHOW */
	
	public function getShowData($id) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM show"
			." WHERE showId = :id;");
		$request->execute(array(":id" => $id));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function getShowList() {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM show;");
		$request->execute(array());
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/* EPISODE */
	
	public function getEpisodeData($id) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM episode"
			." WHERE episodeId = :id;");
		$request->execute(array(":id" => $id));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function getEpisodeList($id) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM episode"
			." WHERE episodeShowId = :id");
		$request->execute(array(":id" => $id));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/* GAME */
	
	public function getGameList() {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM game;");
		$request->execute();
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/* COMMENTS */
	
	public function getShowComments($id) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM comments"
			." WHERE commentsMediaId = :id"
			." AND commentsMediaType = 1;");
		$request->execute(array(":id" => $id));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function getEpisodeComments($id) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM comments"
			." WHERE commentsMediaId = :id"
			." AND commentsMediaType = 2;");
		$request->execute(array(":id" => $id));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function getGameComments($id) {
		$request = $this->bddPDO->prepare("SELECT *"
			." FROM comments"
			." WHERE commentsMediaId = :id"
			." AND commentsMediaType = 3;");
		$request->execute(array(":id" => $id));
		$result = $request->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	
}

$currentBDD = null;

function getCurrentBDD() {
	if(!isset($currentBDD) || $currentBDD === null) {
		$currentBDD = new BDD();
		$currentBDD->connect();
	}
	return $currentBDD;
}

?>
