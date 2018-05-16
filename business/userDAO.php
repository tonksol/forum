<?php
require_once(__DIR__ . "/../include/functions.php");

function getUserImage($imageUrl) {
    if ($imageUrl == "" || $imageUrl == NULL){
        return "images/profilepic0.png";       
    } else {
        return $imageUrl;
    }
}


function editSubmitButtonSwitch() {
    if (isset($_POST["edit"]) && !empty($_POST["edit"])) {
        return "<input class='btn btn-primary btn-block' type='submit' name='submit' value='submit'>";
        } else {  
        return "<input class='btn btn-primary btn-block' type='submit' name='edit' value='edit info'>";
    }
}

// -------------------------------------
// CREATE
// -------------------------------------

// -------------------------------------
// READ
// -------------------------------------

function getUserProfile($userID) {
    global $connection;
    $query = "CALL proc_select_all_from_user(". trim(mysqli_real_escape_string($connection, $userID)). ")";
    $result = mysqli_query($connection, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }  
    mysqli_next_result($connection); 
    return $row;
}
// -------------------------------------
// UPDATE
// -------------------------------------

// Used on userProfile_page.php
function updateUserinfoFailMessage() {
    if (!empty($_SESSION['update_failed_message'])) {
        return '<div class="alert alert-mygrey" role="alert">' . $_SESSION['update_failed_message'] . '<br/></div>';
    }
}


function updateUserInfo($userID, $firstname, $prefix, $lastname, $birthday, $email, $username, $quote) {
    global $connection;
    $userID = trim(mysqli_real_escape_string($connection, $userID));
    $firstname = trim(mysqli_real_escape_string($connection, $firstname));
    $prefix = trim(mysqli_real_escape_string($connection, $prefix));
    $lastname = trim(mysqli_real_escape_string($connection, $lastname));
    $birthday = trim(mysqli_real_escape_string($connection, $birthday));
    $email = trim(mysqli_real_escape_string($connection, $email));
    $username = trim(mysqli_real_escape_string($connection, $username));
    $quote = trim(mysqli_real_escape_string($connection, $quote));
    $query = "CALL proc_update_userinfo($userID, '$firstname', '$prefix', '$lastname', '$birthday', '$email', '$username', '$quote')";
        if (isset($userID)) {    
            mysqli_query($connection, $query);
            mysqli_next_result($connection);
        } else {
            $_SESSION['update_failed_message'] = 'chancing user information not successful';
        }
    
}

// -------------------------------------
// DELETE
// -------------------------------------