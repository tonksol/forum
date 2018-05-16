<?php
require_once (__DIR__ . "/../include/connection.php");
require_once (__DIR__ . "/../include/functions.php");
require_once (__DIR__ . "/../include/session.php");

// Prefent that people can log in again when they are already logged in. 
if (logged_in()) {
	redirectTo("/../presentation/home.php");	
}

// START FORM PROCESSING	
if (isset($_POST['submit'])) { // Form has been submitted.	
	$_SESSION['justLoggedIn'] = true; // Set session for user to show the Log in succesful message just once.
	$password = trim(mysqli_real_escape_string($connection,$_POST['password']));
	$email = trim(mysqli_real_escape_string($connection, $_POST['email']));
	$query = "CALL proc_get_user_by_email('$email')"; // Select the user from the database with: {$email}	
	$result = mysqli_query($connection, $query); // Executing the query and put the result in $result.			
	$found_user = mysqli_fetch_array($result); // Result of the different columns are in the array $found_user (associative array)
		 
		
	if(password_verify($password, mysqlPrepare($found_user['userPassword']))){ 
		// $password = password from form input. $found_user[] is hashed password from database
		// Password_verify matched the input password with the userPassword on the database. 	
		$_SESSION['user_id'] = mysqlPrepare($found_user['userID']); // Store id and user in session on the server side.
		if ($found_user['accesLevelID'] === NULL) {
			unset($_SESSION['isadmin']);
		} else {
			$_SESSION['isadmin'] = true;
		}
		redirectTo("/../presentation/home.php"); // If it is a match you get redirected to the home.php		
	} else {
		redirectTo("/../presentation/signUp_form.php");
		$_SESSION['login_failed_message'] = 'Email/password combination incorrect.<br/> Please make sure your caps lock key is off and try again.';
	}
}

// close the connection
if (isset($connection)){
	mysqli_close($connection);
}