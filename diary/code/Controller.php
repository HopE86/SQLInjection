<?php
require_once('code/util.php');
require_once('code/Validate.php');
require_once('db/DataManager.php');
require_once('code/AuthenticationManager.php');

class Controller {
	private static function setError($errorData=null, $formErrorData=null) {
		if (is_array($errorData)){
			global $errors;
			$errors = $errorData;
		} //if
		if (is_array($formErrorData)) {
			global $formErrors;
			$formErrors = $formErrorData;
		} //if
	} //setError
	
	public static function action($action) {
		if($action=='addentry') {
			$formErrorData = Validate::getAddEntryFormErrors();
			if (empty($formErrorData)) {
				if (DataManager::insertEntry($_SESSION['user'], getParam('text')) != -1)
					redirect("success.php?entry=".rawurlencode(getParam('text')));
				else
					self::setError(array('error saving entry'));
			} else
				self::setError(array('Please correct the displayed errors'), $formErrorData);
		} elseif($action=='register') {
			$formErrorData = Validate::getRegisterFormErrors();
			if (empty($formErrorData)) {
				if (DataManager::insertUser(getParam('userName'), getParam('password1')) != -1)
					redirect("success.php?userName=".rawurlencode(getParam('userName')));
				else 
					self::setError(array('user name already taken'));
			} else
				self::setError(array('Please correct the displayed errors'), $formErrorData);
		} elseif($action=='login') {
			if (AuthenticationManager::authenticate(getParam('userName'), getParam('password')))
				redirect();
			else
				self::setError(array('Invalid Username or password'));
		} elseif($action=='logout') {
			AuthenticationManager::signOut();
			redirect();
		} else
			die('unknown action: '.$action);
	} //action
} //Controller
