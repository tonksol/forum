
<?php

require_once('../include/functions.php'); // so we can actually use functions from our functions file. 
require_once('../include/session.php');
	// THIRD 3 
		// Four steps to closing a session
		// (i.e. logging out)

		// 1. Find the session
		 session_start();
		
		// 2. Unset all the session variables
		$_SESSION = array(); // good practise to do this
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// 4. Destroy the session
		session_destroy();
		
		redirect_to('login.php?logout=1');
?>