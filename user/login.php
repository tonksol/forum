<?php
require_once ("../header.php");

if (logged_in()) {
		redirect_to("../home.php");
	}
	// prefent that people can log in again when they are already logged in. 
 ?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>

 <?php
	// START FORM PROCESSING
		// Form has been submitted.
	if (isset($_POST['submit'])) { 
		$email = trim(mysqli_real_escape_string($connection, $_POST['email']));
		$password = trim(mysqli_real_escape_string($connection,$_POST['password']));
		

		$query = "SELECT userID, email, userPassword FROM User WHERE email = '{$email}' LIMIT 1";
		// select the user from the database with: {$email}
		$result = mysqli_query($connection, $query);
							echo "There is a connection with the db <br>";
			
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
				$message = "Email/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}}
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			// isset = if it exsists 
			// 1 = true
			$message = "You are now logged out.";
		} 
	}
if (!empty($message)) {
	echo "<p>" . $message . "</p>";
}

// close the connection
if (isset($connection)){
	mysqli_close($connection);
}
?>