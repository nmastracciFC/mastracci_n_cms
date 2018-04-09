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
	<h4>Click on the cover to edit the details for that movie.</h4>

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
	</section>
	<?php include('../includes/footer.php'); ?>
</body>
</html>