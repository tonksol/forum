<?php
require_once("../include/functions.php");


// READ
function getPages() {
        global $connection;
        $query = "SELECT * FROM forumPage;";
        $result = mysqli_query($connection, $query);
        $whichPage = "";
            while ($row = mysqli_fetch_array($result)){
                $whichPage .= '<a class="dropdown-item" href="#">' . $row['forumPageName'] .'</a>';
            }
        return $whichPage;
}


// make function with a switch case to get the form for the selected page 

function getPageInfo() {
    global $connection;
    $query = "SELECT * FROM forumPage;";
    $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)){   // one row in array
            $forumPageInfo = array("name" => $row['forumPageName'],
                                    "content" => $row['forumPageContent']);
            //$forumPageInfo['name'] = $row['forumPageName'];
            // $forumPageInfo['content'] = $row['forumPageContent'];
            $forumPageInfos[] = $forumPageInfo;
        }
    return $forumPageInfos;
    
}

$forumPageInfos = getPageInfo();
