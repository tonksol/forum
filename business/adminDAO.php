<?php
require_once("../include/functions.php");


// READ
function getPages() {
        global $connection;
        $query = "SELECT * 
            FROM forumPage;";
    
        $result = mysqli_query($connection, $query);
    
        $whichPage = "";
        
            while ($row = mysqli_fetch_array($result)){
                $whichPage .= '<a class="dropdown-item" href="#">' . $row['forumPageName'] .'</a>';
            }
            return $whichPage;
}