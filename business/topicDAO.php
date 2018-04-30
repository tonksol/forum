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


// -------------------------------------
// Update
// -------------------------------------

// -------------------------------------
// Delete
// -------------------------------------