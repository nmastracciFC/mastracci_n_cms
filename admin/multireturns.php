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
	<?php include('../includes/adminnav.php'); ?>
	
	<?php
	echo "Result 1: {$result[0]}<br>";
	echo "Result 2: {$result[1]}<br><br>";

	echo "Result 1 from list: {$add}<br>";
	echo "Result 2: {$multiply}";


	?>
	<?php include('../includes/footer.php'); ?>
</body>
</html>