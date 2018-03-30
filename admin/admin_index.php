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
	</section>
	<?php include('../includes/footer.php'); ?>
</body>
</html>