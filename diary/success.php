<?php
require_once('code/util.php');
if (!(isset($_REQUEST['entry']) || isset($_REQUEST['userName'])))
	redirect('start.php');
isset($_REQUEST['entry']) ? $entry = $_GET['entry'] : null;
isset($_REQUEST['userName']) ? $userName = $_GET['userName'] : null;
?>

<?php 
require('header.php');?>
<h2>Success</h2>
<?php if (isset($userName)) :?>
	<h3>Welcome, <?php echo $userName;?>!</h3>
	<p><a href="login.php?userName=<?php echo $userName;?>">Login</a></p>
<?php elseif(isset($entry)) :?>
	<h3>Entry successfully added!</h3>
	<p><a href="list.php">Entries</a></p>
<?php
endif;
require('footer.php');
?>