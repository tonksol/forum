
<?php
// 1. Find the session
session_start();

require_once(__DIR__ . "/../include/functions.php"); // so we can actually use functions from our functions file. 
require_once(__DIR__ . "/../include/session.php");
	// THIRD 3 
		// Four steps to closing a session
		// (i.e. logging out)

		
		
		// 2. Unset all the session variables
		$_SESSION = array(); // good practise to do this
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		// Send extra header to set the cookie whith the expire date in the past. And the browser will clean up the cookie.
		
		// 4. Destroy the session at the server side
		session_destroy();
		
		redirectTo("/../presentation/home.php");
?>