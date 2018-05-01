<?php

// -------------------------------------
// CREATE
// -------------------------------------

function newReply($userID, $postID, $postcontent) {
    global $connection;
    $query = "INSERT INTO `reply` ( `userID`, `postID`, `replyContent`, `replyDate`, `replyTime`) 
                VALUES ($userID, $postID, '$postcontent', CURRENT_DATE, CURRENT_TIME);";

    // return mysqli_query($connection, $query);
    if (isset($userID)) {    
        // query uitvoeren 
        mysqli_query($connection, $query);
        // return mysqli_fetch_array($result);
    }
 }

// -------------------------------------
// READ
// -------------------------------------

function getReplies($postID) {
    global $connection;
    $query = "SELECT `user`.`userName`, `reply`.`replyDate`, `reply`.`replyTime`, `reply`.`replyContent`
        FROM `reply` 
        JOIN `user` ON `reply`.`userID` = `user`.`userID`
        WHERE postID = $postID
        ORDER BY `reply`.`replyDate`, `reply`.`replyTime` ASC";

    $result = mysqli_query($connection, $query);
    $replies = "";
    
        while ($row = mysqli_fetch_array($result)){
            $replies .=  ' <div class="container">';
            $replies .=  '     <div class="card" >';
            $replies .=  '        <div class="card-body"> ';
            $replies .=  '         <h5>Posted by: <b>' . $row['userName'] . '</b></h5>';
            $replies .=  '         <p class="card-text">' . $row['replyDate'] . '      ' . $row['replyTime'] . '<p>';
            $replies .=  '         <p class="card-text">' .  '<p>';
            $replies .=  '         <p class="card-text">' . $row['replyContent'] . '</p>';
            $replies .=  '     </div> ';
            $replies .=  '     </div> ';
            $replies .=  '     </div> ';
            $replies .=  ' <br> ';
        }
        return $replies;
}

// -------------------------------------
// UPDATE
// -------------------------------------


// -------------------------------------
// DELETE
// -------------------------------------

function deleteReply($replyID, $userID) {
    global $connection;
    $query= "DELETE FROM `reply` WHERE `replyID` = $replyID AND `userID` = $userID";
    return mysqli_query($connection, $query);
}