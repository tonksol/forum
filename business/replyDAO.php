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
        $userID = trim(mysqli_real_escape_string($this->connection, $userID));
        $postID = trim(mysqli_real_escape_string($this->connection, $postID));
        $postcontent = trim(mysqli_real_escape_string($this->connection, $postcontent));
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
        $query = "CALL proc_getReplies(" . trim(mysqli_real_escape_string($this->connection, $postID)) . ")";
        $result = mysqli_query($this->connection, $query);
        $replies = array();
        while ($row = mysqli_fetch_array($result)) { // one row in array 
            $reply = array(
                'replyID' => htmlspecialchars(trim($row['replyID'])),
                'userID' => htmlspecialchars(trim($row['userID'])),
                'userName' => htmlspecialchars(trim($row['userName'])),
                'date' => htmlspecialchars(trim($row['replyDate'])),
                'time' => htmlspecialchars(trim($row['replyTime'])),
                'content' => htmlspecialchars(trim($row['replyContent']))
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
        $replyID = trim(mysqli_real_escape_string($this->connection, $replyID));
        $userID = trim(mysqli_real_escape_string($this->connection, $userID));
        $query = "CALL proc_deleteReply($replyID, $userID)";
        mysqli_query($this->connection, $query);
        mysqli_next_result($this->connection);
    }
}