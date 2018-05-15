<?php

class ReplyDAO {
    private $connection;
    function __CONSTRUCT($connection) {
        $this->connection = $connection;
    }
    // -------------------------------------
    // CREATE
    // -------------------------------------

    
    public function newReply($userID, $postID, $postcontent) {
        $userID = trim(mysqli_real_escape_string($connection, $userID));
        $postID = trim(mysqli_real_escape_string($connection, $postID));
        $postcontent = trim(mysqli_real_escape_string($connection, $postcontent));
        $query = "CALL proc_newReply($userID, $postID, '$postcontent')";
        if (isset($userID)) {                
            mysqli_query($this->connection, $query); // Execute query
            mysqli_next_result($this->connection);
        }
    }

    // -------------------------------------
    // READ
    // -------------------------------------

    public function getReplies($postID) {
        $query = "CALL proc_getReplies(" . trim(mysqli_real_escape_string($connection, $postID)) . ")";
        $result = mysqli_query($this->connection, $query);
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
        mysqli_next_result($this->connection);
        return $replies;
    }

    // -------------------------------------
    // UPDATE
    // -------------------------------------


    // -------------------------------------
    // DELETE
    // -------------------------------------

    public function deleteReply($replyID, $userID) {
        $replyID = trim(mysqli_real_escape_string($connection, $replyID));
        $userID = trim(mysqli_real_escape_string($connection, $userID));
        $query = "CALL proc_deleteReply($replyID, $userID)";
        mysqli_query($this->connection, $query);
        mysqli_next_result($this->connection);
    }
}