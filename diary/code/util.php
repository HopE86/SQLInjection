<?php 
function escape($string) {
	return nl2br(htmlentities($string));
} //escape

class SessionContext {
	private static $isCreated = false;

	public static function create() {
		if(!self::$isCreated)
			self::$isCreated=session_start();
		return self::$isCreated;
	} //create
} //SessionContext
function redirect($page = null) {
	if($page == null)
		$page=isset($_REQUEST['page']) ? $_REQUEST['page'] : $_SERVER['REQUEST_URI'];
	header("Location: $page");
} //redirect
function getParam($par) {
	isset($_REQUEST[$par]) or die("Missing parameter $par");
	return $_REQUEST[$par];
} //getParam
