<?php
require_once(__DIR__ . "/../include/functions.php");

function getCategoryHead($categoryID){
    global $connection;
    
    $query = "SELECT * FROM category WHERE categoryID = $categoryID";
    $result = mysqli_query($connection, $query);
    $category = "";

    while ($row = mysqli_fetch_array($result)){
        $category .= '     <div class="card" >';
        $category .= '        <div class="card-body"> ';
        $category .= '             <h1 class="card-title">' . $row['categoryName'] .'</h1>';

        $category .= '             <p class="card-text">' . $row['categoryDescription'] .'</p> ';
        $category .= '         </div> ';
        $category .= '     </div> ';

        $category .= ' <br> ';
    }
    return $category;
}

// topic DAO 
function getPostsOverviewFromTopic($categoryID) {
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


function getNumberOfTopicsForCategory() {
    global $connection;
    $categoryID = $_GET['categoryID'];
    $query = "SELECT DISTINCT  `category`.`categoryName`, `topic`.`topicName`, COUNT(`topic`.`categoryID`) as 'numberOfTopics'
    FROM `topic` 
    JOIN `category` ON `category`.`categoryID` = `topic`.`categoryID`
    WHERE `topic`.`categoryID` = $categoryID
    GROUP BY `topic`.`categoryID`
    ORDER BY `category`.`categoryName` ASC;";

    $result = mysqli_query($connection, $query);
    $numberOfTopics = "";
    
        while ($row = mysqli_fetch_array($result)){ 
            $numberOfTopics .=  $row['numberOfTopics'];         
        }
    return $numberOfTopics;
}
