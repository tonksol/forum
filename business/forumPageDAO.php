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

function getRules() {
    global $connection;
    $query = "SELECT * FROM rule";
    $result = mysqli_query($connection, $query);
    
    $rules = "";
    echo $rules;
        while ($row = mysqli_fetch_array($result)){
            $rules .= "<ul>";
            $rules .= "#<b>" . $row['ruleID'] . " </b><br>" . $row['ruleDescription'] . "<br><br>";
            $rules .= "</ul>";
        }
    return $rules;
}