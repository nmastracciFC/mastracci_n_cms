<?php
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['id'])) {
		//get the movie
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getMovie = getSingle($tbl, $col, $id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>NEWFLIX | Not Illegally Stealing a Brand</title>
<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php include('includes/nav.php'); ?>
<section class="movie-detail">
	
	<?php
		if(!is_string($getMovie)) {
			$row=mysqli_fetch_array($getMovie);
			echo "<img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
			<div class=\"movie-info\">
			<p>{$row['movies_title']}</p>
			<p>{$row['movies_year']}</p>
			<p>{$row['movies_storyline']}</p>
			<a href=\"index.php\">SEE ALL MOVIES</a>
			</div>
			";
			
		}else{
			echo "<p>{$getMovie}</p>";
		}

	?>
	
</section>
<?php include('includes/footer.php'); ?>
</body>
</html>