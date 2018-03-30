<?php
//mac error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once('phpscripts/config.php');

//for testing purposes below is commented but this should be uncommented in real life so people don't have access
confirm_logged_in();

// if($newPassword === $newPasswordConfirm && isset($_POST['submit'])) {
// 	$newPassword = trim($_POST['newPassword']);
	
// //people may miss the user level so if its empty give people an error message
// 	if(empty($newPasswordConfirm)) {
// 		$message = "please confirm passwords";
// 	} else {
// 		$result = updatePass($newPassword);
// 		$message = $result;
// 	}
// }

if(isset($_POST['submit'])) {
	$oldPassword = trim($_POST['oldPassword']);
	$newPassword = trim($_POST['newPassword']);
	$newPasswordConfirm = trim($_POST['newPasswordConfirm']);
	$id = $_SESSION['user_id'];
	if(empty($newPasswordConfirm)) {
		$message = "please confirm passwords";
	} else {
		if(strcmp($newPassword, $newPasswordConfirm) == 0) {
			$result = updatePass($id, $newPassword);
			$message = $result;
		} else {
			$message = "new passwords do not match";
		
		}

		// echo $newPassword.$newPasswordConfirm;
	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NEWFLIX | Not Illegally Stealing a Brand</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php include('../includes/nav.php'); ?>
	
	
	<section class="main-content">
	<div class="addUser">
	<h1>Your Profile</h1>
		
			<h3>Username: <?php echo $_SESSION['user_usrn'];?></h3>
			<h3>Change Password: </h3>
		<?php if(!empty($message)) {echo $message;} ?>
	<!-- action says run on this page -->
	<form action="admin_profile.php" method="post">
		<label>Old Password: </label>
		<input type="text" name="oldPassword"  ><br>

		<label>New Password: </label>
		<input type="text" name="newPassword"><br>

		<label>Confirm New Password: </label>
		<input type="text" name="newPasswordConfirm"><br>

		<input type="submit" name="submit" value="Change Password" ><br>

	</form>
	</div>
	</section>


	<?php include('../includes/footer.php'); ?>
</body>
</html>