<?php
// -------------------------------------
// CREATE
// -------------------------------------


// -------------------------------------
// READ
// -------------------------------------

function getTopics($categoryID) {
    global $connection;
    $query = "SELECT * FROM `topic` WHERE categoryID = $categoryID;";
    $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)){   // one row in array
            // $selected = $_POST['category'] == $row['category'] ? 'selected' : '';
            $topic = array('id' => $row['topicID'],
                                    'name' => $row['topicName'],
                                    'descroption' => $row['topicDescription']);
            $topics[] = $topic;
        }
    return $topics;  
}

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

// topic DAO 

function getTopicsAndNumberOfPosts($categoryID) {
    global $connection;
    $query = "SELECT DISTINCT  `topic`.`topicID`, `topic`.`topicName`, `topic`.`topicDescription`, COUNT(`post`.`topicID`) as 'numberOfPosts'
        FROM `topic` 
        JOIN `post` ON `post`.`topicID` = `topic`.`topicID`
        WHERE `topic`.`categoryID` = $categoryID
        GROUP BY `post`.`topicID`
        ORDER BY `post`.`postName` ASC;";

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
    return $topics;
}


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

// -------------------------------------
// Update
// -------------------------------------

// -------------------------------------
// Delete
// -------------------------------------