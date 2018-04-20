<?php
require_once ("../include/connection.php");
require_once ("../include/functions.php");
require_once ("../include/session.php");

// require_once ("../include/modal-form.js");

if (logged_in()) {
	redirect_to("../home.php");	
}

// prefent that people can log in again when they are already logged in. 

// START FORM PROCESSING
	// Form has been submitted.
if (isset($_POST['submit'])) { 

	// set session for user to show the Log in succesful message just once.
	// $_SESSION['justLoggedIn'] = true;
	

	$email = trim(mysqli_real_escape_string($connection, $_POST['email']));
		// trim removes, whitespace (like tab or space.)
		// mysqli_real_escape_string senatise the data. Prefent SQL injection by adding /. 
	$password = trim(mysqli_real_escape_string($connection,$_POST['password']));
		// $query = "SELECT userID, email, userPassword FROM user WHERE email = '$email' LIMIT 1;";
	$query = "CALL proc_get_user_by_email('$email')";
		// select the user from the database with: {$email}
	$result = mysqli_query($connection, $query);
		// executing the query and put the result in $result.			
	$found_user = mysqli_fetch_array($result);
		// the result of the different columns are in the array $found_user (associative) 
		// $password = password from form input. $found_user[] is hashed password from database
	if(password_verify($password, $found_user['userPassword'])){
		// password_verify matched the input password with the userPassword on the database. 
		// If it is a match you get redirected to the home.php
		$_SESSION['user_id'] = $found_user['userID'];
		// $_SESSION['userName'] = $found_user['userName'];
		// $_SESSION['email'] = $found_user['email'];
		$_SESSION['isadmin'] = $found_user['accesLevelID'] !== NULL;
		
		// store id and user in session on the server side.
		redirect_to("http://localhost:41062/www/forum/presentation/home.php");
			
	} else {
		// email/password combo was not found in the database got redirected to signup_form.php
		redirect_to("http://localhost:41062/www/Forum/presentation/signUp_form.php");
		$_SESSION['login_failed_message'] = 'Email/password combination incorrect.<br/> Please make sure your caps lock key is off and try again.';
	}
}



// close the connection
if (isset($connection)){
	mysqli_close($connection);
}