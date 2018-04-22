<?php
require_once("../include/connection.php");
require_once ("../include/functions.php");

    
if (isset($_POST['submit'])) {
    
    updateUserInfo($_POST["userID"], $_POST["firstname"], $_POST["prefix"], $_POST["lastname"], $_POST["birthday"], $_POST["email"], $_POST["username"], $_POST["quote"]); 
}

// UPDATE - User info
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

// READ - Badges
function getBadges($userID) {    

    //$query2 = "SELECT * FROM badge as b JOIN userBadge as ub ON b.badgeID = ub.badgeID WHERE ub.userID = $userID";  
    $query2 = "CALL proc_select_the_badges('$userID')";
    // making a new connection because some how the stored procedure killed the connection
    $connection2 = mysqli_connect('localhost', 'root', '');
    $db_select = mysqli_select_db($connection2, 'boardgames_db');
    $result2 = mysqli_query($connection2, $query2);        
    while ($row2 = $result2->fetch_array()) {
        $badge[] = $row2['badgeImage'];
    }
    return $badge;
}

// READ - User info
function getUserProfile($userID) {
    global $connection;
    // SELECT * FROM user WHERE userID = $userID
    $query = "CALL proc_select_all_from_user('$userID')";
    $result = mysqli_query($connection, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }   
    return $row;
}

$userID = $_SESSION['user_id'];
$row = getUserProfile($userID); // row = array
$badges = getBadges($userID); // badges = array 