<?php 
require_once('code/util.php');
require_once('code/AuthenticationManager.php');
require_once('code/Controller.php');
if (!AuthenticationManager::isAuthenticated())
	redirect('start.php');
if (isset($_REQUEST['text']))
	Controller::action('addentry');
if (isset($formErrors))
	$addErrors = $formErrors;
else
	$addErrors = null;
?>

<?php require('header.php'); ?>
<h2>Add Entry:</h2>
<form method="post" action="">
	<table>
		<tr>
			<td><textarea name="text" cols="30" rows="15" maxlength="400" class="textfield"></textarea></td>
		<?php
			if (isset($addErrors['text']))
				 echo "<tr><th></th><td class='errorTable'>".$addErrors['text']."</td></tr>";
		?>
		</tr>
	</table>
	<input type=submit value="Add Entry" class="button-small" />
</form>
<?php require('error.php'); ?>
<?php require('footer.php'); ?>