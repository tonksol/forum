<?php
// require_once("../include/connection.php");
require_once("../include/functions.php");



function getTopics() {
    global $connection;
    $query = "SELECT DISTINCT `category`.`categoryName`, `category`.`categoryDescription`, COUNT(`topic`.`categoryID`) as 'numberOfTopics'
        FROM `category` 
        JOIN `topic` ON `category`.`categoryID` = `topic`.`categoryID`
        WHERE `category`.`categoryID` = `topic`.`categoryID`
	    GROUP BY `topic`.`categoryID`
        ORDER BY `category`.`categoryName` ASC;";

    $result = mysqli_query($connection, $query);
    $topics = "";
    
        while ($row = mysqli_fetch_array($result)){ 
            $topics .= "<tr>";
            $topics .= "<td>" . $row['categoryName'] . "</td>";
            $topics .= "<td>" . $row['categoryDescription'] . "</td>";
            $topics .= "<td>" . $row['numberOfTopics'] . "</td>";
            $topics .= "</tr>";
        }
    return $topics;
}
