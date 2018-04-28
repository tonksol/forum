<?php
	session_start();
	// makes a cookie.
	
	function logged_in() {
		// $_SESSION['loggedin_time'] = time();
		return isset($_SESSION['user_id']);
	}
	// is there a variable user_id in the session? 
	// with the unique cookie number it can find the session information that belongs to the cookie number.
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirectTo("/../presentation/home.php");
		}
	}