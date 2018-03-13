<?php
require("constants.php");

try {
    $connection = new PDO(DSN, DB_USER, DB_PASS);}
    catch (PDOException $err) {
        echo "Connection error: " . $err->getMessage();
    }
/*      
        The connection will be closed automatically when the script ends. 
        To close the connection before, use the following: $connection = null;
        Prefent that other people getting acces to your database and change the data
*/
 ?>