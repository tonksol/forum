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
        $query = "CALL proc_newReply($userID, $postID, '$postcontent')";
        // return mysqli_query($connection, $query);
        if (isset($userID)) {    
            // query uitvoeren 
            mysqli_query($this->connection, $query);
            mysqli_next_result($this->connection);
            // return mysqli_fetch_array($result);
        }
    }

    // -------------------------------------
    // READ
    // -------------------------------------

    public function getReplies($postID) {
        $query = "CALL proc_getReplies($postID)";
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
        $query = " CALL proc_deleteReply($replyID, $userID)";
        mysqli_query($this->connection, $query);
        mysqli_next_result($this->connection);
    }
}