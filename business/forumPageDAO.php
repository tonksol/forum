<?php
require_once(__DIR__ . "/../include/functions.php");

// -------------------------------------
// CREATE
// -------------------------------------

 // INSERT new page used on createPage.php
 function insertNewPage($userID, $pagename, $pagecontent, $todaysdate) {
    global $connection;
   $query = "CALL proc_insertNewPage($userID, '$pagename', '$pagecontent', '$todaysdate')";
    // return mysqli_query($connection, $query);
    if (isset($userID)) {    
        // query uitvoeren
        mysqli_query($connection, $query);
        // return mysqli_fetch_array($result);
    }
 }

// -------------------------------------
// READ
// -------------------------------------

function getPage($pageID) {
    global $connection;
    // $query = "SELECT * 
    //     FROM forumPage
    //     WHERE forumPageID = '$pageID';";
    $query = "CALL proc_getPage($pageID)";

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

// READ - used for the navbar
function getPages() {
    global $connection;
    $query = "SELECT * FROM forumPage;";
    $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)){   // one row in array
            $forumPageInfo = array('id' => $row['forumPageID'],
                                    'name' => $row['forumPageName'],
                                    'content' => $row['forumPageContent']);
                                    
            //$forumPageInfo['name'] = $row['forumPageName'];
            // $forumPageInfo['content'] = $row['forumPageContent'];
            $forumPageInfos[] = $forumPageInfo;
        }
    return $forumPageInfos;    
}

// READ - used on managePage.php
function getPageInfo($forumpageID) {
    global $connection;
    $query = "SELECT * FROM forumPage WHERE forumPageID = $forumpageID";
    $result = mysqli_query($connection, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
     }   
    return $row;
}


// READ - pages used on pageManager.php
function getPagesForOverview() {
    global $connection;
    $query = "SELECT * FROM forumPage JOIN user ON forumPage.userID = user.userID";
    $result = mysqli_query($connection, $query);
    $pages = "";
        while ($row = mysqli_fetch_array($result)){
            $pages .= "<tr>";
            $pages .= "<td><a href=presentation/managePage.php?forumPageID=" . $row['forumPageID'] . ">" . $row['forumPageName']."</a></td>";
            $pages .= '<td>' . substr($row['forumPageContent'], 0, 100) . "...</td>";
            $pages .= "<td>" . $row['userName'] . "</td>";
            $pages .= "</tr>";
            }
    return $pages;
}

// -------------------------------------
// UPDATE
// -------------------------------------

// UPDATE existing page - used on managePage.php
function updatePageInfo($userID, $pagename, $pagecontent, $todaysdate, $forumpageID) {
    global $connection;
    $query = "UPDATE `forumPage`
              SET `userID` = $userID, `forumPageName` = '$pagename', `forumPageContent` = '$pagecontent', forumPageLastModifiedDate = '$todaysdate'
              WHERE `forumPageID` = '$forumpageID'";
    
    if (isset($userID)) {    
        // execute query 
        mysqli_query($connection, $query);
    }
}

// -------------------------------------
// DELETE
// -------------------------------------

function deletePage($forumpageID) {
    global $connection;
    $query= "DELETE FROM `forumPage` WHERE forumPageID = $forumpageID";
    return mysqli_query($connection, $query);
}