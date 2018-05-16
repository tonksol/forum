<?php
require_once(__DIR__ . "/../include/functions.php");
// -------------------------------------
// CREATE
// -------------------------------------


// -------------------------------------
// READ
// -------------------------------------

function getCategories() {
    global $connection;
    $query = "CALL proc_select_all_from_category()";
    $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)){   // one row in an array
            $category = array('id' => mysqlPrepare($row['categoryID']),
                                    'name' => mysqlPrepare($row['categoryName']));
            $categories[] = $category;
        }
    // need this line if you want to use multiple stored procedures
    mysqli_next_result($connection);
    return $categories;  
}

function getCategoriesForOverview() {
    global $connection;
    $query = "CALL proc_getCategoriesForOverview()";
    $result = mysqli_query($connection, $query);
    $categories = ""; 
        while ($row = mysqli_fetch_array($result)){ 
            $categories .= "<tr>";
            $categories .= "<td><a href=presentation/categoryTopics.php?categoryID=" . mysqlPrepare($row['categoryID']) . ">" . mysqlPrepare($row['categoryName']) ."</a></td>";
            $categories .= "<td>" . mysqlPrepare($row['categoryDescription']) . "</td>";
            $categories .= "<td>" . mysqlPrepare($row['numberOfTopics']) . "</td>";
            $categories .= "</tr>";
        }    
    mysqli_next_result($connection);
    return $categories;
}

function getCategoryHead($categoryID){
    global $connection;
    $query = "CALL proc_getCategoryHead(" . trim(mysqli_real_escape_string($connection, $categoryID)) . ")";
    // $query = "SELECT * FROM category WHERE categoryID = $categoryID;";
    $result = mysqli_query($connection, $query);
    $category = "";
    while ($row = mysqli_fetch_array($result)){
        $category .= '     <div class="card" >';
        $category .= '        <div class="card-body"> ';
        $category .= '             <h1 class="card-title">' . mysqlPrepare($row['categoryName']) .'</h1>';

        $category .= '             <p class="card-text">' . mysqlPrepare($row['categoryDescription']) .'</p> ';
        $category .= '         </div> ';
        $category .= '     </div> ';

        $category .= ' <br> ';
    }
    mysqli_next_result($connection);
    return $category;
}

function getNumberOfTopicsForCategory() {
    global $connection;
    $categoryID = $_GET['categoryID'];
    $query = "CALL proc_getNumberOfTopicsForCategory(" . trim(mysqli_real_escape_string($connection, $categoryID)) . ")";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
    }
    $numberOfTopics = "";
    while ($row = mysqli_fetch_array($result)) { 
        $numberOfTopics .=  mysqlPrepare($row['numberOfTopics']);     
    }
    mysqli_next_result($connection);
    return $numberOfTopics;
}

// -------------------------------------
// Update
// -------------------------------------

// -------------------------------------
// Delete
// -------------------------------------