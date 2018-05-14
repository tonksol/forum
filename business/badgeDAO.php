<?php



    // READ - Badges
    function getBadges($userID) {    

        //$query2 = "SELECT * FROM badge as b JOIN userBadge as ub ON b.badgeID = ub.badgeID WHERE ub.userID = $userID";  
        $query2 = "CALL proc_select_the_badges('$userID')";
        // making a new connection because some how the stored procedure killed the connection
        $connection2 = mysqli_connect('localhost', 'root', '');
        $db_select = mysqli_select_db($connection2, 'boardgames_db');
        $result2 = mysqli_query($connection2, $query2);        
        while ($row2 = $result2->fetch_array()) {
            $badge[] = $row2['badgeImage'];
        }
        mysqli_next_result($connection2);
        return $badge;
    }
