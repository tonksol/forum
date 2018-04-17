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
        $badge = $row["badge"];
        // UPDATE user SET firstName = '$firstname', prefix = '$prefix', lastName = '$lastname', birthday = '$birthday', email = '$email', userName = '$username', quote = '$quote'
        // WHERE userID = $userID;
        $query = "CALL proc_update_userinfo('$userID','$firstname', '$prefix', '$lastname', '$birthday', '$email', '$username', '$quote')";


        if (isset($userID)) {    
            mysqli_query($connection, $query);
        } else {
            $_SESSION['update_failed_message'] = 'chancing user information not successful';
        }
    }
  
    
    // update sql + id 
    // nieuwe data valideren 
    $userID = $_SESSION['user_id'];
    // to do : fix the userbadge for the userprofile
    // 2 queries combineren tot 1 d.m.v. joins 

     $query = "SELECT * FROM badge as b
     JOIN userBadge as ub ON b.badgeID = ub.badgeID
     WHERE ub.userID = $userID";

     $query = "SELECT * FROM user WHERE userID = $userID";
     
// "CALL proc_insert_new_user('tonksol@mail.com')";                  
    $result = mysqli_query($connection, $query);
    if ($result->num_rows > 0){
        // output data of each row. Using an multidimensional array to get all the badges
        // $array1 = array();
        // $i = 1;

        while ($row = $result->fetch_assoc()) {
            // $i++;

            $userId = $row["userID"];
            $firstname = $row["firstName"];
            $prefix = $row["prefix"];
            $lastname = $row["lastName"];
            $birthday = $row["birthday"];
            $userImage = $row["userImage"];
            $email = $row["email"];
            $username = $row["userName"];
            $quote = $row["quote"];
            // to do badge in multidimensioal array 
            // $badge = $array1[$row['badgeImage']];
            $query2 = "SELECT * FROM badge as b
            JOIN userBadge as ub ON b.badgeID = ub.badgeID
            WHERE ub.userID = $userID";
            // echo $query2;
            $result2 = mysqli_query($connection, $query2);
            while ($row = $result2->fetch_assoc()) {
                    $badge[] = $row['badgeImage'];
                    // var_dump($badge);
            }
        }
        // $userdata = $result->fetch_assoc();
        // $userid = $userdata['userID'];


            // $badge[$i]['badgeImage'] = $row["badgeImage"];

        
    } 
    