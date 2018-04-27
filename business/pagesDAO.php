<?php 
// only functions with select query

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