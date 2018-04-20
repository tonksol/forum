<?php
require_once("../include/functions.php");

function getPage ($pagename) {
    global $connection;
    $query = "SELECT * 
        FROM forumPage
        WHERE forumPageName = '$pagename';";

    $result = mysqli_query($connection, $query);

    $pageContent = "";
    
        while ($row = mysqli_fetch_array($result)){
            $pageContent .= '<h4>' . $row['forumPageName'] .'</h4>';
            $pageContent .= '<p>' . $row['forumPageContent'] .'<p>';
        }
        return $pageContent;
}