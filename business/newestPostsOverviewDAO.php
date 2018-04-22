<?php
require_once(__DIR__ . "/../include/functions.php");



function getNewestPosts() {
    global $connection;
    $query = " SELECT `topic`.`topicName`, `topic`.`topicID`, `post`.`postID`, `post`.`postName`, `user`.`userName`,`post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOfReplies`
        FROM `topic`
        JOIN `post` ON `topic`.`topicID` = `post`.`topicID`
        JOIN `user` ON `post`.`userID` = `user`.`userID`
        LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID` 
            GROUP BY `post`.`postName`
            ORDER BY `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime` ASC LIMIT 5;";

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

// mysqli_close($connection);
  
// SELECT `topic`.`topicName`, `post`.`postName`, `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOFreplies`
//   FROM `topic`
//   JOIN `post` ON `topic`.`topicID` = `post`.`topicID`
//   LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID`
//   
//   GROUP BY `post`.`postName`
//   ORDER BY `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime` ASC
//  
//  
//  
//  SELECT `topic`.`topicName`, `post`.`postName`, `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOFreplies`
//  	FROM `topic`
//      JOIN `post` ON `topic`.`topicID` = `topic`.`topicID`
//      LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID`
//      GROUP BY `post`.`postName`
//      ORDER BY `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime` ASC