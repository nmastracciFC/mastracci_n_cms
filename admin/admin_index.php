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
<title>Welcome to your admin panel</title>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<h2>Hi <?php echo $_SESSION['user_fname'];?>! What would you like to alter?</h2>
	<a href="admin_createuser.php">Create User</a>
	<a href="admin_edituser.php">Edit User</a>
	<a href="admin_deleteuser.php">Delete User</a>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>