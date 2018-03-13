<?php
require("constants.php");

try {
    $connection = new PDO(DSN, DB_USER, DB_PASS);}
    catch (PDOException $err) {
        echo "Connection error: " . $err->getMessage();
    }

// always close the connection
// otherwise other people can acces your data and change it

//mysqli_close($connection);

?>