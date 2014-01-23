<?php 
	require_once('code/util.php');
	require_once('db/DataManager.php');
?>

<?php require('header.php'); ?>	
	<h2>Willkommen!</h2>
	<p>Schreibe deine Gedanken in unserem SuperDuper sicheren Online-Tagebuch nieder!<br />
	<?php if($user == null) :?>
	Logge dich dazu ein (<a href="login.php">Login</a>).
	<?php endif;?>
	</p>
<?php require('footer.php'); ?>