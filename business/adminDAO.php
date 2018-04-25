<?php
require_once(__DIR__ . "/../include/functions.php");

 // if (isset($_POST["about"])){
 //     $forumpagename = $_POST["about"];
 // }

 $userID = $_SESSION['user_id'];


// READ
 function getPageInfo($forumpageID) {
        global $connection;
        $query = "SELECT * FROM forumPage WHERE forumPageID = $forumpageID";
        $result = mysqli_query($connection, $query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
         }   
        return $row;
 }

$querystring = "";
if (isset($_GET['forumPageID'])){
    $row = getPageInfo($_GET['forumPageID']);
    $querystring = "?forumPageID=". $row['forumPageID'];
}
 
 

// UPDATE existing page

if (isset($_POST['submit']) && isset($_GET['forumPageID'])) {
    updatePageInfo($userID, $_POST["pagename"], $_POST["content"], date("Y-m-d"), $_GET['forumPageID']); 
    redirect_to("/../presentation/pageManager.php");
}

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




 // INSERT new page
if (isset($_POST['submit']) && !isset($_GET['forumPageID'])) {
    insertNewPage($userID, $_POST["pagename"], $_POST["content"], date("Y-m-d")); 
    redirect_to("/../presentation/pageManager.php");
}

 function insertNewPage($userID, $pagename, $pagecontent, $todaysdate) {
    global $connection;
    $query = "INSERT INTO `forumPage` ( `userID`, `forumPageName`, `forumPageContent`, `forumPageLastModifiedDate`) 
                VALUES ($userID, '$pagename', '$pagecontent', '$todaysdate');";
    // return mysqli_query($connection, $query);
    if (isset($userID)) {    
        // query uitvoeren
        mysqli_query($connection, $query);
        // return mysqli_fetch_array($result);
    }
 }

 if (isset($_POST['delete'])) {
     deletePage($_GET['forumPageID']);
     redirect_to("/../presentation/pageManager.php");
 }
 // DELETE page
 function deletePage($forumpageID) {
     global $connection;
     $query= "DELETE FROM `forumPage` WHERE forumPageID = $forumpageID";
     return mysqli_query($connection, $query);
 }





// make function with a switch case to get the form for the selected page 

function getPages() {
    global $connection;
    $query = "SELECT * FROM forumPage;";
    $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)){   // one row in array
            $forumPageInfo = array('id' => $row['forumPageID'],
                                    'name' => $row['forumPageName']);
                                    
            //$forumPageInfo['name'] = $row['forumPageName'];
            // $forumPageInfo['content'] = $row['forumPageContent'];
            $forumPageInfos[] = $forumPageInfo;
        }
    return $forumPageInfos;    
}

/*
// READ - User info
// function getPageInfo($pagename) {
//     global $connection;
//     // SELECT * FROM user WHERE userID = $userID
//     $query = "SELECT * FROM `forumPage` WHERE `forumPageName` = $pagename";
//     $result = mysqli_query($connection, $query);
//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//     }   
//     return $row;
// }



// 
// $row = getPageInfo($pagename);
// 
// // if submit buttun is pressed
// if (isset($_POST['submit'])) {
//     
//     updateUserInfo($_POST["userID"], $_POST["firstname"], $_POST["prefix"], $_POST["lastname"], $_POST["birthday"], $_POST["email"], $_POST["username"], $_POST["quote"]); 
// }
*/