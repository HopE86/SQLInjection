<?php
include_once('code/util.php');
if (!isset($entries)) die('error: no entries defined');
?>

<table class="productlist">
	<tr>
		<th>Date</th>
		<th>Text</th>
	</tr>
	<?php foreach($entries as $entry) {?>
	<tr>
		<td><?php echo date_format(new DateTime($entry -> getDate()), 'd.m.Y H:i'); ?>
		</td>
		<td><?php echo $entry -> getText(); ?>
		</td>
	</tr>
	<?php }?>
</table>
