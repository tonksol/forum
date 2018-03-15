<?php
    require_once ("../functions.php");
    $error = false;
    $error_message = "";

            
    if (isset($_POST["submit"])) {

        $email          =     mysql_prepare($_POST["email"]);        //prevent javascipt and sql injection for email    
        $password       =     mysql_prepare($_POST["password"]);    //prevent javascipt and sql injection for password
        $db_email       =     $connection->prepare("SELECT email FROM `User` WHERE email = $email");
        $db_password    =     $connection->prepare("SELECT email FROM `User` WHERE userPassword = $password");


        // check of the fields are not empty
        if (field_not_empty($email)) {
            $error = true;
            $error_message .= '<br><div class="alert alert-warning" role="alert"> The email field is empty.<br></div>';            
        } if (field_not_empty($password)) {
            $error = true;
            $error_message .= '<div class="alert alert-warning" role="alert"> The password field is empty. <br></div>';
        } else {
            $error = false;
        }


        // Check the characters of email. Returns true or false
        if (validate_email($email)) {
            $error = true;
            $error_message .= '<div class="alert alert-warning" role="alert"> Oops, this doesn\'t look like an email adress. Here is an example for you: name@example.com <br></div>';
        } else {
            $error = false;
        }


        // check the email and password with db
        if ($email = $db_email){
            $error = false;
        } else {
            $error = true;
            $error_message .= '<div class="alert alert-warning" role="alert"> the email doesn\'t exist </div>';
        }

        if ($password = $db_password){
            $error = false;
        } else {
            $error = true;
            $error_message .= '<div class="alert alert-warning" role="alert"> the email doesn\'t exist </div>';
        }


        // When $error is false log in
        if ($error) { // $error = true
            $error_message .= '<div class="alert alert-danger" role="alert"><b> Unsuccesful log in! </b></div>';
        } else {
            // PREPARE AND BIND THE STATEMENT (for query) 
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
        echo $error_message;  // echo the error messages

    } // end of if (isset)