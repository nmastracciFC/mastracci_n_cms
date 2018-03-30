<?php
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

	//now you can just pass info into these variables and you will get the edit form dynamically created!
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = 1; //this is hardcoded but you use get to pass in id otherwise
		echo single_edit($tbl, $col, $id);

	?>
	</div>
	<?php include('../includes/footer.php'); ?>
</body>
</html>