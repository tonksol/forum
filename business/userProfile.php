<?php
    require_once("../include/connection.php");
    require_once ("../include/functions.php");
	if (isset($_POST['submit'])) {
        $userID = $_POST["userID"]; // is de id meegegeven
        $firstname = $_POST["firstname"];
        $prefix = $_POST["prefix"];
        $lastname = $_POST["lastname"];
        $birthday = $_POST["birthday"];
        // $userImage = $_POST["userImage"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $quote = $_POST["quote"];

        // add `quote` = '$quote' to the set. 
        $query = "UPDATE user
            SET firstName = '$firstname', prefix = '$prefix', lastName = '$lastname', birthday = '$birthday', email = '$email', userName = '$username', quote = '$quote'
            WHERE userID = $userID;";

// , birthday = '$birthday', email = '$email', userName = '$username', quote = '$quote'

        // veranderen naar update if geen id dan KAPOT anders update 
        // $query = "INSERT INTO user (firstName, prefix, lastName, birthday, userImage, email, userName, quote) 
        // VALUES ('$firstname', '$prefix', '$lastname', '$birthday', '$userImage', '$email' '$username', '$quote');";
        if (isset($userID)) {       
            
            echo $firstname;     
            mysqli_query($connection, $query);
        } else {
            $_SESSION['update_failed_message'] = 'chancing user information not successful';
        }
    }
    
    // update sql + id 
    // nieuwe data valideren 
    $userID = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE userID = $userID";
// "CALL proc_insert_new_user('tonksol@mail.com')";                  
    $result = mysqli_query($connection, $query);
    if ($result->num_rows > 0){
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $userId = $row["userID"];
            $firstname = $row["firstName"];
            $prefix = $row["prefix"];
            $lastname = $row["lastName"];
            $birthday = $row["birthday"];
            $userImage = $row["userImage"];
            $email = $row["email"];
            $username = $row["userName"];
            $quote = $row["quote"];
        }
    } 