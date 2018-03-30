<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	confirm_logged_in();
	// $tbl = "tbl_movies";
	// 	$col = "movies_id";
	// 	$id = 1; //this is hardcoded but you use get to pass in id otherwise
	// 	echo single_edit($tbl, $col, $id);

if(isset($_POST['submit']) && $_POST['table'] == "tbl_movies") {
	$tbl = "tbl_movies";
	$col = "movies_id";
	$id = 1; //this is hardcoded but you use get to pass in id otherwise
	echo single_edit($tbl, $col, $id);
	// echo $col;
	} else if (isset($_POST['submit']) && $_POST['table'] == "tbl_movies") {
		$tbl = "tbl_genres";
		$col = "genres_id";
		$id = 1; //this is hardcoded but you use get to pass in id otherwise
	echo single_edit($tbl, $col, $id);
		// echo $col;

	} else {
		// $message = "please make a selection";
	}	


	// $fname = trim($_POST['fname']);
	// $username = trim($_POST['username']);
	// $password = $randomPassword;
	// $email = trim($_POST['email']);
	// $userlvl = $_POST['userlvl'];
	// if(empty($userlvl)) {
	// 	$message = "please select a user level";
	// } else {
	// 	// var_dump($fname, $username, $password, $email, $userlvl);
	// 	// die;
	// 	$result = createUser($fname, $username, $password, $email, $userlvl);
	// 	$message = $result;
		
	// }
// }
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
	<h2>Edit Site Info</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="editall.php" method="post">
		
		<label>What Would you Like to Edit? </label>
		<select name="table">
			<option value="tbl_movies">The Movies</option>
			<option value="tbl_genres">The Genres</option>
		
		</select><br><br>
		<input type="submit" name="submit" value="Make Selection">
	</form>
	</section>
	<?php include('../includes/footer.php'); ?>
</body>
</html>