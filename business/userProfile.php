<?php
    require_once("../include/connection.php");
    require_once ("../include/functions.php");
	if (isset($_POST['submit'])) {
        $userID = $_POST["userID"]; // is de id meegegeven
        $firstname = $_POST["firstname"];
        $prefix = $_POST["prefix"];
        $lastname = $_POST["lastname"];
        $birthday = $_POST["birthday"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $quote = $_POST["quote"];
        // UPDATE user SET firstName = '$firstname', prefix = '$prefix', lastName = '$lastname', birthday = '$birthday', email = '$email', userName = '$username', quote = '$quote'
        // WHERE userID = $userID;
        $query = "CALL proc_update_userinfo('$userID','$firstname', '$prefix', '$lastname', '$birthday', '$email', '$username', '$quote')";


        if (isset($userID)) {    
            mysqli_query($connection, $query);
        } else {
            $_SESSION['update_failed_message'] = 'chancing user information not successful';
        }
    }
  
    $userID = $_SESSION['user_id'];



    $row = getUserProfile($userID);
    //$row = getUserBadges($userID);


    // global $connection; 
    $query2 = "CALL proc_select_the_badges('$userID')";
    // echo $userID;
    $connection2 = mysqli_connect('localhost', 'root', '');
    $db_select = mysqli_select_db($connection2, 'boardgames_db');
   // echo connectDatabase();
    //$query2 = "SELECT * FROM badge as b JOIN userBadge as ub ON b.badgeID = ub.badgeID WHERE ub.userID = $userID";  

    $result2 = mysqli_query($connection2, $query2);        
    var_dump($result2);
    
    while ($row2 = $result2->fetch_array()) {
        $badge[] = $row2['badgeImage'];
    }

    


    