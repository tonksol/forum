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
function fieldNotEmpty($fieldValue) {
    $err = false;
    if (!empty($fieldValue)) { // if field is not empty, if empty value is true. 
        $err = false; // No, there is no error. The field is set and not empty
    } else {
        $err = true; // Yes, there is a error, the field is empty.
    }
    return $err;
}

// Check the caracters of email with a regular expression 
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

// Prevent a SQL Injection by adding backslashes to the special caracthers. And you can't enter javascript: <script>alert(1)</script>" litteraly
function mysqlPrepare($value) {
    global $connection;
    $value = htmlspecialchars(trim($value));
    return $value;
}

// -------------------------------------
// Messages
// -------------------------------------

function loginSuccesMessage() {
    if (logged_in() && $_SESSION['justLoggedIn'] == true) {
        $_SESSION['justLoggedIn'] = false;
        return '<div class="alert alert-mygreen" role="alert"> Log in successful </div>';
    }
}

function logoutSuccesMessage() {
    if (!isset($_COOKIE[session_name()])){
        return '<div class="alert alert-mygrey" role="alert"> Log out successful </div>';
    }
}

 function loginFailMessage() {
    if (!empty($_SESSION['login_failed_message'])) {
        echo '<div class="alert alert-mygrey" role="alert">' . $_SESSION['login_failed_message'] . '</div>;';
    }
}

// -------------------------------------
// Readonly
// -------------------------------------

function editableForm() {
    $readonly = "readonly";
    if (isset($_POST["edit"]) && !empty($_POST["edit"])){
        return ""; // Editable, you can see the submit button
    } else {
        return "readonly "; // Not editable, you can see the edit button
    }
}

// -------------------------------------
// Button switches for the navigation bar
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
        //Before redirect to presentation/admin_page.php
        return '<a class="nav-link" class="my-profile" href="presentation/pageManager.php">Admin</a>';
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

function admin_area() {
    if (!logged_in() || !isAdmin()) {
        redirectTo("/../presentation/home.php");  
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


function memberArea() {   
    if (!logged_in()) {
        redirectTo("/../presentation/noAccess.php");
        die;
    }
}
