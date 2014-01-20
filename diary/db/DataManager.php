<?php 
require_once("Entities.php");
class DataManager {
	private static function getConnection() {
		$con = new mysqli('127.0.0.1', 'root', '', 'diary');
		if(mysqli_connect_errno()) {
			die('Unable to connect to DB');
		}
		return $con;
	} //getConnection
	private static function query($connection, $query) {
		$res = $connection -> query($query);
		return $res;
	} //query
	//==================================USER
	public static function getUser($id) {
		$user = null;
		$con = self::getConnection();
		$id = $con -> escape_string($id);
		$res = self::query($con,
				 "SELECT id, login, password FROM user WHERE id = $id;");
		if($u = $res -> fetch_object())
			$user = new User($u -> id, $u -> login, $u -> password);
		$res->close();
		$con->close();
		return $user;
	} //getUser
	public static function getUserForName($userName) {
		$user = null;
		$con = self::getConnection();
		$userName = $con -> escape_string($userName);
		$res = self::query($con,
				 "SELECT id, login, password FROM user WHERE login = '$userName';");
		if($u = $res->fetch_object())
			$user =new User($u -> id, $u -> login, $u -> password);
		$res->close();
		$con->close();
		return $user;
	} //getUserForName
	public static function insertUser($userName, $password) {
		$userId = -1;
		$con = self::getConnection();
		$userName = $con -> escape_string($userName);
		$password = $con -> escape_string($password);
		//$password = hash('sha1', "$userName|$password");
		self::query($con, "BEGIN;");
		if (self::query($con, "INSERT INTO user(login, password) VALUES('$userName', '$password');"))
			$userId = mysqli_insert_id($con);
		self::query($con, "COMMIT");	
		$con->close();
		return $userId;	
	} //insertUser
	//==================================Entry
	public static function getEntriesFor($userId) {
		$entries = array();
		$con = self::getConnection();
		$userId = $con -> escape_string($userId);
		$res = self::query($con, "SELECT id, text, user_id, date
				 FROM entry WHERE user_id = '$userId' ORDER BY date DESC");
		while ($e = $res -> fetch_object())
			$entries[] = new Entry($e->id, $e->text, $e->user_id, $e->date);
		$res -> close();
		$con -> close();
		return $entries;
	} //getEntriesFor
	public static function getEntriesForSearchCriteria($id, $term){
		$entries = array();
		$con = self::getConnection();
		$term = $con -> escape_string($term);
		$res = self::query($con, "SELECT id, text, user_id, date
				FROM entry WHERE user_id = $id  AND
				 (text LIKE '%$term%' OR date LIKE '%$term%') ORDER BY date DESC;");
		while ($e = $res -> fetch_object())
			$entries[] = new Entry($e->id, $e-> text, $e->user_id, $e-> date);
		$res->close();
		$con->close();
		return $entries;
	} //getEntriesForSearchCriteria
	public static function getEntryCount($userId) {
		$count = null;
		$con = self::getConnection();
		$userId = $con -> escape_string($userId);
		$res = self::query($con, "SELECT count(id) c FROM entry WHERE user_id = '$userId';");
		if ($result = $res -> fetch_object())
			$count = $result -> c;
		$res->close();
		$con->close();
		return $count;
	} //getEntryCount
	public static function insertEntry($userId, $text) {
		$entryId = -1;
		$con = self::getConnection();
		$userId = $con -> escape_string($userId);
		$text = htmlentities($text);
		self::query($con, "BEGIN;");
		if (self::query($con, "INSERT INTO entry(text, user_id, date)
				VALUES('$text', $userId, Sysdate());"))
			$entryId = mysqli_insert_id($con);
		self::query($con, "COMMIT");
		$con->close();
		return $entryId;
	} //insertEntry

} //DataManager

