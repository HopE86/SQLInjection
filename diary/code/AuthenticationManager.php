<?php
require_once('db/DataManager.php'); 
SessionContext::create();
class AuthenticationManager {
	public static function authenticate($userName, $password){
        $password=escape($password);
		$user=DataManager::getUserForName(escape($userName));
		if ($user != null && $user->getPassword() == hash('sha1', "$userName|$password")) {
		//if ($user != null && $user->getPassword() == escape($password)) {
			$_SESSION['user'] = $user->getId();
			return true;
		} //if
		return false;
	} //authenticate
	public static function signOut() {
		unset($_SESSION['user']);
	} //signOut
	
	public static function isAuthenticated() {
		return isset($_SESSION['user']);
	} //isAuthenticated
	public static function getAuthenticatedUser() {
		return self::isAuthenticated() ? DataManager::getUser($_SESSION['user']) : null;		
	} //getAuthenticatedUser
} //AuthenticationManager