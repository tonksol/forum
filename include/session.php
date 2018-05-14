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

//	function sessionExpire() {
//		echo time();
//		// echo $_SESSION['CREATED'];
//		if (!isset($_SESSION['CREATED'])) {
//			$_SESSION['CREATED'] = time();
//		} else if (time() - $_SESSION['CREATED'] > 60) {
//			// session started more than 30 minutes ago
//			session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
//			$_SESSION['CREATED'] = time();  // update creation time
//			redirectTo("../presentation/home.php");
//		}
//	}