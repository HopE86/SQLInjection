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
			<th>Description:</th>		
			<td><textarea name="text" cols="30" rows="15" maxlength="400"></textarea></td>
		</tr>
		<?php
			if (isset($addErrors['text']))
				 echo "<tr><th></th><td class='errorTable'>".escape($addErrors['text'])."</td></tr>";
		?>
	</table>
	<input type=submit value="Add Entry" />
</form>
<?php require('error.php'); ?>
<?php require('footer.php'); ?>