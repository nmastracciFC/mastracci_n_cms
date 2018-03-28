<?php
function logIn($username, $password, $ip) {
 	require_once('connect.php');
 	$username = mysqli_real_escape_string($link, $username);//this is sanitzation, changes everything to literals
 	$password = trim(mysqli_real_escape_string($link, $password));

 	$loginuser = "SELECT * FROM tbl_user WHERE user_name = '{$username}'";
 	
 	$user_set = mysqli_query($link, $loginuser);
 

 	if(mysqli_num_rows($user_set)){
 		//this works as a boolean
 		$found_user = mysqli_fetch_array($user_set,MYSQLI_ASSOC);
 		$id = $found_user['user_id'];//now you have access to the users ID
 		$pass = $found_user['user_pass'];
 		$signedIn = $found_user['user_signedin'];
 		$dateCreate = $found_user['user_created_at'];
 		$dateCreateUnix = strtotime($dateCreate);
 		$currentTime = strtotime('now');
		// var_dump($currentTime, $dateCreateUnix);
 		// 	die;
 		


 		if( $currentTime - $dateCreateUnix > 3600 && $signedIn == false){
 			//JUSTIN above is the amount in seconds that a user has to sign in before their account is inaccessible. Feel free to change it to less than an hour.

 			return "Uh oh... You have exceeded the amount of time allowed to log in to your account. You must contact your site Administrator to get your account reactivated.";

 		}else if (password_verify($password, $found_user['user_pass']) && ($found_user['user_attempts'] < 3)) {
 		
 			$_SESSION['user_id'] = $id; //label user_id equals the variable id
	 		$_SESSION['user_fname'] = $found_user['user_fname'];
	 		$_SESSION['user_lastlog'] = $found_user['user_lastlog'];
	 		$_SESSION['user_usrn'] = $found_user['user_name'];
	 		$_SESSION['user_signedin'] = $found_user['user_signedin'];

 		if($user_set){
 			//if they've successfully logged in then update their ip address in the db
 			$updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id = {$id}";
 			$updateLastLogin = "UPDATE tbl_user SET user_lastlog = NOW() WHERE user_id = {$id}";
 			$updateAttempts = "UPDATE tbl_user SET user_attempts = 0 WHERE user_id = {$id}";
 			$updateSignedIn = "UPDATE tbl_user SET user_signedin = 1 WHERE user_id = {$id}";
 			$updatequery = mysqli_query($link, $updatestring);
 			$updatequery2 = mysqli_query($link, $updateLastLogin);
 			$updatequery3 = mysqli_query($link, $updateAttempts);
 			$updatequery4 = mysqli_query($link, $updateSignedIn);
 			
 			if($signedIn == false) {
 				redirect_to('admin_profile.php');
 				
 			} else{
 				redirect_to('admin_index.php');
 			}
 			
 		}

 		

 	} else if ($found_user['user_attempts'] < 3 ) {
 		$attempts = $found_user['user_attempts'] + 1;
 		$attemptQuery = "UPDATE tbl_user SET user_attempts = {$attempts} WHERE user_id = {$id} ";
 		$updateAttempts = mysqli_query($link, $attemptQuery);
 		$message = "Failed Login Attempt -- You only have three.";
 		return $message;
 	}else{
 		return "You are now Locked out--Sorry Dude.";
 	}

 	}


 	mysqli_close($link);
 }

	// function logIn($username, $password, $ip) {
	// 	require_once('connect.php');
	// 	$username = mysqli_real_escape_string($link, $username);
	// 	$password = mysqli_real_escape_string($link, $password);
	// 	$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
	// 	$user_set = mysqli_query($link, $loginstring);
	// 	//echo mysqli_num_rows($user_set);
	// 	if(mysqli_num_rows($user_set)){
	// 		$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
	// 		$id = $founduser['user_id'];
	// 		$_SESSION['user_id'] = $id;
	// 		$_SESSION['user_name']= $founduser['user_fname'];
	// 		if(mysqli_query($link, $loginstring)){
	// 			$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
	// 			$updatequery = mysqli_query($link, $update);
	// 		}
	// 		redirect_to("admin_index.php");
	// 	}else{
	// 		$message = "Learn how to type you dumba&*.";
	// 		return $message;
	// 	}

	// 	mysqli_close($link);
	// }
?>