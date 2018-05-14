<?php
require_once (__DIR__ . "/../include/session.php");
require_once (__DIR__ . "/../include/connection.php");
// write here all your functions
// bedenk goed wat er in een functie gaat en wat eruit komt 

// called on a lot of pages
function redirectTo($location) {
    header("Location: {$location}");
}
// set location header in the response header (request can only be set by the browser.)

// -------------------------------------
// VALIDATIONS
// -------------------------------------

// Check of the email field is not empty and set $error to true or false.
// Return the $error set with the new value.
// called on signUp.php / signup_PDO (not in use) / 
function fieldNotEmpty($fieldValue) {
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
// called on signup_PDO (files not_in use)
function mysqlPrepare($value) {
    global $connection;
    // I don't use mysqli_real_escape_string() because I use PDO
    $value = htmlspecialchars(trim($value));
    return $value;
}


// Check the caracters of email called on signUp.php / signup_PDO (files_not_in use) / 
function validateEmail($input_email) {
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
// Messages
// -------------------------------------

    // called on home.php
function loginSuccesMessage() {
    if (logged_in() && $_SESSION['justLoggedIn'] == true) {
        $_SESSION['justLoggedIn'] = false;
        return '<div class="alert alert-mygreen" role="alert"> Log in successful </div>';
    }
}

    // calles on home.php
function logoutSuccesMessage() {
    if (!isset($_COOKIE[session_name()])){
        return '<div class="alert alert-mygrey" role="alert"> Log out successful </div>';
    }
}

    // called on signUp_form
 function loginFailMessage() {
    if (!empty($_SESSION['login_failed_message'])) {
        echo '<div class="alert alert-mygrey" role="alert">' . $_SESSION['login_failed_message'] . '</div>;';
    }
}



// see also session.php called on: managePage.php / pagemanager.php / userProfile_page.php
function memberArea() {   
    if (!logged_in()) {
        redirectTo("/../presentation/noAccess.php");
        die;
    }
    // sessionExpire();
}

// called managePage.php and userProfile_page.php
function editableForm() {
    $readonly = "readonly";
    if (isset($_POST["edit"]) && !empty($_POST["edit"])){
        return ""; // editable, you can see the submit button
    } else {
        return "readonly "; // not editable, you can see the edit button
    }
}

// -------------------------------------
// ONLY CALLED ON navigation.php
// -------------------------------------
 
// Called on navigation.php
function myprofileSwitch(){
    $which_button = "";
    if (logged_in()) {
        return '<a class="nav-link" class="my-profile" href="presentation/userProfile_page.php">My profile</a>';
    } 
    return $which_button;
}

// navigation admin button called on navigation.php 
function visableUnvisableAdminSwitch() {
    if (logged_in() && isAdmin()){
        return '<a class="nav-link" class="my-profile" href="presentation/admin_page.php">Admin</a>';
    }
}

// navigation login logout
function loginLogoutButtonSwitch() {
    $which_button = "";
    if (!logged_in()) {
        $which_button = '<a class="nav-link" class="log-in" href="#" data-toggle="modal" data-target="#loginModal">Log in</a></li>';
    } else {  
        $which_button = '<a class="nav-link" class="log-out" href="business/logout.php">Log out</a></li>';
    }
    return $which_button;
}

// -------------------------------------
// Permission acces level
// -------------------------------------

// called on admin_page.php and adminNaviagtion.php
function admin_area() {
    if (!logged_in() || !isAdmin()) {
        redirectTo("/../presentation/home.php");  
        die;
    }
}

// called on functions.php to use in visableUnvisableAdminSwitch()
function isAdmin(){
    if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
        return true;
    } else {
        return false;
    }
}