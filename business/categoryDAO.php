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

// -------------------------------------
// Update
// -------------------------------------

// -------------------------------------
// Delete
// -------------------------------------