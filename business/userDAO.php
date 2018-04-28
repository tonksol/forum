<?php

function getUserImage($imageUrl) {
    if ($imageUrl == "" || $imageUrl == NULL){
        return "images/profilepic0.png";       
    } else {
        return $imageUrl;
    }
}

// called on userProfile_page.php
function updateUserinfoFailMessage() {
    if (!empty($_SESSION['update_failed_message'])) {
        return '<div class="alert alert-mygrey" role="alert">' . $_SESSION['update_failed_message'] . '<br/></div>';
    }
}


function editSubmitButtonSwitch() {
    if (isset($_POST["edit"]) && !empty($_POST["edit"])) {
        return "<input class='btn btn-primary btn-block' type='submit' name='submit' value='submit'>";
        } else {  
        return "<input class='btn btn-primary btn-block' type='submit' name='edit' value='edit info'>";
    }
}