<?php
class user {
	private $login;
	private $pathByImage;
	private $favContacts;
	private $id;
	private $userDb;
	private $pswDb;
	private $hostByDb;
	private $nameByDb;
	
	public function __construct($id, $login, $pathByImage, $favContacts){
		$this->login = $login;
		$this->id = $id;
		$this->pathByImage = $pathByImage;
		$this->favContacts = $favContacts;
		$this->userByDb = "root";
		$this->pswByDb = "";
		$this->hostByDb = "localhost";
		$this->nameByDb = "task"; 
	}
	
	public function getLogin() {
		return $this->login;
	}
	
	public function getPathByImage() {
		return $this->pathByImage;
	}
	
	public function userIsEmptyFavContact() {
		if($this->favContacts == "0") {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function userAddFavContact($idByContact) {
		$flag = true;
		$itemsByFavContacts = explode("&",$this->favContacts);
		
		for($i = 0; $i < count($itemsByFavContacts); $i++) {
			if($itemsByFavContacts[$i] == $idByContact) {
				$flag = false;
			}
		}
		
		if($flag) {
		    $this->favContacts = $this->favContacts."&".$idByContact;
		}
	}
	
	public function userGetFavContacts() {
		return explode("&",$this->favContacts);
	}
	
	public function userDelFavContact($idByContact) {
		$itemsByFavContacts = explode("&",$this->favContacts);
		$this->favContacts = "0";
		
		for($i = 1; $i < count($itemsByFavContacts); $i++) {
			if ($itemsByFavContacts[$i] != $idByContact) {
				$this->favContacts = $this->favContacts.'&'.$itemsByFavContacts[$i];
			}
		}
	}
	
	public function sqlQueryGetContact($idByContact) {
		$datebase = mysqli_connect($this->hostByDb, $this->userByDb, $this->pswByDb, $this->nameByDb);
		$resOfQuery  =  $datebase->query("SELECT * FROM `contacts` WHERE id=".$idByContact);
		return $resOfQuery;
	}

	public function sqlQueryUpdateFavContacts() {
		$datebase = mysqli_connect($this->hostByDb, $this->userByDb, $this->pswByDb, $this->nameByDb);
		$datebase->query("UPDATE users SET favContacts='".$this->favContacts."' WHERE id='".$this->id."'");
	}
	
	public function sqlQueryGetContacts(){
		$datebase = mysqli_connect($this->hostByDb, $this->userByDb, $this->pswByDb, $this->nameByDb);
		$resOfQuery  =  $datebase->query("SELECT * FROM `contacts`");
		return $resOfQuery;
	}
}

class db {
	private $userDb;
	private $pswDb;
	private $hostByDb;
	private $nameByDb;
	
	public function __construct(){
		$this->userByDb = "root";
		$this->pswByDb = "";
		$this->hostByDb = "localhost";
		$this->nameByDb = "task"; 
	}
	
	public function sqlQueryValidateEnter($nameByUser,$pswByUser){
		$flag = true;
		$datebase = mysqli_connect($this->hostByDb, $this->userByDb, $this->pswByDb, $this->nameByDb);
		$resOfQuery = $datebase->query("SELECT * FROM `users`");
		
	    while ($infoByUser = $resOfQuery->fetch_assoc()) {
		    if($infoByUser['login'] == $nameByUser) {
			    if($infoByUser['psw'] == $pswByUser) {
					$flag = false;
					session_start();  
					$_SESSION['curUser'] = new user($infoByUser['id'], $infoByUser['login'],$infoByUser['pathByImage'],$infoByUser['favContacts']);
					header("Location: ../admin/index.php"); 				    	
			    }				
		    }
	    }
		
		if($flag)
			header("Location: index.php?err=1&loginByUser=".$nameByUser); 
	}
	
	public function sqlQueryAddNewUser($nameByUser, $pswByUser, $nameByPhoto, $tmpByPhoto) {
		$flag = true;
		$datebase = mysqli_connect($this->hostByDb, $this->userByDb, $this->pswByDb, $this->nameByDb);
		$resOfQuery = $datebase->query("SELECT * FROM `users`");
		
		while ($infoByUser = $resOfQuery->fetch_assoc()) {
		    if($infoByUser['login'] == $nameByUser) {
			   	$flag = false;
                break;				
		    }
	    }
		
		if($flag) {
	        move_uploaded_file($tmpByPhoto, "C:\\wamp\\www\\test\\img\\".$nameByPhoto); 
		    $datebase->query("INSERT INTO users (login, psw, pathByImage, favContacts) VALUES ('".$nameByUser."', '".$pswByUser."', '../img/".$nameByPhoto."', '0')");
	        header("Location: index.php?reg=1"); 
		}
		else {
			header("Location: registration.php?err=1"); 
		}
	}
}
?>