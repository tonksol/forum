<?php
require_once ("../include/functions.php");


	if (isset($_POST['submit'])) {
        
        $firstname = $_POST["firstName"];
        $prefix = $_POST["prefix"];
        $lastname = $_POST["lastName"];
        $birthday = $_POST["birthday"];
        $userImage = $_POST["userImage"];
        $email = $_POST["email"];
        $username = $_POST["userName"];
        $quote = $_POST["quote"];

        $query = "INSERT INTO user (firstName, prefix, lastName, birthday, userImage, email, userName, quote) 
        VALUES ('$firstname', '$prefix', '$lastname', '$birthday', '$userImage', '$email' '$username', '$quote');";

		mysqli_query($connection, $query); 
		$_SESSION['message'] = "Address saved"; 
		header('location: user_profile_html.php');
    }
    
    // update sql + id 
    // nieuwe data valideren 

$query = "SELECT * FROM user WHERE email = 'tonksol@gmail.com'";
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