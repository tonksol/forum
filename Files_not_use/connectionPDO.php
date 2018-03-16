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
 

/*
<?php
CONSTANTS FOR PDO - CREATE A DIFFRENT FILE!  
// constants for Tonke's DB on her laptop

$db_name = "mysql:dbname=boardgames_db";
$db_host = "host=localhost";
$db_charset = "charset=utf8";

define("DSN", "$db_name; $db_host; $db_charset;"); 
define("DB_USER", "root");
define("DB_PASS", "");

?>
*/


?>
