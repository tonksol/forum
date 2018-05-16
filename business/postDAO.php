<?php
require_once(__DIR__ . "/../include/functions.php");

// -------------------------------------
// CREATE
// -------------------------------------



// -------------------------------------
// READ
// -------------------------------------

function getPosts($topicID) {
    global $connection;
    $query = "CALL proc_getPosts(" . trim(mysqli_real_escape_string($connection, $topicID)) . ")";
    $result = mysqli_query($connection, $query);
    $posts = "";
    while ($row = mysqli_fetch_array($result)){
        $posts .= "<tr>";
        $posts .= '<td><p class="card-text"><a href=presentation/postReplies.php?postID=' . mysqlPrepare($row['postID']) . '>' . mysqlPrepare($row['postName']) . '</a></p></td>';
        $posts .= "<td>" . mysqlPrepare($row['userName']) . "</td>";
        $posts .= '<td><p class="card-text">' . mysqlPrepare($row['lastModifiedPostDate']) . '      ' . mysqlPrepare($row['lastModifiedPostTime']) . '<p></td>';
        $posts .= "</tr>";
        
    }
    mysqli_next_result($connection);
    return $posts;
}


function getHotPosts() {
    global $connection;
    $query = "CALL proc_getHotPosts()";
    $result = mysqli_query($connection, $query);
    $hotPosts = "";  
    while ($row = mysqli_fetch_array($result)){
        $hotPosts .= "<tr>";
        $hotPosts .= "<td><a href=presentation/topicPosts.php?topicID=" . mysqlPrepare($row['topicID']) . ">" . mysqlPrepare($row['topicName']) . "</a></td>";
        $hotPosts .= "<td><a href=presentation/postReplies.php?postID=" . mysqlPrepare($row['postID']) . ">" . mysqlPrepare($row['postName']) . "</a></td>";
        $hotPosts .= '<td>' . mysqlPrepare($row['userName']) . "</td>";
        $hotPosts .= "<td>" . mysqlPrepare($row['lastModifiedPostDate']) . "</td>";
        $hotPosts .= "<td>" . mysqlPrepare($row['numberOfReplies']) . "</td>";
        $hotPosts .= "</tr>";
    }
    mysqli_next_result($connection);
    return $hotPosts;
}


function getNewestPosts() {
    global $connection;
    $query ="CALL proc_getNewestPosts()";
    $result = mysqli_query($connection, $query);
    $newPosts = "";  
    while ($row = mysqli_fetch_array($result)){
        $newPosts .= "<tr>";
        $newPosts .= "<td><a href=presentation/topicPosts.php?topicID=" . mysqlPrepare($row['topicID']) . ">" . mysqlPrepare($row['topicName']) . "</a></td>";
        $newPosts .= "<td><a href=presentation/postReplies.php?postID=" . mysqlPrepare($row['postID']) . ">" . mysqlPrepare($row['postName']) . "</a></td>";
        $newPosts .= '<td>' . mysqlPrepare($row['userName']) . "</td>";
        $newPosts .= "<td>" . mysqlPrepare($row['lastModifiedPostDate']) . "</td>";
        $newPosts .= "<td>" . mysqlPrepare($row['lastModifiedPostTime']) . "</td>";
        $newPosts .= "<td>" . mysqlPrepare($row['numberOfReplies']) . "</td>";
        $newPosts .= "</tr>";
    }
    mysqli_next_result($connection);
    return $newPosts;
}


function getSelectedPostsHead($postID) {
    global $connection;
    $query = "CALL proc_getSelectedPostsHead(" . trim(mysqli_real_escape_string($connection, $postID)) . ")";
    $result = mysqli_query($connection, $query);
    $postHead = "";
    while ($row = mysqli_fetch_array($result)){
        $postHead .=  '<h3 class="card-title">' . mysqlPrepare($row['postName']) .'</h3> ';
        $postHead .=  '<h5>Posted by: <b>' . mysqlPrepare($row['userName']) . '</b></h5>';
        $postHead .=  '<p class="card-text">' . mysqlPrepare($row['dayname']) . ' '. mysqlPrepare($row['lastModifiedPostDate']);
        $postHead .=  ' in <a href=presentation/topicPosts.php?topicID=' . mysqlPrepare($row['topicID']) . '>' . mysqlPrepare($row['topicName']) . '</a></p>';
    }
    mysqli_next_result($connection);
    return $postHead;
}

function getSelectedPostsContent($postID) {
    global $connection;
    $query = "CALL proc_getSelectedPostsContent(" . trim(mysqli_real_escape_string($connection, $postID)) . ")";
    $result = mysqli_query($connection, $query);
    $newPosts = "";    
    while ($row = mysqli_fetch_array($result)){
        $newPosts .=  '     <div class="card" >';
        $newPosts .=  '        <div class="card-body"> ';
        $newPosts .=  '         <p class="card-text">' . mysqlPrepare($row['postContent']) . '</p>';
        $newPosts .=  '     </div> ';
        $newPosts .=  ' </div> ';
        $newPosts .=  ' <br><br><br>';
    }
    mysqli_next_result($connection);
    return $newPosts;
}

// -------------------------------------
// UPDATE
// -------------------------------------

function newPost($userID, $topicID, $postName, $postcontent){
    global $connection;
    $userID = trim(mysqli_real_escape_string($connection, $userID));
    $topicID = trim(mysqli_real_escape_string($connection, $topicID));
    $postName = trim(mysqli_real_escape_string($connection, $postName));
    $postcontent = trim(mysqli_real_escape_string($connection, $postcontent));
     $query = "CALL proc_newPost($userID, $topicID, '$postName', '$postcontent')";
    if (isset($userID)) {
        $result = mysqli_query($connection, $query);
        if ($result) {
            $postID = mysqli_insert_id($connection);
            mysqli_next_result($connection);
            return $postID;
        }
    }   
}


// -------------------------------------
// DELETE
// -------------------------------------