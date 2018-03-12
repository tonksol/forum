<?php
// write here all your functions
// bedenk goed wat er in een functie gaat en wat eruit komt 

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

// check of the username field is not empty


// check of the password field is not empty 

// prevent a SQL Injection by adding backslashes to some caracthers
function mysql_prepare ($value) {
    global $connection;
    $value = mysqli_real_escape_string($connection, htmlspecialchars(
        trim($value)));
    return $value;
}