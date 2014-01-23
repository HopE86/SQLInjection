<?php
class Validate {
	private static function isValidName($name) {
		$length = strlen($name);
		//$name = escape($name);
		return ((strlen($name) > 0) && strlen($name) == $length && strlen($name) < 21);
	} //isValidName
	private static function isValidPassword($pw) {
		$length = strlen($pw);
		//$pw = escape($pw);
		return ((strlen($pw) > 3) && strlen($pw) == $length && strlen($pw) < 21);
	} //isValidPassword
	private static function isValidText($text) {
		//$text = escape($text);
		return strlen($text) > 0;
	} //isValidText
	public static function getAddEntryFormErrors() {
		$formErrors = null;
		if (!isset($_REQUEST['text']) || !self::isValidText($_POST['text']))
			$formErrors['text'] = "invalid text (length min.1)";
		return $formErrors;
	} //getAddEntryFormErrors
	public static function getRegisterFormErrors() {
		if (!isset($_REQUEST['userName']) || !isset($_REQUEST['password1']) || !isset($_REQUEST['password2']))
			die('error on validation');
		$formErrors = null;
		$userName = $_POST['userName'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		if (!self::isValidName($userName))
			$formErrors['userName'] = "invalid user name (length min.1 max. 20)";
		if (!($password1 === $password2))
			$formErrors['userPassword'] = "confirm password failed";
		elseif (!self::isValidPassword($password1))
			$formErrors['userPassword'] = "invalid password (length min.4 max. 20)";
		return $formErrors;
	} //getRegisterFormErrors
} //Validate