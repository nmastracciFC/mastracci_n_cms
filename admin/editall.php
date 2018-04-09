<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	$result = multiReturns(17); //go to functions.php with this method
	list($add, $multiply) = multiReturns(245);//this does the same thing but is more semantic for other developers

	
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
	
	<div class="main-content">
	<?php
	$id = $_GET['id'];
	$tbl = "tbl_movies";
	$col = "movies_id";
	$cover = $_GET['cover'];
	// echo $cover;
		echo single_edit($tbl, $col, $id, $cover);

	?>
	</div>
	<?php include('../includes/footer.php'); ?>
</body>
</html>