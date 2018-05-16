<?php
require_once(__DIR__ . "/../include/functions.php");
require_once(__DIR__ . "/../include/connection.php");
$error = false; 
$error_message = "";
$msg_email_is_empty = "";
$msg_username_is_empty = "";
$msg_password_is_empty = "";
$msg_not_an_email = "";
if (isset($_POST["submit"])) {
    $email      =     trim(mysqli_real_escape_string($connection, $_POST["email"]));       //prevent javascipt and sql injection for email
    $userName   =     trim(mysqli_real_escape_string($connection, $_POST["username"]));   //prevent javascipt and sql injection for username
    $password   =     trim(mysqli_real_escape_string($connection, $_POST["password"]));   //prevent javascipt and sql injection for password
    // Associative array where 'cost' is the name and 15 the value
    $iterations = ['cost' => 15];
    // Create the hasshed password: input password, using blowfish algo
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
    // Check what field is empty and tell the user what field is empty 
    if (fieldNotEmpty($email)) {
        $error = true;
        $msg_email_is_empty .= '<div class="alert alert-warning" role="alert">The email field is empty. <br></div>';        
    } if (fieldNotEmpty($userName)) {
        $error = true;
        $msg_username_is_empty .= '<div class="alert alert-warning" role="alert">The username field is empty. <br></div>';
    } if (fieldNotEmpty($password)) {
        $error = true;
        $msg_password_is_empty .= '<div class="alert alert-warning" role="alert">The password field is empty. <br></div>';
    } else {
        $error = false;
    }
    // Check the characters of email. Returns true or false
    if (validateEmail($email)) {
        $error = true;
        $msg_not_an_email .= '<div class="alert alert-warning" role="alert">Oops, this doesn\'t look like an email adress. 
                            Here is an example for you: name@example.com <br></div>';
    } else {
        $error = false;
    }
    if ($error) { // If the value of $error is true
        $error_message .= '<div class="alert alert-danger" role="alert"><b> Unsuccesful sign up! </b></div>';
    } else {
        $email = trim(mysqli_real_escape_string($connection, $email));
        $userName = trim(mysqli_real_escape_string($connection, $userName));
        $hashed_password = trim(mysqli_real_escape_string($connection, $hashed_password));
         $query = "CALL proc_insert_new_user('$email', '$userName', '$hashed_password')";
        $result = mysqli_query($connection, $query);
        mysqli_next_result($connection);
        if ($result){
            echo '<div class="alert alert-success" role="alert"><b> You got succesfully signed up </b></div>';
        } 
    }
}?>