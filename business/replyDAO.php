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
    $query = "SELECT `user`.`userName`, `reply`.`replyID`, `reply`.`userID`, `reply`.`replyDate`, `reply`.`replyTime`, `reply`.`replyContent`
        FROM `reply` 
        JOIN `user` ON `reply`.`userID` = `user`.`userID`
        WHERE postID = $postID
        ORDER BY `reply`.`replyDate`, `reply`.`replyTime` ASC";
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