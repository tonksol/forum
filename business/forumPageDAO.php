<?php
require_once(__DIR__ . "/../include/functions.php");

// -------------------------------------
// CREATE / INSERT
// -------------------------------------


 // Used on createPage.php
 function insertNewPage($userID, $pagename, $pagecontent, $todaysdate) {
    global $connection;
    $userID = trim(mysqli_real_escape_string($connection, $userID));
    $pagename = trim(mysqli_real_escape_string($connection, $pagename));
    $pagecontent = trim(mysqli_real_escape_string($connection, $pagecontent));
    $todaysdate = trim(mysqli_real_escape_string($connection, $todaysdate));
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


function getPage($pageID) {
    global $connection;
    $pageID = trim(mysqli_real_escape_string($connection, $pageID));
    $query = "CALL proc_getPage($pageID)";
    $result = mysqli_query($connection, $query);
    $pageContent = "";
    while ($row = mysqli_fetch_array($result)){
        $pageContent .= '<h4>' . mysqlPrepare($row['forumPageName']) .'</h4>';
        $pageContent .= '<p>' . mysqlPrepare($row['forumPageContent']) .'<p>';
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
            $rules .= "#<b>" . mysqlPrepare($row['ruleID']) . " </b><br>" . mysqlPrepare($row['ruleDescription']) . "<br><br>";
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
        $forumPageInfo = array('id' => mysqlPrepare($row['forumPageID']),
                                'name' => mysqlPrepare($row['forumPageName']),
                                'content' => mysqlPrepare($row['forumPageContent']));                          
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
            $pagecontent = mysqlPrepare($row['forumPageContent']);
            $pages .= "<tr>";
            $pages .= "<td><a href=presentation/managePage.php?forumPageID=" . mysqlPrepare($row['forumPageID']) . ">" . mysqlPrepare($row['forumPageName']) . "</a></td>";
            $pages .= '<td>' . substr($pagecontent, 0, 100) . "...</td>";
            $pages .= "<td>" . mysqlPrepare($row['userName']) . "</td>";
            $pages .= "</tr>";
        }
    mysqli_next_result($connection);
    return $pages;
}

// -------------------------------------
// UPDATE
// -------------------------------------

// UPDATE existing page - used on managePage.php
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
function deletePage($forumpageID) {
    global $connection;
    $query= "CALL proc_deletePage(" . trim(mysqli_real_escape_string($connection, $forumpageID)) . ")";
    $result = mysqli_query($connection, $query);
    mysqli_next_result($connection);
    return $result;
}