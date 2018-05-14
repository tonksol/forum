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

// TO DO Stored procedure JONATHAN VRAGEN
function getPage($pageID) {
    global $connection;
     $query = "SELECT * 
         FROM forumPage
         WHERE forumPageID = '$pageID';";
   // $query = "CALL proc_getPage($pageID)";

    $result = mysqli_query($connection, $query);

    $pageContent = "";
    
        while ($row = mysqli_fetch_array($result)){
            $pageContent .= '<h4>' . $row['forumPageName'] .'</h4>';
            $pageContent .= '<p>' . $row['forumPageContent'] .'<p>';
        }
        return $pageContent;
}

// TO DO Stored procedure JONATHAN VRAGEN
function getRules() {
    global $connection;
    $query = "CALL proc_getRules()";
    // $query = "SELECT * FROM rule";
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

// READ - used for the navbar
// TO DO Stored procedure JONATHAN VRAGEN
function getPages() {
    global $connection;
    // $query = "SELECT * FROM forumPage;";
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
    $query = "CALL proc_getPageInfo($forumpageID)";
    $result = mysqli_query($connection, $query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
     }  
     mysqli_next_result($connection); 
    return $row;
}


// READ - pages used on pageManager.php
// TO DO Stored procedure JONATHAN VRAGEN
function getPagesForOverview() {
    global $connection;
    // $query = "SELECT * FROM forumPage JOIN user ON forumPage.userID = user.userID";
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
    // $query = "UPDATE `forumPage`
    //           SET `userID` = $userID, `forumPageName` = '$pagename', `forumPageContent` = '$pagecontent', forumPageLastModifiedDate = '$todaysdate'
    //           WHERE `forumPageID` = '$forumpageID'";
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
    // $query= "CALL proc_deletePage($forumpageID)";
    return mysqli_query($connection, $query);
}