<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();
	$tbl = "tbl_movies";
	$movies = getAll($tbl);
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
	<h2>Deleting is Permanent -- BE SURE</h2>
	<?php
		while($row = mysqli_fetch_array($movies)){
			echo "<img class=\"image-size\" src=\"../images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
			<h4>{$row['movies_title']}</h4> 
			<a class=\"large-text\" href=\"phpscripts/caller.php?caller_id=delete&id={$row['movies_id']}\">Delete For Ever and Ever</a><br>";
		}
	?>
	</section>
	<?php include('../includes/footer.php'); ?>
</body>
</html>