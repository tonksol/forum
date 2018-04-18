<?php
// require_once("../include/connection.php");
require_once("../include/functions.php");



function getCategories() {
    global $connection;
    // $query = "SELECT * FROM `category`;";
    $query = "SELECT `category`.`categoryName`, `topic`.`topicName`, `topic`.`topicDescription`, COUNT(`post`.`topicID`) as 'numberOfPosts'
    FROM `post` 
    JOIN `topic` ON `topic`.`topicID` = `post`.`topicID`
    JOIN `category` ON `category`.`categoryID` = `topic`.`categoryID`
    WHERE `topic`.`topicID` = `post`.`topicID`
    GROUP BY `category`.`categoryName`, `topic`.`topicName`
    ORDER BY `category`.`categoryName`, `topic`.`topicName` ASC";

    $result = mysqli_query($connection, $query);

    $categories = "";
    
        while ($row = mysqli_fetch_array($result)){
            
            $categories .= "<tr>";
            $categories .= "<td>" . $row['categoryName'] . "</td>";
            $categories .= "<td>" . $row['topicName'] . "</td>";
            $categories .= "<td>" . $row['topicDescription'] . "</td>";
            $categories .= "<td>" . $row['numberOfPosts'] . "</td>";
            $categories .= "</tr>";
        }
    return $categories;
}
    

function getNumberOfposts() {
    global $connection;
    $query = "SELECT COUNT(`post`.`categoryID`) as 'numberOfPosts'
        FROM `post` 
        JOIN `category` ON `category`.`categoryID` = `post`.`categoryID`
        WHERE `category`.`categoryID` = `post`.`categoryID`
        GROUP BY `post`.`categoryID`";

    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)){
        return "<tr><td>" . $row['numberOfPosts'] . "</td></tr>";
    }
}




function getCategories1() {
    global $connection;
    $query = "SELECT * FROM `category`;";
    $result = mysqli_query($connection, $query);
    $categories = "";
        while ($row = mysqli_fetch_array($result)){
            
            $categories .= "<tr>";
            $categories .= "<td>" . $row['categoryName'] . "</td>";
            $categories .= "<td>" . $row['categoryDescription'] . "</td>";
            $categories .= "</tr>";
        }
    return $categories;
}

