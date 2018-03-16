<?php
require_once ("../header.php");

if (logged_in()) {
		redirect_to("home.php");
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
	if (isset($_POST['submit'])) { // Form has been submitted.
		$email = trim(mysqli_real_escape_string($connection, $_POST['email']));
		$password = trim(mysqli_real_escape_string($connection,$_POST['pass']));

		$query = "SELECT id, user, pass FROM users WHERE user = '{$email}' LIMIT 1";
		// select the user from the database with: {$email}
		$result = mysqli_query($connection, $query);
			
			if (mysqli_num_rows($result) == 1) {
				// email/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($result);
                if(password_verify($password, $found_user['pass'])){
					// password_verify matched the input password with the password on the datbase. 
					// If it is a match you ...
				    $_SESSION['user_id'] = $found_user['id'];
					$_SESSION['email'] = $found_user['email'];
					// store id and user in session on the server side.
				    redirect_to("home.php");
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
if (!empty($message)) {echo "<p>" . $message . "</p>";} ?>

<h2>Please login</h2>
<form action="" method="post">
Email:
<input type="text" name="email" maxlength="30" value="" />
Password:
<input type="password" name="pass" maxlength="30" value="" />
<input type="submit" name="submit" value="Login" />
</form>


</body>
</html>
<?php
if (isset($connection)){mysqli_close($connection);}
?>