<?php
require_once("../include/functions.php");
require_once("../include/connection.php");

$error = false; 
$error_message = "";
$msg_email_is_empty = "";
$msg_username_is_empty = "";
$msg_password_is_empty = "";
$msg_not_an_email = "";

if (isset($_POST["submit"])) {
    // declare variables
        	// perform validations on the form data
		        // they senitise the input and trim removes whitespace 
    $email      =     trim(mysqli_real_escape_string($connection, $_POST["email"]));        //prevent javascipt and sql injection for email
    $userName   =     trim(mysqli_real_escape_string($connection, $_POST["username"]));                  //prevent javascipt and sql injection for username
    $password   =     trim(mysqli_real_escape_string($connection, $_POST["password"]));                  //prevent javascipt and sql injection for password

    // Associative array where 'cost' is the name and 15 the value
    $iterations = ['cost' => 15];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
    // check what field is empty and tell the user what field is empty 
    if (field_not_empty($email)) {
        $error = true;
        $msg_email_is_empty .= '<div class="alert alert-warning" role="alert">The email field is empty. <br></div>';        
    } if (field_not_empty($userName)) {
        $error = true;
        $msg_username_is_empty .= '<div class="alert alert-warning" role="alert">The username field is empty. <br></div>';
    } if (field_not_empty($password)) {
        $error = true;
        $msg_password_is_empty .= '<div class="alert alert-warning" role="alert">The password field is empty. <br></div>';
    } else {
        $error = false;
    }

    // Check the characters of email. Returns true or false
    if (validate_email($email)) {
        $error = true;
        $msg_not_an_email .= '<div class="alert alert-warning" role="alert">Oops, this doesn\'t look like an email adress. Here is an example for you: name@example.com <br></div>';
    } else {
        $error = false;
    }

    // $error = true
    if ($error) { 
        $error_message .= '<div class="alert alert-danger" role="alert"><b> Unsuccesful sign up! </b></div>';
    } else {
        $query = "CALL proc_insert_new_user('$email', '$userName', '$hashed_password')";
        $result = mysqli_query($connection, $query);
        if ($result){
            echo '<div class="alert alert-success" role="alert"><b> You got succesfully signed up </b></div>';
        } 
    }
}

?>