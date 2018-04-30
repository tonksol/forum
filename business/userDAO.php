<?php

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

function sessionExpire() {
    if (!isset($_SESSION['CREATED'])) {
        $_SESSION['CREATED'] = time();
    } else if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
        $_SESSION['CREATED'] = time();  // update creation time
        redirectTo("/business/logout.php");
    }
}

// -------------------------------------
// CREATE
// -------------------------------------

// -------------------------------------
// READ
// -------------------------------------

// -------------------------------------
// UPDATE
// -------------------------------------

// called on userProfile_page.php
function updateUserinfoFailMessage() {
    if (!empty($_SESSION['update_failed_message'])) {
        return '<div class="alert alert-mygrey" role="alert">' . $_SESSION['update_failed_message'] . '<br/></div>';
    }
}

// -------------------------------------
// DELETE
// -------------------------------------