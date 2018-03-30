<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	confirm_logged_in();

	$one = ['gently','slowly','closely','quickly','swiftly','sweetly','merrily','happily','joyfully','angrily'];
	$two = ['getting','taking','breaking','loving','having','being','seeing','looking','forgetting','jumping'];
	$three = ['wet','down','around','through', 'beside','nextto','afar','away','toward','betwixt', 'between'];
	$randomOne = array_rand(array_flip($one), 1);
	$randomTwo = array_rand(array_flip($two), 1);
	$randomThree = array_rand(array_flip($three), 1);

	$randomPassword = $randomOne.$randomTwo.$randomThree;


if(isset($_POST['submit'])) {
	$fname = trim($_POST['fname']);
	$username = trim($_POST['username']);
	$password = $randomPassword;
	$email = trim($_POST['email']);
	$userlvl = $_POST['userlvl'];
	if(empty($userlvl)) {
		$message = "please select a user level";
	} else {
		// var_dump($fname, $username, $password, $email, $userlvl);
		// die;
		$result = createUser($fname, $username, $password, $email, $userlvl);
		$message = $result;
		
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User</title>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<h1 class="logo">Newflix</h1>
	<h2>Create User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method="post">
		<form action="admin_createuser.php" method="post">
		<label>First Name: </label>
		<input type="text" name="fname" value="<?php if(!empty($fname)) {echo $fname;} ?>" ><br>

		<label>Username: </label>
		<input type="text" name="username" value="<?php if(!empty($username)) {echo $username;} ?>"><br>

		<label>Password will be randomly generated and emailed to user</label><br>

		<label>Email: </label>
		<input type="text" name="email" value="<?php if(!empty($email)) {echo $email;} ?>"><br>

		<label>User Level: </label>
		<select name="userlvl">
			<option value="">Select User Level</option>
			<option value="2">Web Admin</option>
			<option value="1">Web Master</option>
		</select><br><br>
		<input type="submit" name="submit" value="Create User">
	</form>
</body>
</html>