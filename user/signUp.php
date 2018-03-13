<?php
require_once("./functions.php");
require_once("signUp_form.html");
$error = false; 
$error_message = "";

if (isset($_POST["submit"])) {
    // declare variables
    $email      =     mysql_prepare($_POST["email"]);        //prevent javascipt and sql injection for email
    $userName   =     mysql_prepare($_POST["username"]);     //prevent javascipt and sql injection for username
    $password   =     mysql_prepare($_POST["password"]);     //prevent javascipt and sql injection for password

    // put the result of the function in the variable. Result can be true or false
    // $error1 = field_not_empty($email);
    // $error2 = field_not_empty($userName);
    // $error3 = field_not_empty($password);

    // check what field is empty and tell the user what field is empty 
    if (field_not_empty($email)) {
        $error = true;
        $error_message .= "The email field is empty. <br>";
        
    } if (field_not_empty($userName)) {
        $error = true;
        $error_message .= "The username field is empty. <br>";
    } if (field_not_empty($password)) {
        $error = true;
        $error_message .= "The password field is empty. <br>";
    } else {
        $error = false;
    }

    // Check the characters of email. Returns true or false
    if (validate_email($email)) {
        $error = true;
        $error_message .= "Oops, this doesn't look like an email adress. Here is an example for you: name@example.com <br>";
    } else {
        $error = false;
    }


    if ($error) { // $error = true
        $error_message .= "<br><b> Unsuccesful sign up! </b>";
    } else {
        // prepare and bind statement for query
        $statement = $connection->prepare("INSERT INTO User (email, userName, userPassword) VALUES (?,?,?)");
        $statement->bindParam("sss", $email, $userName, $password);
        // bindParam() instead of bind_param because bindParam() can be used for other databases as well (PDO)
        $result = mysqli_query($connection, $statement);    
        if ($result) {
                echo "You got succesfully signed up! <br>";
            }
    }
    echo $error_message; // echo the error messages
} 
 ?> 