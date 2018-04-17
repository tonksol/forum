<?php
require_once ("session.php");
require_once ("connection.php");
// write here all your functions
// bedenk goed wat er in een functie gaat en wat eruit komt 

// Redirect function 
function redirect_to($location) {
    header("Location: {$location}");
}
// set location header in the response header (request can only be set by the browser.)

// -------------------------------------
// VALIDATIONS
// -------------------------------------

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


// -------------------------------------
// LOG IN / LOG OUT
// -------------------------------------

    // called on home.php
function login_succes_message() {
    if (logged_in()) {
        return '<div class="alert alert-mygreen" role="alert"> Log in successful </div>';
    }
}

    // calles on home.php
function logout_succes_message() {
    if (!isset($_COOKIE[session_name()])){
        return '<div class="alert alert-mygrey" role="alert"> Log out successful </div>';
    }
}

    // called on signUp_form
 function login_fail_message() {
    if (!empty($_SESSION['login_failed_message'])) {
        echo '<div class="alert alert-mygrey" role="alert">' . $_SESSION['login_failed_message'] . '</div>;';
    }
}


function login_logout_button_switch() {
    $which_button = "";
    if (!logged_in()) {
        $which_button = '<a class="nav-link" class="log-in" href="#" data-toggle="modal" data-target="#loginModal">Log in</a></li>';
    } else {  
        $which_button = '<a class="nav-link" class="log-out" href="http://localhost:41062/www/Forum/business/logout.php">Log out</a></li>';
    }
    return $which_button;
}

// see also session.php
function member_area() {
    $please_login_message = "";
    if (!logged_in()) {
        $please_login_message = "Please log in first to see this page.";
         redirect_to("http://localhost:41062/www/Forum/presentation/signUp_form.php");
        die;
    }
    return $please_login_message;
}
// -------------------------------------
// Permission acces level
// -------------------------------------
function admin_area() {
    if (!logged_in() || !isAdmin()) {
        redirect_to("http://localhost:41062/www/Forum/presentation/home.php");  
        die;
    }
}


function isAdmin(){
    if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
        return true;
    } else {
        return false;
    }
}

// -------------------------------------
// USER PROFILE
// -------------------------------------


function get_user_image($imageUrl) {
    if ($imageUrl == "" || $imageUrl == NULL){
        return "../images/profilepic0.png";       
    } else {
        return $imageUrl;
    }
}

   // called on userProfile_page.php
   function update_userinfo_fail_message() {
    if (!empty($_SESSION['update_failed_message'])) {
        echo '<div class="alert alert-mygrey" role="alert">' . $_SESSION['update_failed_message'] . '<br/></div>';
    }
}


function edit_submit_button_switch() {
    if (isset($_POST["edit"]) && !empty($_POST["edit"])) {
        return "<input class='btn btn-primary btn-block' type='submit' name='submit' value='submit'>";
        } else {  
        return "<input class='btn btn-primary btn-block' type='submit' name='edit' value='edit info'>";
    }
}

function editable_form() {
    $readonly = "readonly";
    if (isset($_POST["edit"]) && !empty($_POST["edit"])){
        return ""; // editable, you can see the submit button
    } else {
        return "readonly "; // not editable, you can see the edit button
    }
}
