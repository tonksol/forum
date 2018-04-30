<?php
require_once(__DIR__ . "/../include/functions.php");


function getSelectedPostsHead($postID) {
    global $connection;
    $query = "SELECT `post`.`postName`, `user`.`userName`, DAYNAME(`post`.`lastModifiedPostDate`) as 'dayname',`post`.`lastModifiedPostDate`, `topic`.`topicName`, `topic`.`topicID` 
        FROM `post` JOIN `user` ON `post`.`userID` = `user`.`userID` 
        JOIN `topic` ON `topic`.`topicID` = `post`.`topicID`
        WHERE `postID` = $postID";
    $result = mysqli_query($connection, $query);
    $postHead = "";
    
        while ($row = mysqli_fetch_array($result)){
            $postHead .=  '<h3 class="card-title">' . $row['postName'] .'</h3> ';
            $postHead .=  '<h5>Posted by: <b>' . $row['userName'] . '</b></h5>';
            $postHead .=  '<p class="card-text">' . $row['dayname'] . ' '. $row['lastModifiedPostDate'];
            $postHead .=  ' in <a href=presentation/topicPosts.php?topicID=' . $row['topicID'] . '>' . $row['topicName'] . '</a></p>';
        }
    return $postHead;
}


function getSelectedPostsContent($postID) {
    global $connection;
    $query = "SELECT `post`.`postImage`, `user`.`userID`, `user`.`userName`, `post`.`postName`, `post`.`postContent` 
                FROM `post` JOIN `user` ON `post`.`userID` = `user`.`userID` WHERE `postID` = $postID";
    $result = mysqli_query($connection, $query);
    $newPosts = "";    
        while ($row = mysqli_fetch_array($result)){
            $newPosts .=  '     <div class="card" >';
            // $newPosts .=  '         <img class="card-img-top" src=" images/' . $row['postImage'] . '" alt="Card image">';
            $newPosts .=  '        <div class="card-body"> ';
            $newPosts .=  '         <p class="card-text">' . $row['postContent'] . '</p>';
            $newPosts .=  '     </div> ';
            $newPosts .=  ' </div> ';
            $newPosts .=  ' <br><br><br>';
        }
    return $newPosts;
}

/*
function getSelectedPosts($postID) {
    global $connection;
    $query = "SELECT `post`.`postImage`, `user`.`userName`, `post`.`postName`, `post`.`postContent` 
                FROM `post` JOIN `user` ON `post`.`userID` = `user`.`userID` WHERE `postID` = $postID";

    $result = mysqli_query($connection, $query);

    $newPosts = "";
    
        while ($row = mysqli_fetch_array($result)){

            // $newPosts .=  ' <div class="container">';
            $newPosts .=  '     <div class="card" >';
            // $newPosts .=  '         <img class="card-img-top" src=" images/' . $row['postImage'] . '" alt="Card image">';
            $newPosts .=  '        <div class="card-body"> ';
            $newPosts .=  '         <h3 class="card-title">' . $row['postName'] .'</h3> ';
        
            $newPosts .=  '         <h5>Posted by: <b>' . $row['userName'] . '</b></h5>';
            $newPosts .=  '         <p class="card-text">' . $row['postContent'] . '</p>';
       
            $newPosts .=  '     </div> ';
            $newPosts .=  ' </div> ';
            $newPosts .=  ' <br> ';


        }
    return $newPosts;
}
*/

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


// INSERT new reply



                

 function newReply($userID, $postID, $pagecontent) {
    global $connection;
    $query = "INSERT INTO `reply` ( `userID`, `postID`, `replyContent`, `replyDate`, `replyTime`) 
                VALUES ($userID, $postID, '$pagecontent', CURRENT_DATE, CURRENT_TIME);";

    // return mysqli_query($connection, $query);
    if (isset($userID)) {    
        // query uitvoeren 
        mysqli_query($connection, $query);
        // return mysqli_fetch_array($result);
    }
 }

 