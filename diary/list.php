<?php 
	require_once('code/util.php');
	require_once('db/DataManager.php');
	require_once('code/AuthenticationManager.php');
if (!AuthenticationManager::isAuthenticated())
	redirect('start.php');
	
$critAvailable = isset($_REQUEST['term']);	
if (!$critAvailable) {	
	$entries = DataManager::getEntriesFor(AuthenticationManager::getAuthenticatedUser() -> getId());
	$term = "";
} else {
	$term = $_REQUEST['term'];

    $entries = DataManager::getEntriesForSearchCriteria(AuthenticationManager::getAuthenticatedUser() -> getId(), $term);
}
$count = count($entries);
?>

<?php require('header.php'); ?>
<h2>Entries</h2>
<form>
	<table>
	<tr>
		<th>Term or date: </th>
		<td> <input name="term" value="<?php echo $term; ?>" class="textfield" /> </td>
	</tr>
	</table>
	<input type="submit" value="Search" class="button-small" />
</form>
<?php if(sizeof($entries) > 0) {
require('entrylist.php');
} else { ?>
<p>No entries. </p>
<?php } ?>
<?php //endif; ?>
<p>Number of entries: <?php print($count) ?></p>
<?php require('footer.php'); ?>