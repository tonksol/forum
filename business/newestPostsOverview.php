<?php
// require_once("../include/connection.php");
require_once("../include/functions.php");



function getNewestPosts() {
    global $connection;
    $query = "SELECT `post`.`postName`, `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOFreplies`
    FROM `post`
    LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID`
    GROUP BY `post`.`postName`
    ORDER BY `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime` ASC";

    // add topic.. topic<posts<reply

    $result = mysqli_query($connection, $query);

    $newPosts = "";
    
        while ($row = mysqli_fetch_array($result)){
            
            $newPosts .= "<tr>";
            $newPosts .= "<td>" . $row['topicName'] . "</td>";
            $newPosts .= "<td>" . $row['postName'] . "</td>";
            $newPosts .= "<td>" . $row['lastModifiedPostDate'] . "</td>";
            $newPosts .= "<td>" . $row['lastModifiedPostTime'] . "</td>";
            $newPosts .= "<td>" . $row['numberOfReplies'] . "</td>";
            $newPosts .= "</tr>";
        }
    return $newPosts;
}

// SELECT `topic`.`topicName`, `post`.`postName`, `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOFreplies`
// FROM `topic`
// JOIN `post` ON `topic`.`topicID` = `post`.`topicID`
// LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID`
// 
// GROUP BY `post`.`postName`
// ORDER BY `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime` ASC