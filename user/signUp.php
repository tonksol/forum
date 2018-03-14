<?php
require_once("../functions.php");
require_once("signUp_form.php");
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
        // PREPARE AND BIND THE STATEMENT (for query) 
            //  // bindParam() instead of bind_param because bindParam() can be used for other databases as well (PDO)

            // Step 1. Parsing the SQL statement: Verifies the SQL statement syntax and access rights and builds the best 
            // (optimized) execution plan for the SQL statement. Placeholder variables are not known at this point.
        $statement = $connection->prepare("INSERT INTO User (email, userName, userPassword) VALUES (?,?,?)");
            // Step 2. Binding variables: Where the API provides the actual values for placeholders. 
        $statement->bindParam(1, $email, PDO::PARAM_STR);
        $statement->bindParam(2, $user, PDO::PARAM_STR);
        $statement->bindParam(3, $user, PDO::PARAM_STR);
            // Step 3. Execution: Done with the selected execution plan and actual value of the placeholder variables.
        $statement->execute();
        $result = mysqli_query($connection, $statement);    
        if ($result) {
                echo "You got succesfully signed up! <br>";
                header("Location: /home.php");
                
            }
    }
    echo $error_message; // echo the error messages
} 
 ?> 