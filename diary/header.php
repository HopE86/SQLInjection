<?php 
require_once('code/util.php');
require_once('code/AuthenticationManager.php');
require_once('code/Controller.php');
$user=AuthenticationManager::getAuthenticatedUser();
if (isset($_REQUEST['logout']))
	Controller::action('logout');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>MySecretOnlineDiary</title>
<link href='http://fonts.googleapis.com/css?family=Squada One|Convergence' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
	<div class="header">
		<h1>My Secret Online Diary</h1>
		<div class="navigation">
			<p>
				<a href="start.php">Home</a> 
					<!-- | <a href="search.php">Search</a> -->
					<?php if($user != null) :?>
					 | <a href="list.php">Entries</a> 
					 | <a href="add.php">Add Entry</a>
					<?php endif;?>
			</p>
		</div>
		<div class="login">
			<?php if($user == null) :?>
			<p>
				Not Logged In. [<a href="login.php">Login</a>]
				[<a href="register.php">Register</a>]
			</p>
			<?php else :?>
			<p>
			<form name="test" method="post" action="">
				
					Welcome,
					<?php echo escape($user->getLogin());?>.
				
				<input type="hidden" name="logout" value="">
				<input type="submit" value="Logout">
			</form></p>
			<?php endif;?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content">