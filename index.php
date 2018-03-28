<?php
	require_once('admin/phpscripts/config.php');

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
<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	
<?php
	include('includes/nav.html');
?>
<section>
<?php
	if(!is_string($getMovies)){
		while($row = mysqli_fetch_array($getMovies)){
			echo "
				<div class=\"movie-list\">
					
					<a href=\"details.php?id={$row['movies_id']}\">
						<img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
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
<?php
	include('includes/footer.html');
?>

<script type="text/javascript" src="js/main.js"></script>
</body>
</html>