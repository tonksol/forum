<?php
// -------------------------------------
// CREATE
// -------------------------------------


// -------------------------------------
// READ
// -------------------------------------

function getCategories() {
    global $connection;
    $query = "SELECT * FROM `category`;";
    $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)){   // one row in array
            $category = array('id' => $row['categoryID'],
                                    'name' => $row['categoryName']);
            $categories[] = $category;
        }
    return $categories;  
}

function getCategoriesForOverview() {
    global $connection;
    $query = "SELECT DISTINCT `category`.`categoryID`, `category`.`categoryName`, `category`.`categoryDescription`, COUNT(`topic`.`categoryID`) as 'numberOfTopics'
        FROM `category` 
        JOIN `topic` ON `category`.`categoryID` = `topic`.`categoryID`
        WHERE `category`.`categoryID` = `topic`.`categoryID`
	    GROUP BY `topic`.`categoryID`
        ORDER BY `category`.`categoryName` ASC;";

    $result = mysqli_query($connection, $query);
    $categories = "";
    
        while ($row = mysqli_fetch_array($result)){ 
            $categories .= "<tr>";
            // $topics .= "<td>" . $row['categoryName'] . "</td>";
            $categories .= "<td><a href=presentation/categoryTopics.php?categoryID=" . $row['categoryID'] . ">" . $row['categoryName']."</a></td>";
            $categories .= "<td>" . $row['categoryDescription'] . "</td>";
            $categories .= "<td>" . $row['numberOfTopics'] . "</td>";
            $categories .= "</tr>";
        }
    return $categories;
}

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

// -------------------------------------
// Update
// -------------------------------------

// -------------------------------------
// Delete
// -------------------------------------