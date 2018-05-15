<?php
// -------------------------------------
// CREATE
// -------------------------------------


// -------------------------------------
// READ
// -------------------------------------

function getTopics($categoryID) {
    global $connection;
    $query = "CALL proc_getTopics(" . trim(mysqli_real_escape_string($connection, $categoryID)) . ")";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)){   // one row in array
        // $selected = $_POST['category'] == $row['category'] ? 'selected' : '';
        $topic = array('id' => $row['topicID'],
                        'name' => $row['topicName'],
                        'descroption' => $row['topicDescription']);
        $topics[] = $topic;
    }
    mysqli_next_result($connection);
    return $topics;  
}


function getTopicsForOverview() {
    global $connection;
    $query = "CALL proc_getTopicsForOverview()";
    $result = mysqli_query($connection, $query);
    $topics = ""; 
    while ($row = mysqli_fetch_array($result)){ 
        $topics .= "<tr>";
        $topics .= "<td><a href=presentation/topicPosts.php?topicID=" . $row['topicID'] . ">" . $row['topicName']."</a></td>";
        $topics .= "<td>" . $row['topicDescription'] . "</td>";
        $topics .= "<td>" . $row['numberOfPosts'] . "</td>";
        $topics .= "<td><a href=presentation/categoryTopics.php?categoryID=" . $row['categoryID'] . ">" . $row['categoryName']."</a></td>";
        $topics .= "</tr>";
    }
    mysqli_next_result($connection);
    return $topics;
}

// Used in topic DAO 
function getTopicsAndNumberOfPosts($categoryID) {
    global $connection;
     $query = "CALL proc_getTopicsAndNumberOfPosts(" . trim(mysqli_real_escape_string($connection, $categoryID)) . ")";
    $result = mysqli_query($connection, $query);
    $topics = "";
    while ($row = mysqli_fetch_array($result)){ 
        $topics .= "<tr>";
        // $topics .= "<td>" . $row['categoryName'] . "</td>";
        $topics .= "<td><a href=presentation/topicPosts.php?topicID=" . $row['topicID'] . ">" . $row['topicName']."</a></td>";
        $topics .= "<td>" . $row['topicDescription'] . "</td>";
        $topics .= "<td>" . $row['numberOfPosts'] . "</td>";
        $topics .= "</tr>";
    }
    mysqli_next_result($connection);
    return $topics;
}


function getSelectedTopicHead($topicID) {
    global $connection;
    $query = "CALL proc_getSelectedTopicHead(" . trim(mysqli_real_escape_string($connection, $topicID)) . ")";
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
    mysqli_next_result($connection);
    return $topicHead;
}


function getNumberOfPostsByTopic($topicID){
    global $connection;
    $query = "CALL proc_getNumberOfPostsByTopic(" . trim(mysqli_real_escape_string($connection, $topicID)) . ")";
    $result = mysqli_query($connection, $query);
    $numberOfPosts = "";  
    while ($row = mysqli_fetch_array($result)){
        $numberOfPosts .= "<tr>";   
        $numberOfPosts .= "<td>" . $row['numberOfPosts'] . "</td>";
        $numberOfPosts .= "</tr>";
    }
    mysqli_next_result($connection);
    return $numberOfPosts;
}

// -------------------------------------
// Update
// -------------------------------------

// -------------------------------------
// Delete
// -------------------------------------