<?php
require_once(__DIR__ . "/../include/functions.php");

// $postID = $_GET['postID'];
$topicID = $_GET['topicID'];

function getSelectedTopicHead($topicID) {
    global $connection;
    $query = "SELECT `topic`.`topicName`, `topic`.`topicDescription`, `topic`.`topicID`, `category`.`categoryID`, `category`.`categoryName` 
        FROM `topic`  
        JOIN `category` ON `topic`.`categoryID` = `category`.`categoryID`
        WHERE `topicID` = $topicID";
    $result = mysqli_query($connection, $query);
    $topicHead = "";   
        while ($row = mysqli_fetch_array($result)){
            $topicHead .= '     <div class="card" >';
            $topicHead .= '        <div class="card-body"> ';
            $topicHead .= '             <h1 class="card-title">' . $row['topicName'] .'</h1>';
            $topicHead .= '             <p class="card-text"> in <a href=presentation/categoryTopics.php?categoryID=' . $row['categoryID'] . '>' . $row['categoryName'] . '</a></p>';
            $topicHead .= '             <p class="card-text">' . $row['topicDescription'] .'</p> ';
            $topicHead .= '         </div> ';
            $topicHead .= '     </div> ';
            $topicHead .= ' <br> ';
        }
    return $topicHead;
}



/*
function getSelectedTopicContent($topicID) {
    global $connection;
    $query = "SELECT `post`.`postImage`, `user`.`userName`, `post`.`postName`, `post`.`postContent` 
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
*/
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

// topic ID omdat je het tootnt bij de topics. 
// parameter
function getNumberOfPostsByTopic($topicID){
    global $connection;
    $query = "SELECT COUNT(*) as numberOfPosts        
        FROM `post` 
        WHERE post.topicID = $topicID
        GROUP BY post.topicID";

    $result = mysqli_query($connection, $query);
    $numberOfPosts = "";
    
        while ($row = mysqli_fetch_array($result)){
            $numberOfPosts .= "<tr>";   
            $numberOfPosts .= "<td>" . $row['numberOfPosts'] . "</td>";
            $numberOfPosts .= "</tr>";
        }
        return $numberOfPosts;

}