<?php
// -------------------------------------
// CREATE
// -------------------------------------

// -------------------------------------
// READ
// -------------------------------------
function getHotPosts() {
    global $connection;
    $query = $query = "SELECT `topic`.`topicName`, `topic`.`topicID`, `post`.`postID`, `post`.`postName`, `user`.`userName`,`post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOfReplies`
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
            $hotPosts .= "<td>" . $row['lastModifiedPostTime'] . "</td>";
            $hotPosts .= "<td>" . $row['numberOfReplies'] . "</td>";
            $hotPosts .= "</tr>";
            }
    return $hotPosts;
        }


// -------------------------------------
// UPDATE
// -------------------------------------


// -------------------------------------
// DELETE
// -------------------------------------