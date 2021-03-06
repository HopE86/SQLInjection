<?php 
require_once('code/util.php');
require_once('code/AuthenticationManager.php');
require_once('code/Controller.php');
if (AuthenticationManager::isAuthenticated())
	redirect('start.php');
$userName = isset($_REQUEST['userName']) ? $_POST['userName'] : null;
$password = isset($_REQUEST['password1']) ? $_POST['password1'] : null;

if (isset($_REQUEST['userName']) && isset($_REQUEST['password1']))
	Controller::action('register');
if (isset($formErrors))
	$registerErrors = $formErrors;
else
	$registerErrors = null;
?>

<?php require('header.php'); ?>
<h2>Register</h2>
<form method="post" action="">
	<table>
		<tr>
			<th>User name:</th>
			<td><input name="userName" value="<?php echo $userName; ?>" class="textfield"/>
			</td>
			<?php
			if (isset($registerErrors['userName']))
			 	echo "<td class='errorTable'>".$registerErrors['userName']."</td>";
			 ?>
		</tr>
		<tr>
			<th>Password:</th>		
			<td><input type="password" name="password1" class="textfield" /></td>
			<?php
			if (isset($registerErrors['userPassword']))
				 echo "<td class='errorTable'>".$registerErrors['userPassword']."</td>";
			 ?>
		</tr>
		<tr>
			<th>Confirm password:</th>
			<td><input type="password" name="password2" class="textfield" /></td>
		</tr>
	</table>
	<input type=submit value="Register" class="button-small" />
</form>
<?php require('error.php'); ?>
<?php require('footer.php'); ?>