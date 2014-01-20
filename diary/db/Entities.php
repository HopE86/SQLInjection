<?php 
class Entity {
	private $id;
	public function getId(){
		return $this -> id;
	} //getId
	public function __construct($id){
		$this -> id = $id;
	}
} //Entity
class User extends Entity {
	private $login;
	private $password;
	public function getLogin(){
		return $this -> login;
	} //getLogin
	public function getPassword(){
		return $this -> password;
	} //getPassword
	public function __construct($id, $login, $password){
		parent::__construct($id);
		$this -> login = $login;
		$this -> password = $password;
	}
} //User
class Entry extends Entity {
	private $text;
	private $userId;
	private $date;
	
	public function getText(){
		return $this -> text;
	} //getText
	public function getUserId(){
		return $this -> userId;
	} //getUserId
	public function getDate() {
		return $this -> date;
	} //getDate
	public function __construct($id, $text, $userId,  $date){
		parent::__construct($id);
		$this -> text = $text;
		$this -> userId = $userId;
		$this -> date = $date;
	}
} //Entry
