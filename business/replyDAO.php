<?php

// -------------------------------------
// CREATE
// -------------------------------------

// TO DO JONATHAN VRAGEN stored procedure
function newReply($userID, $postID, $postcontent) {
    global $connection;
    // $query = "INSERT INTO `reply` ( `userID`, `postID`, `replyContent`, `replyDate`, `replyTime`) 
    //             VALUES ($userID, $postID, '$postcontent', CURRENT_DATE, CURRENT_TIME);";

    $query = "CALL proc_newReply($userID, $postID, '$postcontent')";

    // return mysqli_query($connection, $query);
    if (isset($userID)) {    
        // query uitvoeren 
        mysqli_query($connection, $query);
        mysqli_next_result($connection);
        // return mysqli_fetch_array($result);
    }
 }

// -------------------------------------
// READ
// -------------------------------------

// TO DO Jonathan VRAGEN stored procedure
function getReplies($postID) {
    global $connection;
    // $query = "SELECT `user`.`userName`, `reply`.`replyID`, `reply`.`userID`, `reply`.`replyDate`, `reply`.`replyTime`, `reply`.`replyContent`
    //     FROM `reply` 
    //     JOIN `user` ON `reply`.`userID` = `user`.`userID`
    //     WHERE postID = $postID
    //     ORDER BY `reply`.`replyDate`, `reply`.`replyTime` ASC";
    $query = "CALL proc_getReplies($postID)";
    $result = mysqli_query($connection, $query);
    $replies = array();
    while ($row = mysqli_fetch_array($result)) { // one row in array 
        $reply = array(
            'replyID' => $row['replyID'],
            'userID' => $row['userID'],
            'userName' => $row['userName'],
            'date' => $row['replyDate'],
            'time' => $row['replyTime'],
            'content' => $row['replyContent']
        );
        $replies[] = $reply;
    }
    mysqli_next_result($connection);
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
    // $query= "DELETE FROM `reply` WHERE `replyID` = $replyID AND `userID` = $userID";
    $query = " CALL proc_deleteReply($replyID, $userID)";
    return mysqli_query($connection, $query);
    mysqli_next_result($connection);
}