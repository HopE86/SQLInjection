<?php
include_once('code/ProductListItem.php');
include_once('code/util.php');
if (!isset($entries)) die('error: no entries defined');
/*foreach($entries as $entry) {
	$item = new EntryListItem($entry);
	$item -> updateData();
	$items[] = $item;
}*/
?>

<table class="productlist">
	<tr>
		<th>Date</th>
		<th>Text</th>
	</tr>
	<?php foreach($entries as $entry) {?>
	<tr>
		<td><?php echo date_format(new DateTime(escape($entry -> getDate())), 'd.m.Y H:i'); ?>
		</td>
		<td><?php echo escape($entry -> getText()); ?>
		</td>
	</tr>
	<?php }?>
</table>
