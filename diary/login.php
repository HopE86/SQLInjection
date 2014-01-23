<?php 
require_once('code/util.php');
require_once('code/AuthenticationManager.php');
require_once('code/Controller.php');
if (AuthenticationManager::isAuthenticated())
	redirect('start.php');
$userName= isset($_REQUEST['userName']) ? $_REQUEST['userName'] : null;
if (isset($_REQUEST['userName']) && isset($_REQUEST['password']))
		Controller::action('login'); 
?>

<?php require('header.php'); ?>
<h2>Login</h2>
<form method="post" action="">
	<table>
		<tr>
			<th>User name:</th>
			<td><input name="userName" class="textfield" value="<?php echo $userName; ?>"/>
			</td>
		</tr>
		<tr>
			<th>Password:</th>
			<td><input type="password" name="password" class="textfield" /></td>
		</tr>
	</table>
	<input type=submit value="Login" class="button-small" />
</form>
<?php require('error.php'); ?>
<?php require('footer.php'); ?>