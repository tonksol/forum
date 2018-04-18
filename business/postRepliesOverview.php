<?php
require_once("../include/functions.php");



function getPosts($postID) {
    global $connection;
    $query = "SELECT post.postImage, user.userName, post.postName, post.postContent 
                FROM post JOIN user ON post.userID = user.userID WHERE postID = $postID";

    $result = mysqli_query($connection, $query);

    $newPosts = "";
    
        while ($row = mysqli_fetch_array($result)){
            
         //  $newPosts .= "<tr>";
         //  $newPosts .= "<td>" . $row['postImage'] . "</td>";
         //  $newPosts .= "<td>" . $row['userName'] . "</td>";
         //  $newPosts .= "<td>" . $row['postName'] . "</td>";
         //  $newPosts .= "<td>" . $row['postContent'] . "</td>";

         //  $newPosts .= "<dd><a href=postReplies.php?postName=" . $row['postName'] . ">" . $row['postName']."</a></dd>";
         //  $newPosts .= "</tr>";

            // $newPosts .=  ' <div class="container">';
            $newPosts .=  '     <div class="card" >';
            $newPosts .=  '         <img class="card-img-top" src=" ../images/' . $row['postImage'] . '" alt="Card image">';
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

function getReplies() {

    return $replies;
}

// mysqli_close($connection);

//  SELECT `topic`.`topicName`, `post`.`postName`, `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOFreplies`
//  FROM `topic`
//  JOIN `post` ON `topic`.`topicID` = `post`.`topicID`
//  LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID`
//  
//  GROUP BY `post`.`postName`
//  ORDER BY `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime` ASC
// 
// 
// 
// SELECT `topic`.`topicName`, `post`.`postName`, `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime`, COUNT(`reply`.`replyID`) as `numberOFreplies`
// 	FROM `topic`
//     JOIN `post` ON `topic`.`topicID` = `topic`.`topicID`
//     LEFT JOIN `reply` ON `post`.`postID` = `reply`.`postID`
//     GROUP BY `post`.`postName`
//     ORDER BY `post`.`lastModifiedPostDate`, `post`.`lastModifiedPostTime` ASC