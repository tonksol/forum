<?php
require_once("functions.php");
require_once("include/connection.php");

$error = false; 
$error_message = "";
$msg_email_is_empty = "";
$msg_username_is_empty = "";
$msg_password_is_empty = "";
$msg_not_an_email = "";

if (isset($_POST["submit"])) {
    // declare variables
    $email      =     mysqlPrepare($_POST["email"]);        //prevent javascipt and sql injection for email
    $userName   =     mysqlPrepare($_POST["username"]);     //prevent javascipt and sql injection for username
    $password   =     mysqlPrepare($_POST["password"]);     //prevent javascipt and sql injection for password
    // $connection = new PDO('mysql:host=localhost;dbname=boardgames_db', $email, $userName, $password);

    // put the result of the function in the variable. Result can be true or false
    // $error1 = fieldNotEmpty($email);
    // $error2 = fieldNotEmpty($userName);
    // $error3 = fieldNotEmpty($password);

    // check what field is empty and tell the user what field is empty 
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
        $msg_not_an_email .= '<div class="alert alert-warning" role="alert">Oops, this doesn\'t look like an email adress. Here is an example for you: name@example.com <br></div>';
    } else {
        $error = false;
    }


    if ($error) { // $error = true
        $error_message .= '<div class="alert alert-danger" role="alert"><b> Unsuccesful sign up! </b></div>';
    } else {
        // PREPARE AND BIND THE STATEMENT (for query) 
            //  // bindParam() instead of bind_param because bindParam() can be used for other databases as well (PDO)

            // Step 1. Parsing the SQL statement: Verifies the SQL statement syntax and access rights and builds the best 
            // (optimized) execution plan for the SQL statement. Placeholder variables are not known at this point.
        $statement = $connection->prepare("INSERT INTO User (email, userName, userPassword) VALUES (?,?,?)");
            // Step 2. Binding variables: Where the API provides the actual values for placeholders. 
        $statement->bindParam(1, $email, PDO::PARAM_STR);
        $statement->bindParam(2, $userName, PDO::PARAM_STR);
        $statement->bindParam(3, $password, PDO::PARAM_STR);
            // Step 3. Execution: Done with the selected execution plan and actual value of the placeholder variables.
        $statement->execute();

                echo "You got succesfully signed up! <br>";
                redirectTo("/../presentation/home.php");
                // http://localhost:41062/www/Forum/home.php

    }

    echo $error_message;  // echo the error messages
                
} 
 ?> 