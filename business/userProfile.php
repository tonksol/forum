<?php
require_once("../include/connection.php");
require_once ("../include/functions.php");

    
if (isset($_POST['submit'])) {
    
    updateUserInfo($_POST["userID"], $_POST["firstname"], $_POST["prefix"], $_POST["lastname"], $_POST["birthday"], $_POST["email"], $_POST["username"], $_POST["quote"]); 
}

// UPDATE THE USER INFO
    
function updateUserInfo($userID, $firstname, $prefix, $lastname, $birthday, $email, $username, $quote) {
    global $connection;
    $query = "CALL proc_update_userinfo('$userID','$firstname', '$prefix', '$lastname', '$birthday', '$email', '$username', '$quote')";
    
        if (isset($userID)) {    
            // query uitvoeren
            mysqli_query($connection, $query);
        } else {
            $_SESSION['update_failed_message'] = 'chancing user information not successful';
        }
    
}


function getBadges($userID) {    
    //$row = getUserBadges($userID);
    // global $connection; 
    $query2 = "CALL proc_select_the_badges('$userID')";
    // echo $userID;
    $connection2 = mysqli_connect('localhost', 'root', '');
    $db_select = mysqli_select_db($connection2, 'boardgames_db');
    // echo connectDatabase();
    //$query2 = "SELECT * FROM badge as b JOIN userBadge as ub ON b.badgeID = ub.badgeID WHERE ub.userID = $userID";  

    $result2 = mysqli_query($connection2, $query2);        
    // var_dump($result2);

    while ($row2 = $result2->fetch_array()) {
        $badge[] = $row2['badgeImage'];
    }
    return $badge;
}

// {} so php can correctly identify the variable. 

$userID = $_SESSION['user_id'];
$row = getUserProfile($userID); // row = array
$badges = getBadges($userID); // badges = array

    


    