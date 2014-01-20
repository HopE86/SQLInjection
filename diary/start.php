<?php 
	require_once('code/util.php');
	require_once('db/DataManager.php');
?>

<?php require('header.php'); ?>	
	<h3>Willkommen!</h3>
	<p>Schreibe deine Gedanken in unserem SuperDuper sicheren Online-Tagebuch nieder!
	<?php if($user == null) :?>
	Logge dich dazu ein (<a href="login.php">Login</a>).
	<?php endif;?>
	</p>
<?php require('footer.php'); ?>