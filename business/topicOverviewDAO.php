<?php
require_once(__DIR__ . "/../include/functions.php");



function getTopicsForOverview() {
    global $connection;
    $query = "SELECT category.categoryID, category.categoryName, topic.topicID, topic.topicName, topic.topicDescription, COUNT(post.topicID) as numberOfPosts
        FROM `topic` 
        JOIN category ON topic.categoryID = category.categoryID
        JOIN post on topic.topicID = post.topicID
        GROUP BY topic.topicID";

    $result = mysqli_query($connection, $query);
    $topics = "";
    
        while ($row = mysqli_fetch_array($result)){ 
            $topics .= "<tr>";
            $topics .= "<td><a href=presentation/topicPosts.php?topicID=" . $row['topicID'] . ">" . $row['topicName']."</a></td>";
            $topics .= "<td>" . $row['topicDescription'] . "</td>";
            $topics .= "<td>" . $row['numberOfPosts'] . "</td>";
            // $topics .= "<td>" . $row['categoryName'] . "</td>";
            $topics .= "<td><a href=presentation/categoryTopics.php?categoryID=" . $row['categoryID'] . ">" . $row['categoryName']."</a></td>";
            $topics .= "</tr>";
        }
    return $topics;
}
// <a href=presentation/postReplies.php?postID=" . $row['postID'] . ">" . $row['postName']."</a>

