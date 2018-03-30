<?php

function getAll($table) {
	include('connect.php');
	$queryAll = "SELECT * FROM {$table}";
	//whenever you have a variable you have to pass it as an argument(in the brackets of the function)
	// var_dump($queryAll);
	$runAll = mysqli_query($link, $queryAll);//runs the query with the link from the database
	// echo $queryAll; //double checks we're returning the table name from index.php
	// var_dump($runAll);die;
	if($runAll){ 
		//if runAll is an object then return it to index.php
		return $runAll;

	} else {
		$error = "FROM GETALL: there was a problem accessing information";
		return $error;
	}

	mysqli_close($link);
	//always clsoe the connection so no one steals your shit
	//always write this function when you have an include or require.. no sneaky bees allowed
}

//get one thing from a table on the database
function getSingle($table, $column, $id){ //order matters
	include('connect.php');
	$querySingle = "SELECT * FROM {$table} WHERE {$column} = {$id}";

	$runSingle = mysqli_query($link, $querySingle);
// var_dump($runSingle[0]);die;
	if($runSingle){
		return $runSingle;

	}else{
		$error = "FROM GETSINGLE: there was a problem accessing information";
		return $error;
	}
	mysqli_close($link);
}

function filterType($table, $table2, $tableLink,$column, $column2, $column3, $filter) {
	include('connect.php');
	// echo "From filter type function";
	//compare genre and movies with linking table
	

	$queryFilter = "SELECT * FROM {$table}, {$table2}, {$tableLink} WHERE {$table}.{$column} = {$tableLink}.{$column} AND {$table2}.{$column2} = {$tableLink}.{$column2} AND {$table2}.{$column3} = '{$filter}'";

	// $queryFilter = "SELECT * FROM tbl_movies m, tbl_genre g, tbl_mov_genre mg WHERE m.movies_id = mg.movies_id AND g.genre_id = mg.genre_id AND tbl_genre.genre_name = 'action";
	// echo $queryFilter;
	$runFilter = mysqli_query($link, $queryFilter);
	if($runFilter){//if an object return back, if not return error message
		return $runFilter;
	}else {
		$error = "FROM FILTERTYPE: there was a problem accessing information";
		return $error;
	}
	mysqli_close($link);

}
	
	// function getAll($tbl) {
	// 	include('connect.php');
	// 	$queryAll = "SELECT * FROM {$tbl}";
	// 	$runAll = mysqli_query($link, $queryAll);
	// 	if($runAll){
	// 		return $runAll;
	// 	}else{
	// 		$error = "There was a problem accessing this information.  Sorry about your luck ;)";
	// 		return $error;
	// 	}
	// 	mysqli_close($link);
	// }

	// function getSingle($tbl, $col, $id) {
	// 	include('connect.php');
	// 	$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
	// 	$runSingle = mysqli_query($link, $querySingle);
	// 	if($runSingle){
	// 		return $runSingle;
	// 	}else{
	// 		$error = "There was a problem accessing this information.  Sorry about your luck ;)";
	// 		return $error;
	// 	}
	// 	mysqli_close($link);
	// }

	// function filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {
	// 	include('connect.php');

	// 	$filterQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3}='{$filter}'";
	// 	//echo $filterQuery;
	// 	$runQuery = mysqli_query($link, $filterQuery);
	// 	if($runQuery){
	// 		return $runQuery;
	// 	}else{
	// 		$error = "There was a problem accessing this information.  Sorry about your luck ;)";
	// 		return $error;
	// 	}
	// 	mysqli_close($link);
	// }
?>