<?php

	function deleteMovie($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_movies WHERE movies_id = {$id}";
		// echo $delstring; die;
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "Bye, bye...";
			return $message;
		}
		mysqli_close($link);
	}
?>