<?php
// -------------------------------------
// CREATE
// -------------------------------------



// -------------------------------------
// READ
// -------------------------------------

function getPosts($topicID) {
    global $connection;
    $query = "SELECT `user`.`userName`, `post`.`postID`, `post`.`postName`, `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`
        FROM `post` 
        JOIN `user` ON `post`.`userID` = `user`.`userID`
        WHERE post.topicID = $topicID
        ORDER BY `post`.`lastModifiedPostDate` DESC, `post`.`lastModifiedPostTime` DESC";

    $result = mysqli_query($connection, $query);
    $posts = "";
    
        while ($row = mysqli_fetch_array($result)){
            $posts .= "<tr>";
            
            $posts .= '<td><p class="card-text"><a href=presentation/postReplies.php?postID=' . $row['postID'] . '>' . $row['postName'] . '</a></p></td>';
            // $posts .= "<td>" . $row['postName'] . "</td>";
            $posts .= "<td>" . $row['userName'] . "</td>";
            $posts .= '<td><p class="card-text">' . $row['lastModifiedPostDate'] . '      ' . $row['lastModifiedPostTime'] . '<p></td>';
            $posts .= "</tr>";
            
        }
        return $posts;
}

function getHotPosts() {
    global $connection;
    $query = "SELECT `topic`.`topicName`, `topic`.`topicID`, `post`.`postID`, `post`.`postName`, `user`.`userName`,`post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOfReplies`
        FROM `topic`
        JOIN `post` ON `topic`.`topicID` = `post`.`topicID`
        JOIN `user` ON `post`.`userID` = `user`.`userID`
        LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID` 
        GROUP BY `post`.`postName`
        ORDER BY `numberOfReplies` DESC LIMIT 5;";
    $result = mysqli_query($connection, $query);
    $hotPosts = "";
    
        while ($row = mysqli_fetch_array($result)){
            $hotPosts .= "<tr>";
            $hotPosts .= "<td><a href=presentation/topicPosts.php?topicID=" . $row['topicID'] . ">" . $row['topicName']."</a></td>";
            $hotPosts .= "<td><a href=presentation/postReplies.php?postID=" . $row['postID'] . ">" . $row['postName']."</a></td>";
            $hotPosts .= '<td>' . $row['userName'] . "</td>";
            $hotPosts .= "<td>" . $row['lastModifiedPostDate'] . "</td>";
            $hotPosts .= "<td>" . $row['numberOfReplies'] . "</td>";
            $hotPosts .= "</tr>";
            }
    return $hotPosts;
}


function getNewestPosts() {
    global $connection;
    $query = " SELECT `topic`.`topicName`, `topic`.`topicID`, `post`.`postID`, `post`.`postName`, `user`.`userName`,`post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOfReplies`
        FROM `topic`
        JOIN `post` ON `topic`.`topicID` = `post`.`topicID`
        JOIN `user` ON `post`.`userID` = `user`.`userID`
        LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID` 
            GROUP BY `post`.`postName`
            ORDER BY `post`.`lastModifiedPostDate` DESC, `post`.`lastModifiedPostTime` DESC LIMIT 5;";

    // add topic.. topic<posts<reply

    $result = mysqli_query($connection, $query);

    $newPosts = "";
    
        while ($row = mysqli_fetch_array($result)){
            $newPosts .= "<tr>";
            $newPosts .= "<td><a href=presentation/topicPosts.php?topicID=" . $row['topicID'] . ">" . $row['topicName']."</a></td>";
            $newPosts .= "<td><a href=presentation/postReplies.php?postID=" . $row['postID'] . ">" . $row['postName']."</a></td>";
            $newPosts .= '<td>' . $row['userName'] . "</td>";
            $newPosts .= "<td>" . $row['lastModifiedPostDate'] . "</td>";
            $newPosts .= "<td>" . $row['lastModifiedPostTime'] . "</td>";
            $newPosts .= "<td>" . $row['numberOfReplies'] . "</td>";
            $newPosts .= "</tr>";
            }
    return $newPosts;
}

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

// -------------------------------------
// UPDATE
// -------------------------------------

function newPost($userID, $topicID, $postName, $postcontent){
    global $connection;
    $query = "INSERT INTO `post` (`userID`,`topicID`, `postName` ,`postContent`, `lastModifiedPostDate`, `lastModifiedPostTime`)
            VALUES ($userID, $topicID, '$postName', '$postcontent', CURRENT_DATE, CURRENT_TIME);";
    if (isset($userID)) {
        $result = mysqli_query($connection, $query);
        if ($result) {
            return mysqli_insert_id($connection);
        }
    }
    
}


// -------------------------------------
// DELETE
// -------------------------------------