<?php
require_once(__DIR__ . "/../include/functions.php");

// -------------------------------------
// CREATE / INSERT
// -------------------------------------

 // TO DO: real_escape_string
 // Used on createPage.php
 function insertNewPage($userID, $pagename, $pagecontent, $todaysdate) {
    global $connection;
    // $userID = mysqli_real_escape_string(trim($userID));
    // $pagename = mysqli_real_escape_string(trim($pagename));
    // $pagecontent = mysqli_real_escape_string(trim($pagecontent));
    // $todaysdate = mysqli_real_escape_string(trim($todaysdate));
    $query = "CALL proc_insertNewPage($userID, '$pagename', '$pagecontent', '$todaysdate')";
    if (isset($userID)) {    
        // Execute query
        mysqli_query($connection, $query);
        mysqli_next_result($connection);
    }
 }

// -------------------------------------
// READ
// -------------------------------------

// TO DO real escape string
function getPage($pageID) {
    global $connection;
    // $pageID = mysqli_real_escape_string(trim($pageID));
    $query = "CALL proc_getPage($pageID)";
    $result = mysqli_query($connection, $query);
    $pageContent = "";
    while ($row = mysqli_fetch_array($result)){
        $pageContent .= '<h4>' . $row['forumPageName'] .'</h4>';
        $pageContent .= '<p>' . $row['forumPageContent'] .'<p>';
    }
    mysqli_next_result($connection);
    return $pageContent;
}

function getRules() {
    global $connection;
    $query = "CALL proc_getRules()";
    $result = mysqli_query($connection, $query);
    $rules = "";
    echo $rules;
        while ($row = mysqli_fetch_array($result)){
            $rules .= "<ul>";
            $rules .= "#<b>" . $row['ruleID'] . " </b><br>" . $row['ruleDescription'] . "<br><br>";
            $rules .= "</ul>";
        }
    mysqli_next_result($connection);
    return $rules;
}

// Used for the navbar
function getPages() {
    global $connection;
    $query = "CALL proc_getPages()";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)){   // one row in array
        $forumPageInfo = array('id' => $row['forumPageID'],
                                'name' => $row['forumPageName'],
                                'content' => $row['forumPageContent']);
                                
        //$forumPageInfo['name'] = $row['forumPageName'];
        // $forumPageInfo['content'] = $row['forumPageContent'];
        $forumPageInfos[] = $forumPageInfo;
    }
    mysqli_next_result($connection);
    return $forumPageInfos;    
}

// READ - used on managePage.php
function getPageInfo($forumpageID) {
    global $connection;
    $query = "CALL proc_getPageInfo(" . trim(mysqli_real_escape_string($connection, $forumpageID)) . ")";
    $result = mysqli_query($connection, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
     }  
     mysqli_next_result($connection); 
    return $row;
}


// Used on pageManager.php
function getPagesForOverview() {
    global $connection;
    $query = "CALL proc_getPagesForOverview()";
    $result = mysqli_query($connection, $query);
    $pages = "";
        while ($row = mysqli_fetch_array($result)){
            $pages .= "<tr>";
            $pages .= "<td><a href=presentation/managePage.php?forumPageID=" . $row['forumPageID'] . ">" . $row['forumPageName']."</a></td>";
            $pages .= '<td>' . substr($row['forumPageContent'], 0, 100) . "...</td>";
            $pages .= "<td>" . $row['userName'] . "</td>";
            $pages .= "</tr>";
        }
    mysqli_next_result($connection);
    return $pages;
}

// -------------------------------------
// UPDATE
// -------------------------------------

// UPDATE existing page - used on managePage.php
// TO DO Stored procedure JONATHAN VRAGEN
function updatePageInfo($userID, $pagename, $pagecontent, $todaysdate, $forumpageID) {
    global $connection;
    $userID = trim(mysqli_real_escape_string($connection, $userID));
    $pagename = trim(mysqli_real_escape_string($connection, $pagename));
    $pagecontent = trim(mysqli_real_escape_string($connection, $pagecontent));
    $todaysdate = trim(mysqli_real_escape_string($connection, $todaysdate));
    $forumpageID = trim(mysqli_real_escape_string($connection, $forumpageID));
    $query = "CALL proc_updatePageInfo($userID, '$pagename', '$pagecontent', '$todaysdate', $forumpageID)";
    if (isset($userID)) {    
        // execute query 
        mysqli_query($connection, $query);
        mysqli_next_result($connection);
    }
 
}

// -------------------------------------
// DELETE
// -------------------------------------

// NOT IN USE TO DO
// TO DO Stored procedure JONATHAN VRAGEN
function deletePage($forumpageID) {
    global $connection;
    //$query= "DELETE FROM `forumPage` WHERE forumPageID = $forumpageID";
    $query= "CALL proc_deletePage(" . trim(mysqli_real_escape_string($connection, $forumpageID)) . ")";
    $result = mysqli_query($connection, $query);
    mysqli_next_result($connection);
    return $result;
}