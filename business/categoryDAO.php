<?php
// -------------------------------------
// CREATE
// -------------------------------------


// -------------------------------------
// READ
// -------------------------------------

function getCategories() {
    global $connection;
    // SELECT * FROM `category`;
    $query = "CALL proc_select_all_from_category()";
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
    $query = "CALL proc_getCategoriesForOverview()";
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
    // $categoryID = $_GET['categoryID'];
    
    // SELECT * FROM category WHERE categoryID = $categoryID
    // TO DO: CALL proc_getCategoryHead('$categoryID') - JONATHAN VRAGEN
    $query = "SELECT * FROM category WHERE categoryID = $categoryID;";
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

    $query = "CALL proc_getNumberOfTopicsForCategory('$categoryID')";

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