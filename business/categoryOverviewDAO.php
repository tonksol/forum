<?php
require_once(__DIR__ . "/../include/functions.php");



function getTopicsForOverview() {
    global $connection;
    $query = "SELECT DISTINCT `category`.`categoryID`, `category`.`categoryName`, `category`.`categoryDescription`, COUNT(`topic`.`categoryID`) as 'numberOfTopics'
        FROM `category` 
        JOIN `topic` ON `category`.`categoryID` = `topic`.`categoryID`
        WHERE `category`.`categoryID` = `topic`.`categoryID`
	    GROUP BY `topic`.`categoryID`
        ORDER BY `category`.`categoryName` ASC;";

    $result = mysqli_query($connection, $query);
    $topics = "";
    
        while ($row = mysqli_fetch_array($result)){ 
            $topics .= "<tr>";
            // $topics .= "<td>" . $row['categoryName'] . "</td>";
            $topics .= "<td><a href=presentation/categoryTopics.php?categoryID=" . $row['categoryID'] . ">" . $row['categoryName']."</a></td>";
            $topics .= "<td>" . $row['categoryDescription'] . "</td>";
            $topics .= "<td>" . $row['numberOfTopics'] . "</td>";
            $topics .= "</tr>";
        }
    return $topics;
}
// <a href=postReplies.php?postID=" . $row['postID'] . ">" . $row['postName']."</a>
