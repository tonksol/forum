<?php
require_once ("../include/connection.php");
require_once ("../include/functions.php");
require_once ("../include/session.php");

// require_once ("../include/modal-form.js");

if (logged_in()) {
		//redirect_to("../home.php");
		
		echo '<div class="alert alert-success" role="alert"><b> You got succesfully loged in </b></div>';
	}
	// prefent that people can log in again when they are already logged in. 

	// START FORM PROCESSING
		// Form has been submitted.
	if (isset($_POST['submit'])) { 
		$email = trim(mysqli_real_escape_string($connection, $_POST['email']));
		$password = trim(mysqli_real_escape_string($connection,$_POST['password']));
		

		$query = "SELECT userID, email, userPassword FROM User WHERE email = '$email' LIMIT 1";
		// select the user from the database with: {$email}
		$result = mysqli_query($connection, $query);
			
			if (mysqli_num_rows($result) == 1) {
				// email/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($result);

				
				// $password = password from form input. $found_user[] is hashed password from database
                if(password_verify($password, $found_user['userPassword'])){
					// password_verify matched the input password with the userPassword on the database. 
					// If it is a match you ...
					
				    $_SESSION['user_id'] = $found_user['userID'];
					$_SESSION['email'] = $found_user['email'];
					// store id and user in session on the server side.
					redirect_to("../home.php");
					
			} else {
				// email/password combo was not found in the database
				redirect_to("../signUp_form.php");
				$message = "Email/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}}
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			// isset = if it exsists 
			// 1 = true
			$logout_message = "You are now logged out.";
		} 
	}
if (!empty($message)) {
	echo "<p>" . $message . "</p>";
}

// close the connection
if (isset($connection)){
	mysqli_close($connection);
}