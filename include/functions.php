<?php
// write here all your functions
// bedenk goed wat er in een functie gaat en wat eruit komt 


// Redirect function 
function redirect_to($location) {
    header("Location: {$location}");
}


// Check of the email field is not empty and set $error to true or false.
// Return the $error set with the new value.
function field_not_empty($fieldValue) {
    $err = false;
    if (!empty($fieldValue)) { // if field is not empty     TRUE als hij leeg is. 
        $err = false; // no, there is no error. The field is set and not empty
    } else {
        $err = true; // yes, there is a error, the field is empty
    }
    return $err;
}


// prevent a SQL Injection by adding backslashes to some caracthers
// You can't enter javascript: <script>alert(1)</script>" litteraly
function mysql_prepare ($value) {
    global $connection;
    // I don't use mysqli_real_escape_string() because I use PDO
    $value = htmlspecialchars(trim($value));
    return $value;
}


// Check the caracters of email
function validate_email($input_email) {
    $err = false;
    $regular_expression ="/^[A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";
     if (preg_match($regular_expression, $input_email)) {
         $err = false; // No, there is no error. There isn't a wrong character.
     } else {
         $err = true; // Yes, there is a error, there is a wrong characters.
     };
    return $err;
}

function logout_login_message() {
    $logout_message = "";
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        // isset = if it exsists 
        // 1 = true
        $logout_message = '<div class="alert alert-success" role="alert"> You have been succesfully logged out of your account! </div>';
    } elseif (logged_in()) {
        $logout_message = '<div class="alert alert-success" role="alert"> You are logged in! </div>';
    };
    return $logout_message;
}

function login_logout_button_switch() {
    $which_button = "";
    if (!logged_in()) {
        $which_button = '<a class="nav-link" class="log-in" href="#" data-toggle="modal" data-target="#loginModal">Log in</a></li>';
    } else {  
        $which_button = '<a class="nav-link" class="log-out" href="http://localhost:41062/www/Forum/user/logout.php">Log out</a></li>';
    }
    return $which_button;
}