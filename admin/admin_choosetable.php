<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
	include('phpscripts/config.php');
	confirm_logged_in();

	if(isset($_GET['filter'])){
		$tbl = "tbl_movies";
		$tbl2 = "tbl_genre";
		$tbl3 = "tbl_mov_genre";
		$col = "movies_id";
		$col2 = "genre_id";
		$col3 = "genre_name";
		$filter = "action";
		$getMovies = filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}

	// $tbl = "tbl_movies";
	// 	$col = "movies_id";
	// 	$id = 1; //this is hardcoded but you use get to pass in id otherwise
	// 	echo single_edit($tbl, $col, $id);

// if(isset($_POST['submit']) && $_POST['table'] == "tbl_movies") {
// 	$table = "tbl_movies";
// 	$column = "movies_id";
// 	$id = 1; //this is hardcoded but you use get to pass in id otherwise
// 	// echo $id;
// 	echo multi_edit($table, $column, $id);
// 	// echo $col;
// 	} else if (isset($_POST['submit']) && $_POST['table'] == "tbl_genres") {
// 		$table = "tbl_genres";
// 		$column = "genres_id";
// 		$id = 1; //this is hardcoded but you use get to pass in id otherwise
// 		// echo $column;
// 	echo multi_edit($table, $column, $id);
// 		// echo $col;

// 	} else {
// 		// $message = "please make a selection";
// 	}	


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
	<?php include('../includes/adminnav.php'); ?>
	
	
	<section class="main-content">
	<h2>Edit Site Info</h2>

	<?php
	if(!is_string($getMovies)){
		while($row = mysqli_fetch_array($getMovies)){
			echo "
				<div class=\"movie-list\">
					
					<a href=\"editall.php?id={$row['movies_id']}&cover={$row['movies_cover']}\">
						<img src=\"../images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
					</a><br><br>
					
				<h2>{$row['movies_title']}</h2>
				<p>{$row['movies_year']}</p>
				
				</div>
			";
		}
	}else{
		echo "<p class=\"error\">{$getMovies}</p>";
	}
?>

















	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_choosetable.php" method="post">
		
		<label>What Would you Like to Edit? </label>
		<select name="table">
			<option value="tbl_movies">The Movies</option>
			<option value="tbl_genre">The Genres</option>
		
		</select><br><br>
		<input type="submit" name="submit" value="Make Selection">
	</form>
<?php
	if(isset($_POST['submit']) && $_POST['table'] == "tbl_movies") {
		$table = "tbl_movies";
		$column = "movies_id";
		// $id = 1; //this is hardcoded but you use get to pass in id otherwise
		// echo $id;
		echo multi_edit($table, $column);
	// echo $col;
	} else if (isset($_POST['submit']) && $_POST['table'] == "tbl_genre") {
		$table = "tbl_genre";
		$column = "genre_id";
		// $id = 1; //this is hardcoded but you use get to pass in id otherwise
		// echo $column;
	echo multi_edit($table, $column);
		// echo $col;

	}
	?>
	</section>
	<?php include('../includes/footer.php'); ?>
</body>
</html>