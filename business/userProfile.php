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

    // SELECT * FROM user WHERE userID = $userID
    // CALL proc_select_all_from_user('$userId')
    $query = "CALL proc_select_all_from_user('$userID')";
            // $query2 = "CALL proc_select_the_badges('$userID')";
                // SELECT * FROM badge as b JOIN userBadge as ub ON b.badgeID = ub.badgeID WHERE ub.userID = $userID
                // TO DO: change query to stored procedure. Stored procudure is working. 
     $query2 = "SELECT * FROM badge as b JOIN userBadge as ub ON b.badgeID = ub.badgeID WHERE ub.userID = $userID";  
    
    $result2 = mysqli_query($connection, $query2);        
        //var_dump($result2);
    $result = mysqli_query($connection, $query);
        // var_dump($result);
    
    // var_dump($result);
    if ($result->num_rows > 0){
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

            // SELECT * FROM badge as b JOIN userBadge as ub ON b.badgeID = ub.badgeID WHERE ub.userID = $userID
            // CALL proc_select_the_badges('$userID')
           
        
             while ($row2 = $result2->fetch_array()) {
                    $badge[] = $row2['badgeImage'];
             }
        }
        
    } 
    