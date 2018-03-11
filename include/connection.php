<?php
require("constants.php");
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

if(!$connection){
    die("could not connect");
}

// always need the connection linl
// functions whitout i is the other way around first DB_NAME, $connection
$db_select = mysqli_select_db($connection, DB_NAME);

if (!$db_select){
    die("Database error: ". mysqli_error($connection));
}
// always close the connection
// otherwise other people can acces your data and change it

//mysqli_close($connection);

?>

