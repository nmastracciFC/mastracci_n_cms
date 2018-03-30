<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>NEWFLIX | Not Illegally Stealing a Brand</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php include('../includes/nav.php'); ?>
	
	<section class="main-content">
		<h2>Hi <?php echo $_SESSION['user_fname'];?>! What would you like to alter?</h2>

		<a class="button-nav" href="admin_choosetable.php">Edit Site Info</a>
		<a class="button-nav" href="admin_createuser.php">Create User</a>
		<a class="button-nav" href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
		<h3><?php echo $greeting; ?></h3>
		<h3><?php echo "The time is " . date("h:ia");?></h3>
		<h3>Last Login:<br><?php echo date_create($_SESSION['user_lastlog'])->format('F d, Y  g:ia'); ?> </h3>
	</section>
	<?php include('../includes/footer.php'); ?>
</body>
</html>