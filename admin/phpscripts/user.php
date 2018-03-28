<?php
function createUser($fname, $username, $password, $email, $userlvl) {
		include('connect.php');
		
		$hashPassword = password_hash($password, PASSWORD_DEFAULT);
		
		$userString = "INSERT INTO tbl_user VALUES(NULL, CURRENT_TIME, '{$fname}', '{$username}','{$hashPassword}', '{$email}', NULL, 0, NULL, '{$userlvl}', NULL, 0)"; 
		
		$userQuery = mysqli_query($link, $userString);
		if($userQuery) {
			$sendMail = sendMessage($email, $fname, $username, $password);

		} else {
			$message = "There was a problem setting up that user. Reconsider your life.";
			return $message;
		}

		mysqli_close($link);
	}




function sendMessage($email, $fname, $username, $password) {
	$to = $email; 
	$subj = "ZOU: Your Login info";  
	$msg = "Oh Hey, ".$fname."!\n\nYour ZOU consultant has created an account to get you started on your lipstick journey with us. Please make sure to login and change your password.\n\nHere are your credentials:\n\nUsername: ".$username."\n\nPassword: ".$password."\n\n Thank you for your business! \n\nThe ZOU team" ;
	//JUSTIN, COMMENT OUT LINES 32 AND 33 AND UNCOMMENT LINE 34 IF YOU ARE ON LOCALHOST TO VIEW WHAT YOUR NEW USERS RANDOM PASSWORD WILL BE
			// mail($to, $subj, $msg); 
			// redirect_to("admin_index.php");
			echo $msg;
}


function updatePass($id, $newPassword) {
		include('connect.php');

		$hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);

		$userString = "UPDATE tbl_user SET user_pass = '{$hashPassword}' WHERE user_id = {$id}"; 
	
		$userQuery = mysqli_query($link, $userString);
		if($userQuery) {
			redirect_to("admin_index.php");

		} else {
			$message = "An issue has occurred. Password has NOT been changed. Please try again.";
			return $message;
		}

		mysqli_close($link);
	}

	// function createUser($fname, $username, $password, $email, $lvllist) {
	// 	include('connect.php');
	// 	$userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$lvllist}', 'no' )";
	// 	//echo $userstring;
	// 	$userquery = mysqli_query($link, $userstring);
	// 	if($userquery) {
	// 		redirect_to('admin_index.php');
	// 	}else{
	// 		$message = "Your hiring practices have failed you.  This individual sucks.";
	// 		return $message;
	// 	}
	// 	mysqli_close($link);
	// }

	function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');
		
		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Guess you got canned...";
			return $message;
		}

		mysqli_close($link);
	}

	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
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